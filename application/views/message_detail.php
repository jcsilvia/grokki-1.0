<div class="main-content">

    <h1>Messages</h1>

    <div class="messages-window">




        <div class="message-detail">
            <div style="text-align:left;">From: <?php  echo $messages->SenderName ?></div>
            <div style="text-align:center; position:absolute;left:275;top:0;">Category: <?php  echo $messages->CategoryName ?></div>
            <div style="text-align: right; position:absolute;right:0;top:0;">Date: <?php  echo $messages->DateFormatted ?></div>
            <div style="text-align: right; position:absolute;top:20;"><a href="javascript:history.back()">Back</a></div>
            <div style="text-align: center; position:absolute;right:0;top:20;"><a href="/home/delete_message/<?php echo $messages->MessageId ?>">Delete</a></div>
            <div style="text-align: left; position: absolute;left:275;top:20;"><a href="/home/reply_message/<?php echo $messages->MessageId ?>">Reply</a></div>
            <div style="text-align: left; position: absolute; left:0;top: 40;">Message: <?php  echo $messages->Content ?></div>
        </div>







    </div>
