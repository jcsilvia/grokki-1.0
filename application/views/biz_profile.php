<?php $this->load->helper('form'); ?>
<script src='http://jquery-star-rating-plugin.googlecode.com/svn/trunk/jquery.js' type="text/javascript"></script>
<script src='http://jquery-star-rating-plugin.googlecode.com/svn/trunk/jquery.rating.js' type="text/javascript" language="javascript"></script>
<script src='http://jquery-star-rating-plugin.googlecode.com/svn/trunk/jquery.MetaData.js' type="text/javascript" language="javascript"></script>
<link href='http://jquery-star-rating-plugin.googlecode.com/svn/trunk/jquery.rating.css' type="text/css" rel="stylesheet"/>


<div class="main-content">
    <div class="content">



        <div class="profile-window">
            <div class="profile_title"><h1>Profile for <?php  echo $profile->BusinessName ?></h1><p>See what users see when they view your profile information, maps, directions, coupons, and reviews. </p></div>

            <div>
                <div >
                    <p>
                        <b>Grokki User:</b> <?php  echo $profile->UserName ?>
                    </p>
                </div>
                <div>
                    <p>
                        <b>Point of Contact:</b> <?php  echo $profile->ContactName ?>
                    </p>
                </div>
            </div>
            <div>
                <div>
                    <p>       <b>Address:</b> <?php  echo $profile->Address1 ?><br>
                        <?php  echo $profile->City ?>,
                        <?php  echo $profile->State ?>
                        <?php  echo $profile->ZipCode ?><br>
                    </p>

                    <p>
                        <b>Phone:</b> <?php  echo $phone ?>
                    </p>

                    <p>
                        <b>Date Joined:</b> <?php  echo $profile->DateFormatted ?>
                    </p>
                    <p>
                        <b>Category of Business:</b> <?php  echo $profile->CategoryName ?>
                    </p>
                </div>

            </div>
            <div>
                <div >
                    <div style="width: 200;">
                        <p><b>Average Rating:</b> </p>
                    </div>
                    <div class="profile_star_rating">
                        <?php $class = 'class="star" disabled="disabled"'; echo form_radio('rating', '1', (1 == $rating->Rating) ? set_radio('active', $rating->Rating, TRUE) : set_radio('rating', '1'), $class); ?>
                        <?php $class = 'class="star" disabled="disabled"'; echo form_radio('rating', '2', (2 == $rating->Rating) ? set_radio('active', $rating->Rating, TRUE) : set_radio('rating', '2'), $class); ?>
                        <?php $class = 'class="star" disabled="disabled"'; echo form_radio('rating', '3', (3 == $rating->Rating) ? set_radio('active', $rating->Rating, TRUE) : set_radio('rating', '3'), $class); ?>
                        <?php $class = 'class="star" disabled="disabled"'; echo form_radio('rating', '4', (4 == $rating->Rating) ? set_radio('active', $rating->Rating, TRUE) : set_radio('rating', '4'), $class); ?>
                        <?php $class = 'class="star" disabled="disabled"'; echo form_radio('rating', '5', (5 == $rating->Rating) ? set_radio('active', $rating->Rating, TRUE) : set_radio('rating', '5'), $class); ?>

                    </div>
                </div>

            </div>
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
            echo $profile->Address1; echo ','; echo $profile->City; echo ','; echo $profile->State;
            echo '&markers=color:red%7Clabel:G%7C'; echo $profile->Address1; echo ','; echo $profile->City; echo ','; echo $profile->State;
            echo '&zoom=16&size=600x300&key=AIzaSyBOIxN_iEcuMDdEz5xesWkGjCyxqHZXRpE&sensor=false" />';
            ?>

        </div>

        <div class="review_window">
            <?php foreach ($reviews as $review): ?>
            <div style="position:relative; border-bottom: #000000; border-bottom-style: solid; border-bottom-width: 1;">
                <div><p><b>Reviewer:</b> <?php  echo $review['Reviewer'] ?> </p></div>
                <div><p><b>Date:</b> <?php  echo $review['DateFormatted'] ?></p></div>
                <div><p><b>Review:</b> <?php  echo $review['Content'] ?></p></div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
    <div style="min-height: 50px;"></div>