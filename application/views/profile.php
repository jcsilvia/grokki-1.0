<?php $this->load->helper('form'); ?>
<script src='http://jquery-star-rating-plugin.googlecode.com/svn/trunk/jquery.js' type="text/javascript"></script>
<script src='http://jquery-star-rating-plugin.googlecode.com/svn/trunk/jquery.rating.js' type="text/javascript" language="javascript"></script>
<script src='http://jquery-star-rating-plugin.googlecode.com/svn/trunk/jquery.MetaData.js' type="text/javascript" language="javascript"></script>
<link href='http://jquery-star-rating-plugin.googlecode.com/svn/trunk/jquery.rating.css' type="text/css" rel="stylesheet"/>


<div class="main-content">

    <h1>Connections - Profile for <?php  echo $profile->BusinessName ?></h1><br>


<div class="profile-window">

<div style="position: relative">
    <p>
       <a href="javascript:history.back()">Back</a>
    </p>
</div>

<div style="position: relative">
    <div style = "text-align: left; position: absolute; left:0; top: 5;">
        <p>
            <b>Grokki User:</b> <?php  echo $profile->UserName ?>
        </p>
    </div>
    <div style="text-align: right;  position: absolute; right:0; top:5;">
        <p>
            <b>Point of Contact:</b> <?php  echo $profile->ContactName ?>
        </p>
    </div>
</div>
<div style="position: relative;">
    <div style="position: absolute; top:25;">
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
<div style="position:relative;">
    <div style="position:absolute; top:160;">
    <div style="width: 200;">
        <p><b>Average Rating:</b> </p>
    </div>
    <div style="position:absolute; top:14; left:115;">
        <?php $class = 'class="star" disabled="disabled"'; echo form_radio('rating', '1', (1 == $rating->Rating) ? set_radio('active', $rating->Rating, TRUE) : set_radio('rating', '1'), $class); ?>
            <?php $class = 'class="star" disabled="disabled"'; echo form_radio('rating', '2', (2 == $rating->Rating) ? set_radio('active', $rating->Rating, TRUE) : set_radio('rating', '2'), $class); ?>
            <?php $class = 'class="star" disabled="disabled"'; echo form_radio('rating', '3', (3 == $rating->Rating) ? set_radio('active', $rating->Rating, TRUE) : set_radio('rating', '3'), $class); ?>
            <?php $class = 'class="star" disabled="disabled"'; echo form_radio('rating', '4', (4 == $rating->Rating) ? set_radio('active', $rating->Rating, TRUE) : set_radio('rating', '4'), $class); ?>
            <?php $class = 'class="star" disabled="disabled"'; echo form_radio('rating', '5', (5 == $rating->Rating) ? set_radio('active', $rating->Rating, TRUE) : set_radio('rating', '5'), $class); ?>

    </div>
    </div>

</div>


</div>
    <div style="position:absolute; left:80;top:375;">

        <?php
        echo '<img border="0" src="//maps.googleapis.com/maps/api/staticmap?center=';
        echo $profile->Address1; echo ','; echo $profile->City; echo ','; echo $profile->State;
        echo '&markers=color:red%7Clabel:G%7C'; echo $profile->Address1; echo ','; echo $profile->City; echo ','; echo $profile->State;
        echo '&zoom=16&size=600x300&key=AIzaSyBOIxN_iEcuMDdEz5xesWkGjCyxqHZXRpE&sensor=false" />';
        ?>

    </div>

    <div style="position:absolute;left:80;top:700;">
        <?php foreach ($reviews as $review): ?>
            <div style="position:relative; border-bottom: #000000; border-bottom-style: solid; border-bottom-width: 1; width: 500;">
            <div><p><b>Reviewer:</b> <?php  echo $review['Reviewer'] ?> </p></div>
            <div><p><b>Date:</b> <?php  echo $review['DateFormatted'] ?></p></div>
            <div><p><b>Review:</b> <?php  echo $review['Content'] ?></p></div>
            </div>
        <?php endforeach ?>
    </div>
