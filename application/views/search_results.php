<?php $this->load->helper('text'); ?>
<?php $this->load->helper('form'); ?>
<script src='http://jquery-star-rating-plugin.googlecode.com/svn/trunk/jquery.js' type="text/javascript"></script>
<script src='http://jquery-star-rating-plugin.googlecode.com/svn/trunk/jquery.rating.js' type="text/javascript" language="javascript"></script>
<script src='http://jquery-star-rating-plugin.googlecode.com/svn/trunk/jquery.MetaData.js' type="text/javascript" language="javascript"></script>
<link href='http://jquery-star-rating-plugin.googlecode.com/svn/trunk/jquery.rating.css' type="text/css" rel="stylesheet"/>

<div class="main-content">
    <div class="content">


<div class="search_result_box">
    <div class="search_title"><h1>Search Results for "<?php echo $this->session->userdata('terms') ?>" near <?php echo $this->session->userdata('city'); ?>, <?php echo $this->session->userdata('state') ?> </h1></div>

<p>
<?php if (count($searches) < 1)
    echo '<div class="text" style="font-weight: bold; text-align: center; padding-top: 10;">There are no results.</div>';
?>
<?php
    echo '<div class="text" style="font-weight: bold; text-align: center; padding-bottom: 15"><a href="/search">Perform Another Search</a></div>';
?>
<?php foreach ($searches as $search): ?>

<div class="search-detail">
    <div style="position:absolute; top:5; left:5; font-weight: bold;  "> <?php echo $search['BusinessName']; ?></div>
    <div style="position:absolute; top:25; left:5;"> <?php  echo $search['Address'] ?></div>
    <div style="position:absolute; top:45; left:5;"> <?php  echo $search['City']; if ($search['Order']== 1 && $search['SourceId']) {echo ', ';} if ($search['Order']== 2) {echo ', ';} echo $search['State']; echo ' '; echo $search['Zipcode']?></div>
    <div style="position:absolute; top:75; left:5;"> <?php  $phone = phone($search['PhoneNumber']);  echo $phone; ?></div>
    <div style="position:absolute; top:5; right:5;"><?php if ($search['Order']== 1 && $search['SourceId']) { echo '<a href="/home/add_connection/'; echo $search['SourceId']; echo '">Add to Connections</a>'; }?></div>
    <div style="position:absolute; top:40; right:5;"><?php if ($search['Order']== 1 && $search['SourceId'] ) { echo '<a href="/connect/profile/'; echo $search['SourceId']; echo '">View Full Profile</a>'; }?></div>
    <div style="position:absolute; top:75; right:5;">

        <?php
        $class = 'class="star" disabled="disabled"';
            if ($search['Order']== 1 && $search['Rating'] > 0) {
             echo form_radio('rating', '1', (1 == $search['Rating']) ? TRUE : FALSE, $class);
             echo form_radio('rating', '2', (2 == $search['Rating']) ? TRUE : FALSE, $class);
             echo form_radio('rating', '3', (3 == $search['Rating']) ? TRUE : FALSE, $class);
             echo form_radio('rating', '4', (4 == $search['Rating']) ? TRUE : FALSE, $class);
             echo form_radio('rating', '5', (5 == $search['Rating']) ? TRUE : FALSE, $class);
            }
        ?>
    </div>
    <div style="position: absolute; top: 2;right:200;">
        <?php if ($search['Order']== 1 && $search['SourceId']) {
        echo '<img border="1" src="//maps.googleapis.com/maps/api/staticmap?center=';
        echo $search['Address']; echo ','; echo $search['City']; echo ','; echo $search['State'];
        echo '&markers=color:red%7Clabel:G%7C'; echo $search['Address']; echo ','; echo $search['City']; echo ','; echo $search['State'];
        echo '&zoom=15&size=295x90&key=AIzaSyBOIxN_iEcuMDdEz5xesWkGjCyxqHZXRpE&sensor=false" />';
        }
        ?>
    </div>

</div>

<?php endforeach ?>
    <div class="text" style="position:relative; padding-top: 5;padding-left: 10;">
        <?php
        if (count($searches) > 0) {
            echo $total;
            echo ' results found';
        }
        ?>

        <div class="text" style="text-align: right; position:absolute; right:0; top:0; padding-top: 5;padding-right: 10;"> <?php echo $links; ?> </div>
    </div>
</p>
</div>

    </div>
    <div style="min-height: 50px;"><p></p></div>