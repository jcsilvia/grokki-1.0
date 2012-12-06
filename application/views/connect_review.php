<?php $this->load->helper('form'); ?>
<script src='http://jquery-star-rating-plugin.googlecode.com/svn/trunk/jquery.js' type="text/javascript"></script>
<script src='http://jquery-star-rating-plugin.googlecode.com/svn/trunk/jquery.rating.js' type="text/javascript" language="javascript"></script>
<script src='http://jquery-star-rating-plugin.googlecode.com/svn/trunk/jquery.MetaData.js' type="text/javascript" language="javascript"></script>
<link href='http://jquery-star-rating-plugin.googlecode.com/svn/trunk/jquery.rating.css' type="text/css" rel="stylesheet"/>

<div class="main-content">

    <h1>Connections - Rate / Review <?php if (isset($profile->BusinessName)) {echo $profile->BusinessName;}?></h1><br>

    <div style="position: absolute;top:60;left:25;"><p><b>Business:</b></p></div><div style="position: absolute;top:60;left:300;"><p><b>Category:</b></b></p></div><div style="position: absolute;top:60;left:655;"><p><b>Location:</b></p></div>


    <div class="messages-window">


        <div class="message-detail">
            <div style="text-align:left;"> <?php  echo $profile->BusinessName ?></div>
            <div style="text-align:center; position:absolute;left:275;top:0;"> <?php  echo $profile->CategoryName ?></div>
            <div style="text-align: right; position:absolute;right:0;top:0;"> <?php  echo $profile->City; echo ', '; echo $profile->State; ?></div>
            <div style="text-align: right; position:absolute;top:20;"><a href="javascript:history.back()">Back</a></div>



        </div>


    </div>

    <?php echo form_open('connect/review') ?>

    <div style="position:relative;">
        <div class="message_form" style="position:absolute; top:20; left:110; ">
            <p>Rating:</p>
                <div style="position:absolute; top:13; left:50;">
                <input name="rating" type="radio" class="star" value="1"/>
                <input name="rating" type="radio" class="star" value="2"/>
                <input name="rating" type="radio" class="star" value="3" checked="checked"/>
                <input name="rating" type="radio" class="star" value="4"/>
                <input name="rating" type="radio" class="star" value="5"/>
                </div>


            <div>
                    <textarea name="content" style="width:500px;height:70px;border:1px solid;border-radius: 10px 10px 10px 10px; -moz-border-radius: 10px 10px 10px 10px; -webkit-border-radius: 10px 10px 10px 10px;" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')">Enter your review here...
                </textarea>
                <?php echo form_error('content'); ?>
                </div>

        </div>
        <input type="hidden" name="senderid" value="<?php  echo $this->session->userdata('memberid') ?>">

        <input type="hidden" name="associateid" value="<?php  echo $profile->MemberId ?>">
        <div style="position: absolute;top:130;left:110;">
            <p>
                <input class="button_login_form" type="submit" name="submit" value="Submit Review" />
            </p>
        </div>
    </div>


    <?php echo form_close() ?>