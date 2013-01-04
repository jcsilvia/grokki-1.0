<div class="main-content">
<div class="content">




    <div class="messages-window">
        <div class="home_title"><h1>Message Details</h1></div>
        <div style="text-align:left;"><p><b>From:</b></p></div><div style="text-align:center; position:absolute;left:320;top:55;"><p><b>Category:</b></b></p></div><div style="text-align: right; position:absolute;right:50;top:55;"><p><b>Received:</b></p></div>



        <div class="message-detail">
            <div style="text-align:left;"> <?php  echo $messages->SenderName ?></div>
            <div style="text-align:center; position:absolute;left:275;top:0;"> <?php  echo $messages->CategoryName ?></div>
            <div style="text-align: right; position:absolute;right:0;top:0;"> <?php  echo $messages->DateFormatted ?></div>
            <div style="text-align: right; position:absolute;top:20;"><a href="javascript:history.back()">Back</a></div>
            <div style="text-align: center; position:absolute;right:0;top:20;"><a href="/home/delete_message/<?php echo $messages->MessageId ?>">Delete</a></div>
            <div style="text-align: left; position: absolute;left:275;top:20;">
                <?php
                    if ($messages->SenderId <> 1)
                    {
                        echo'<a href="/home/reply_message/';
                        echo $messages->MessageId;
                        echo'">Reply</a>';
                    }
                ?>
            </div>
            <div style="text-align: left; position: absolute; left:0;top: 50; width:700;">Message: <?php  echo $messages->Content ?>

            </div>


        </div>









    </div>
</div>
    <div style="min-height: 50px;"></div>