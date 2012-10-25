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

            <div style="border-color:#808080;border-width:thin;border-top-style: solid;position:absolute; top:140;left:0;width: 710px"></div>
            <div style="text-align: left;position:absolute;left:0;top:150;">Business: <?php echo $business->BusinessName ?></div>
            <div style="text-align: left;position:absolute;left:275;top:150;">Email: <a href="mailto:<?php echo $business->Email ?>"><?php echo $business->Email ?></a></div>
            <div style="text-align: left;position:absolute;right:0;top:150;">Contact: <?php echo $business->ContactName ?></div>

            <div style="text-align: left;position:absolute;left:0;top:170;">Phone: <?php echo $phone ?></div>
            <div style="text-align: left;position:absolute;left:275;top:170;">Address: <?php echo $business->Address1 ?><?php if($business->Address2) { echo ', '; echo $business->Address2; } ?></div>
            <div style="text-align: left;position:absolute;left:340;top:190;"><?php echo $business->City ?>, <?php echo $business->State ?> <?php echo $business->Zipcode ?></div>

        </div>









    </div>
