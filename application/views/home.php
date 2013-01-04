<div class="main-content">


<div class="content">



    <div class="messages-window">
        <div class="home_title"><h1>Messages</h1></div>
        <?php if (count($messages) > 0)
        echo '<div style="text-align:left;"><p><b>From:</b></p></div><div style="text-align:center; position:absolute;left:320;top:55;"><p><b>Category:</b></b></p></div><div style="text-align: right; position:absolute;right:50;top:55;"><p><b>Received:</b></p></div>';
        ?>
    <?php if (count($messages) < 1)
    echo '<div style="font-weight: bold; text-align: center;">There are no messages.</div>';
    ?>
        <?php foreach ($messages as $message): ?>

        <div class="message-detail">
            <div style="text-align:left;"> <?php  echo $message['SenderName'] ?></div>
            <div style="text-align:center; position:absolute;left:275;top:0;"> <?php  echo $message['CategoryName'] ?></div>
            <div style="text-align: right; position:absolute;right:0;top:0;"> <?php  echo $message['DateFormatted'] ?></div>
            <div style="text-align: left; color:red; position:absolute; top:25px;"><?php if ($message['IsRead'] == 0) { echo 'New'; } ?></div>
            <div style="text-align: right; position:absolute;right:0; top:25;"><a href="/home/message_detail/<?php  echo $message['MessageId'] ?>">View Details</a> </div>

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

        <div style="text-align: right; position:absolute; right:0; top:0;"> <?php echo $links; ?> </div>
        </div>

        </p>


    </div>

</div>
<div style="min-height: 50px;"></div>