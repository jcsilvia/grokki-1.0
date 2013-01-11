<?php $this->load->helper('form'); ?>
<script src='http://jquery-star-rating-plugin.googlecode.com/svn/trunk/jquery.js' type="text/javascript"></script>
<script src='http://jquery-star-rating-plugin.googlecode.com/svn/trunk/jquery.rating.js' type="text/javascript" language="javascript"></script>
<script src='http://jquery-star-rating-plugin.googlecode.com/svn/trunk/jquery.MetaData.js' type="text/javascript" language="javascript"></script>
<link href='http://jquery-star-rating-plugin.googlecode.com/svn/trunk/jquery.rating.css' type="text/css" rel="stylesheet"/>

<div class="main-content">

    <div class="content">



    <div class="messages-window">
        <div class="home_title"><h1>Rate and Review <?php if (isset($profile->BusinessName)) {echo $profile->BusinessName;}?></h1><p>Rate and review grokki partners you've done business with. Note that you're only allowed to rate and review a specific business once.</p></div>
        <div><div class="ratings_heading_from"><p><b>From:</b></p></div><div class="ratings_heading_category"><p><b>Category:</b></b></p></div><div class="ratings_heading_received"><p><b>Received:</b></p></div></div>


        <div class="message-detail">
            <div style="text-align:left;"> <?php  echo $profile->BusinessName ?></div>
            <div style="text-align:center; position:absolute;left:275;top:0;"> <?php  echo $profile->CategoryName ?></div>
            <div style="text-align: right; position:absolute;right:0;top:0;"> <?php  echo $profile->City; echo ', '; echo $profile->State; ?></div>
            <div style="text-align: right; position:absolute;top:20;"><a href="javascript:history.back()">Back</a></div>



        </div>




    <?php echo form_open('connect/review') ?>

    <div>
        <div class="message_form">
            <p>Rating:</p>
                <div class="ratings-star-rating">
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

                <input type="hidden" name="senderid" value="<?php  echo $this->session->userdata('memberid') ?>">

                <input type="hidden" name="associateid" value="<?php  echo $profile->MemberId ?>">
                <div>
                    <p>
                        <input class="button_review_form" type="submit" name="submit" value="Submit Review" />
                    </p>
                </div>
             </div>


        </div>

    </div>
    </div>

    <?php echo form_close() ?>

    </div>
    <div style="min-height: 50px;"></div>