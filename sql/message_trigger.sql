/*
* Grokki MySQL Schema v1.0
* Author: J. Silvia
* Description: Trigger to insert records into sent table and queue table on insert of messages table
* Known issue with this type of trigger used with non-transactional storage engines is the inability to 
* rollback. The possibility of data inserts by trigger even if a rollback is issued on the messages table. 
*/

DROP TRIGGER `grokki`.messages_insert_trg;

CREATE TRIGGER `grokki`.`messages_insert_trg` AFTER INSERT
    ON grokki.messages FOR EACH ROW
BEGIN

    #No recipient id means inssert into message queue for processing
    IF new.RecipientId IS NULL THEN
    
      INSERT INTO grokki.messages_queue_1(MessageId)
        VALUES(new.MessageId);
    
    ELSEIF new.RecipientId IS NOT NULL THEN
    
      INSERT INTO grokki.message_inbox(MessageId, MemberId, SenderId)
        VALUES(new.MessageId, new.RecipientId, new.MemberId);
    
    END IF;
    
    
    INSERT INTO grokki.message_sent(MessageId, MemberId)
     VALUES(new.MessageId, new.MemberId);
    
    
    # Check to see if there is a record in message_aggregates
    # If present, update, else insert
    SET @message_agg = 0;
    
    SELECT 1 INTO @message_agg FROM MESSAGE_AGGREGATES
      WHERE MemberId = new.MemberId;
      
    IF @message_agg = 1 THEN  
    
          UPDATE MESSAGE_AGGREGATES
            SET SentTotal = (SentTotal + 1)
              WHERE MemberId = new.MemberId;
        
     ELSEIF @message_agg = 0 THEN
     
          INSERT INTO MESSAGE_AGGREGATES(MemberId, SentTotal)
           VALUES (new.MemberId, 1);
     
     END IF;
        
END;
