<div class="main-content">

<h1>Messages</h1>

    <div class="messages-window">



    <?php if (count($messages) < 1)
    echo '<div style="font-weight: bold; text-align: center;">There are no messages.</div>';
    ?>
        <?php foreach ($messages as $message): ?>

        <div class="message-detail">
        <div style="text-align:left;"><?php  echo $message['SenderName'] ?></div>
        <div style="text-align:center; position:absolute;left:300;top:0;"><?php  echo $message['CategoryName'] ?></div>
        <div style="text-align: right; position:absolute;right:0;top:0;"> <?php  echo $message['DateFormatted'] ?></div>
        <div style="text-align: left; color:red; position:absolute; top:18px;"><?php if ($message['IsRead'] == 0) { echo 'New'; } ?></div>
        <div style="text-align: right;"><a href="/home/message_detail/<?php  echo $message['MessageId'] ?>">View Details</a> </div>

        </div>

        <?php endforeach ?>

        <?php
            if (count($messages) > 0) {
                 echo '<p>Total:';
                 echo (count($messages));
                 echo ' messages </p>';
            }
            ?>



</div>