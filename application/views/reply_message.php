<?php $this->load->helper('form'); ?>

<div class="main-content">

<h1>Reply to Message</h1><br>

    <div style="position: absolute;top:60;left:25;"><p><b>From:</b></p></div><div style="position: absolute;top:60;left:300;"><p><b>Category:</b></b></p></div><div style="position: absolute;top:60;left:655;"><p><b>Received:</b></p></div>


    <div class="messages-window">




    <div class="message-detail">
        <div style="text-align:left;"> <?php  echo $messages->SenderName ?></div>
        <div style="text-align:center; position:absolute;left:275;top:0;"> <?php  echo $messages->CategoryName ?></div>
        <div style="text-align: right; position:absolute;right:0;top:0;"> <?php  echo $messages->DateFormatted ?></div>
        <div style="text-align: right; position:absolute;top:20;"><a href="javascript:history.back()">Back</a></div>


        <div style="text-align: left; position: absolute; left:0;top: 40;">Message: <?php  echo $messages->Content ?></div>
    </div>

</div>

    <?php echo form_open('home/reply_message') ?>

    <div style="position:relative;">
        <div class="message_form" style="position:absolute; top:0; left:110; ">
            <p>
                <textarea name="content" style="width:500px;height:70px;border:1px solid;border-radius: 10px 10px 10px 10px; -moz-border-radius: 10px 10px 10px 10px; -webkit-border-radius: 10px 10px 10px 10px;" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')">Enter your reply here...
                </textarea>
                <?php echo form_error('content'); ?>
            </p>
        </div>
        <input type="hidden" name="senderid" value="<?php  echo $messages->SenderId ?>">
        <input type="hidden" name="parentmessage" value="<?php  echo $messages->MessageId ?>">
        <input type="hidden" name="categoryid" value="<?php  echo $messages->CategoryId ?>">
        <div style="position: absolute;top:75;left:110;">
            <p>
                <input class="button_login_form" type="submit" name="submit" value="Send Reply" />
            </p>
        </div>
    </div>


    </form>