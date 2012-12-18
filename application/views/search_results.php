<?php $this->load->helper('text'); ?>
<?php $this->load->helper('form'); ?>
<script src='http://jquery-star-rating-plugin.googlecode.com/svn/trunk/jquery.js' type="text/javascript"></script>
<script src='http://jquery-star-rating-plugin.googlecode.com/svn/trunk/jquery.rating.js' type="text/javascript" language="javascript"></script>
<script src='http://jquery-star-rating-plugin.googlecode.com/svn/trunk/jquery.MetaData.js' type="text/javascript" language="javascript"></script>
<link href='http://jquery-star-rating-plugin.googlecode.com/svn/trunk/jquery.rating.css' type="text/css" rel="stylesheet"/>

<div class="main-content">

<h1>Search Results for "<?php echo $this->session->userdata('terms') ?>" near <?php echo $this->session->userdata('city'); ?>, <?php echo $this->session->userdata('state') ?> </h1><br>



<div style="background-color:#d3d3d3;border-radius: 10px 10px 10px 10px; -moz-border-radius: 10px 10px 10px 10px; -webkit-border-radius: 10px 10px 10px 10px;min-height: 100px;min-width: 20px;     border-style:solid;
    border-width:thin;
    border-color:black;">
<p>
<?php if (count($searches) < 1)
    echo '<div class="text" style="font-weight: bold; text-align: center; padding-top: 10;">There are no results.</div>';
?>
<?php
    echo '<div class="text" style="font-weight: bold; text-align: center; padding-top: 10;"><a href="/search">Perform Another Search</a></div>';
?>
<?php foreach ($searches as $search): ?>

<div class="search-detail">
    <div style="text-align:left;  font-weight: bold;  <?php if ($search['Order']== 1) {echo 'color:red;';} ?>"> <?php echo $search['BusinessName']; ?></div>
    <div style="text-align:left; "> <?php  echo $search['Address'] ?></div>
    <div style="text-align:left; "> <?php  echo $search['City']; if ($search['Order']== 1 && $search['SourceId']) {echo ', ';} if ($search['Order']== 2) {echo ', ';} echo $search['State']; echo ' '; echo $search['Zipcode']?></div>
    <div style="text-align: left; "> <?php  $phone = phone($search['PhoneNumber']);  echo $phone; ?></div>
    <div style="position:absolute; top:20; right:5;"><?php if ($search['Order']== 1 && $search['SourceId']) { echo '<a href="/home/add_connection/'; echo $search['SourceId']; echo '">Add to Connections</a>'; }?></div>
    <div style="position:absolute; top:35; right:5;"><?php if ($search['Order']== 1 && $search['SourceId'] ) { echo '<a href="/connect/profile/'; echo $search['SourceId']; echo '">View Full Profile</a>'; }?></div>
    <div style="position:absolute; top:50; right:5;">

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

