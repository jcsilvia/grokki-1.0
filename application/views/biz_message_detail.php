<?php $this->load->helper('form'); ?>
<script src='http://jquery-star-rating-plugin.googlecode.com/svn/trunk/jquery.js' type="text/javascript"></script>
<script src='http://jquery-star-rating-plugin.googlecode.com/svn/trunk/jquery.rating.js' type="text/javascript" language="javascript"></script>
<script src='http://jquery-star-rating-plugin.googlecode.com/svn/trunk/jquery.MetaData.js' type="text/javascript" language="javascript"></script>
<link href='http://jquery-star-rating-plugin.googlecode.com/svn/trunk/jquery.rating.css' type="text/css" rel="stylesheet"/>


<div class="main-content">
    <div class="content">




    <div class="message-detail-window">
        <div class="biz_message_title"><h1>Message Details</h1><p>View a message sent to you by a grokki business partner.</p></div>
        <div><div class="messages_heading_from"><p><b>From:</b></p></div><div class="messages_heading_category"><p><b>Category:</b></b></p></div><div class="messages_heading_received"><p><b>Received:</b></p></div></div>



        <div class="message-detail">
            <div style="text-align:left;"> <?php  echo $messages->SenderName ?></div>
            <div style="text-align:center; position:absolute;left:275;top:0;"> <?php  echo $messages->CategoryName ?></div>
            <div style="text-align: right; position:absolute;right:0;top:0;"> <?php  echo $messages->DateFormatted ?></div>
            <div style="text-align: right; position:absolute;top:20;"><a href="javascript:history.back()">Back</a></div>
            <div style="text-align: center; position:absolute;right:0;top:20;"><a href="/home/delete_message/<?php echo $messages->MessageId ?>">Delete</a></div>
            <div style="text-align: left; position: absolute;left:275;top:20;"><a href="/home/reply_message/<?php echo $messages->MessageId ?>">Reply</a></div>
            <div style="text-align: left; position: absolute; left:0;top: 50;">Message: <?php  echo $messages->Content ?></div>

            <div style="border-color:#808080;border-width:thin;border-top-style: solid;position:absolute; top:140;left:0;width: 710px"></div>
            <div style="text-align: left;position:absolute;left:0;top:145;">Business: <?php echo $business->BusinessName ?></div>
            <div style="text-align: left;position:absolute;left:275;top:145;">Contact: <?php echo $business->ContactName ?></div>
            <div style="text-align: left;position:absolute;right:0;top:145;"><a href="/home/add_connection/<?php echo $business->SenderId ?>">Add to Connections</a></div>

            <div style="text-align: left;position:absolute;left:0;top:165;">Phone: <?php echo $phone ?></div>
            <div style="text-align: left;position:absolute;left:275;top:165;">Address: <?php echo $business->Address1 ?><?php if($business->Address2) { echo ', '; echo $business->Address2; } ?></div>
            <div style="text-align: left;position:absolute;left:340;top:185;"><?php echo $business->City ?>, <?php echo $business->State ?> <?php echo $business->Zipcode ?></div>
            <div style="text-align: left;position:absolute;right:90;top:165;">Rating:</div>
            <div style="text-align: left;position:absolute;right:0;top:165;">
                <?php $class = 'class="star" disabled="disabled"'; echo form_radio('rating', '1', (1 == $rating->Rating) ? set_radio('active', $rating->Rating, TRUE) : set_radio('rating', '1'), $class); ?>
                <?php $class = 'class="star" disabled="disabled"'; echo form_radio('rating', '2', (2 == $rating->Rating) ? set_radio('active', $rating->Rating, TRUE) : set_radio('rating', '2'), $class); ?>
                <?php $class = 'class="star" disabled="disabled"'; echo form_radio('rating', '3', (3 == $rating->Rating) ? set_radio('active', $rating->Rating, TRUE) : set_radio('rating', '3'), $class); ?>
                <?php $class = 'class="star" disabled="disabled"'; echo form_radio('rating', '4', (4 == $rating->Rating) ? set_radio('active', $rating->Rating, TRUE) : set_radio('rating', '4'), $class); ?>
                <?php $class = 'class="star" disabled="disabled"'; echo form_radio('rating', '5', (5 == $rating->Rating) ? set_radio('active', $rating->Rating, TRUE) : set_radio('rating', '5'), $class); ?>
            </div>

        </div>


    </div>
        <div style="min-height: 25px;"></div>
        <div class="coupon-window">
            <?php if (count($coupons) > 0) {

            echo '<div class="active-coupon">';
            echo '<div class="coupon-title">';
            echo $coupons->Title;
            echo '</div><div class="coupon-description">';
            echo $coupons->Description;
            echo '</div><div class="coupon-date">';
            echo 'Offer valid from: ';
            echo $coupons->StartDate;
            echo '</div><div class="coupon-date">';
            echo 'Offer expires on: ';
            echo $coupons->EndDate;
            echo '</div><div class="coupon-code">';
            echo 'Ref Code: ';
            echo $coupons->CouponCode;
            echo '</div><div class="coupon-name">';
            echo $coupons->BusinessName;
            echo '<br>@grokki.com';
            echo '</div></div>';

        } ?>
        </div>

        <div class="map_window">

        <?php
            echo '<img border="1" src="//maps.googleapis.com/maps/api/staticmap?center=';
            echo $business->Address1; echo ','; echo $business->City; echo ','; echo $business->State;
            echo '&markers=color:red%7Clabel:A%7C'; echo $business->Address1; echo ','; echo $business->City; echo ','; echo $business->State;
            echo '&zoom=16&size=400x250&key=AIzaSyBOIxN_iEcuMDdEz5xesWkGjCyxqHZXRpE&sensor=false" />';
        ?>

    </div>
        <div style="min-height: 50px;"></div>