<?php $this->load->helper('form'); ?>

<div class="main-content">
    <div class="content">





    <div class="messages-window">
        <div class="home_title"><h1>Reply to Message</h1><p>Reply to messages sent to you by another user or grokki business partner.</p></div>
        <div><div class="messages_heading_from"><p><b>From:</b></p></div><div class="messages_heading_category"><p><b>Category:</b></b></p></div><div class="messages_heading_received"><p><b>Received:</b></p></div></div>





        <div class="message-detail">
        <div style="text-align:left;"> <?php  echo $messages->SenderName ?></div>
        <div style="text-align:center; position:absolute;left:275;top:0;"> <?php  echo $messages->CategoryName ?></div>
        <div style="text-align: right; position:absolute;right:0;top:0;"> <?php  echo $messages->DateFormatted ?></div>
        <div style="text-align: right; position:absolute;top:20;"><a href="javascript:history.back()">Back</a></div>
        <div style="text-align: left; position: absolute; left:0;top: 50;">Message: <?php  echo $messages->Content ?></div>
        </div>


        <?php echo form_open('home/reply_message') ?>
        <div style="min-height: 50px;"></div>
        <div>
            <div class="message_form">
                <p>
                    <textarea name="content" style="width:500px;height:70px;border:1px solid;border-radius: 10px 10px 10px 10px; -moz-border-radius: 10px 10px 10px 10px; -webkit-border-radius: 10px 10px 10px 10px;" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')">Enter your reply here...
                    </textarea>
                    <?php echo form_error('content'); ?>
                </p>
                <input type="hidden" name="senderid" value="<?php  echo $messages->SenderId ?>">
                <input type="hidden" name="parentmessage" value="<?php  echo $messages->MessageId ?>">
                <input type="hidden" name="categoryid" value="<?php  echo $messages->CategoryId ?>">
                <div>
                    <p>
                        <input class="button_login_form" type="submit" name="submit" value="Send Reply" />
                    </p>
                </div>
            </div>

        </div>


        <?php echo form_close() ?>

    </div>



</div>
<div style="min-height: 50px;"></div>