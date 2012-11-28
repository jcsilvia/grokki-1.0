<div class="main-content">

    <h1>Connections</h1><br>

    <?php if (count($connections) > 0)
    echo '<div style="position: absolute;top:60;left:25;"><p><b>Business:</b></p></div><div style="position: absolute;top:60;left:300;"><p><b>Category:</b></b></p></div><div style="position: absolute;top:60;left:655;"><p><b>Location:</b></p></div>';
    ?>


    <div class="messages-window">

        <?php if (count($connections) < 1)
        echo '<div style="font-weight: bold; text-align: center;">You have no connections.</div>';
        ?>
        <?php foreach ($connections as $connection): ?>

        <div class="message-detail">
            <div style="text-align:left;"> <?php  echo $connection['BusinessName'] ?></div>
            <div style="text-align:center; position:absolute;left:275;top:0;"> <?php  echo $connection['CategoryName'] ?></div>
            <div style="text-align: right; position:absolute;right:0;top:0;"> <?php  echo $connection['City']; echo ', '; echo $connection['State']; ?></div>
            <div style="text-align: left;"><a href="/connect/message/<?php  echo $connection['MemberId'] ?>">Message Directly</a></div>
            <div style="text-align: center;position:absolute;left:275;top:18;"><a href="/connect/profile/<?php  echo $connection['MemberId'] ?>">View Profile</a></div>
            <div style="text-align: right; position:absolute;right:0;top:18;"><a href="/connect/review/<?php  echo $connection['MemberId'] ?>">Add Review</a></div>
            <div style="text-align: right;"><a href="/connect/delete/<?php  echo $connection['MemberId'] ?>">Delete Connection</a></div>



        </div>

        <?php endforeach ?>
        <p>
        <div style="position:relative">

            <div style="text-align: right; position:absolute; right:0; top:0;"> <?php echo $links; ?> </div></div>

        </p>


    </div>