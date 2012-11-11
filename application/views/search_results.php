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
    <div style="text-align:left;  font-weight: bold; "> <?php  echo $search['BusinessName'] ?></div>
    <div style="text-align:left; "> <?php  echo $search['Address'] ?></div>
    <div style="text-align:left; "> <?php  echo $search['City']; echo ', '; echo $search['State']; echo ' '; echo $search['Zipcode']?></div>
    <div style="text-align: left; "> <?php  echo $search['PhoneNumber'] ?></div>
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

