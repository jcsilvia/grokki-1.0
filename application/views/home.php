<div class="main-content" xmlns="http://www.w3.org/1999/html">

<h1>Messages</h1>

    <div class="messages-window">



    <?php if (count($messages) < 1)
    echo '<div style="font-weight: bold; text-align: center;">There are no messages.</div>';
    ?>
        <?php foreach ($messages as $message): ?>

        <div class="message-detail">
            <div style="text-align:left;">From: <?php  echo $message['SenderName'] ?></div>
            <div style="text-align:center; position:absolute;left:275;top:0;">Category: <?php  echo $message['CategoryName'] ?></div>
            <div style="text-align: right; position:absolute;right:0;top:0;">Date: <?php  echo $message['DateFormatted'] ?></div>
            <div style="text-align: left; color:red; position:absolute; top:18px;"><?php if ($message['IsRead'] == 0) { echo 'New'; } ?></div>
            <div style="text-align: right;"><a href="/home/message_detail/<?php  echo $message['MessageId'] ?>">View Details</a> </div>

        </div></a>

        <?php endforeach ?>
<p>
        <div style="position:relative">
        <?php
            if (count($messages) > 0) {
                 echo (count($messages));
                 echo ' of ';
                 echo $total;
                 echo ' messages';
            }
            ?>

        <div style="text-align: right; position:absolute; right:0; top:0;"> <?php echo $links; ?> </div></div>

</p>


    </div>