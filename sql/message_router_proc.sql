USE grokki;
DROP PROCEDURE message_router;
CREATE PROCEDURE message_router ()
BEGIN
	
DECLARE var_message_id INT;
DECLARE var_errmessage_id INT;
DECLARE var_sender_id INT;
DECLARE var_zipcode INT;
DECLARE var_category INT;
DECLARE var_count INT;
DECLARE no_more_records INT;

# cursor to get the unprocessed messages from the queue
DECLARE cur1 CURSOR FOR SELECT mq.MessageId, ms.MemberId, ms.CategoryId
                          FROM messages_queue_1 mq, messages ms 
                          WHERE mq.MessageId = ms.MessageId 
                            AND mq.MessageProcessed=0;
                            
DECLARE CONTINUE HANDLER FOR NOT FOUND SET no_more_records=1;

SET no_more_records=0;
OPEN cur1;

cur_loop:REPEAT
    FETCH cur1 INTO var_message_id, var_sender_id, var_category;
      
    IF NOT no_more_records THEN
        # get the message zipcode to compare to businesses in the same zip
        SELECT m.zipcode INTO var_zipcode FROM messages m 
           WHERE m.MessageId = var_message_id;
        # do a check to see if there are any matches before we process the message
        
        SET var_count = 0;
        
        SELECT COUNT(*) INTO var_count 
        FROM members m, addresses a, business_categories bc
            WHERE m.MemberId = a.MemberId
              AND m.MemberId = bc.MemberId
              AND m.IsBusiness=1
              AND bc.CategoryId = var_category
              AND a.Zipcode = var_zipcode;
              
        IF var_count > 0 THEN
        # route the message to the proper inbox
          INSERT INTO message_inbox(MessageId, MemberId, SenderId)    
            SELECT var_message_id, m.MemberId, var_sender_id 
              FROM members m, addresses a, business_categories bc
              WHERE m.MemberId = a.MemberId
                AND m.MemberId = bc.MemberId
                AND m.IsBusiness=1
                AND bc.CategoryId = var_category
                AND a.Zipcode = var_zipcode;
        
          UPDATE messages_queue_1
           SET MessageProcessed=1
           WHERE MessageId = var_message_id;   
           
        ELSE
          # send an error message saying there were no matches
          INSERT INTO messages(MemberId, Content, RecipientId, CategoryId)
          VALUES(1, 'There were no businesses of that type in your geographic area in our system. Please choose another location or try our <a href="/search">Search</a>.', var_sender_id, var_category); 
        
          UPDATE messages_queue_1
          SET MessageProcessed=1
          WHERE MessageId = var_message_id;
        
        END IF;
         
    END IF;
        
UNTIL no_more_records 
END REPEAT cur_loop;
CLOSE cur1;

END;
