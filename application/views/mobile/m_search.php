<!DOCTYPE html> 
<html> 
<head> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title>Grokki</title> 
	
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
	<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
	<script type="text/javascript" src="js/jquery-templ.js"></script>
</head> 
<body> 
	
<div data-role="page">

    <?php $this->load->view('mobile/m_header.php'); ?>

	<div data-role="content">
		
		<div class="ui-grid-a">
			<div class="ui-block-a">What are you looking for?</div>
		</div>		

		<?php $this->load->helper('form'); ?>
	    <?php echo form_open('search') ?>

		<div data-role="fieldcontain">
		   <label for="category" class="select">Search Category:</label>
           <?php echo form_dropdown('category', $categories, set_value('category'), 'id="category" data-mini="true"') ?>
           <?php echo form_error('category'); ?>
		</div>

		<div data-role="fieldcontain">
		   <label for="state" class="select">State:</label>
           <?php
           $options = array(
               'AK' => 'Alaska',
               'AL' => 'Alabama',
               'AR' => 'Arkansas',
               'AZ' => 'Arizona',
               'CA' => 'California',
               'CO' => 'Colorado',
               'CT' => 'Connecticut',
               'DC' => 'District of Columbia',
               'DE' => 'Delaware',
               'FL' => 'Florida',
               'GA' => 'Georgia',
               'HI' => 'Hawaii',
               'IA' => 'Iowa',
               'ID' => 'Idaho',
               'IL' => 'Illinois',
               'IN' => 'Indiana',
               'KS' => 'Kansas',
               'KY' => 'Kentucky',
               'LA' => 'Louisiana',
               'MA' => 'Massachusetts',
               'MD' => 'Maryland',
               'ME' => 'Maine',
               'MI' => 'Michigan',
               'MN' => 'Minnesota',
               'MO' => 'Missouri',
               'MS' => 'Mississippi',
               'MT' => 'Montana',
               'NC' => 'North Carolina',
               'ND' => 'North Dakota',
               'NE' => 'Nebraska',
               'NH' => 'New Hampshire',
               'NJ' => 'New Jersey',
               'NM' => 'New Mexico',
               'NV' => 'Nevada',
               'NY' => 'New York',
               'OH' => 'Ohio',
               'OK' => 'Oklahoma',
               'OR' => 'Oregon',
               'PA' => 'Pennsylvania',
               'RI' => 'Rhode Island',
               'SC' => 'South Carolina',
               'SD' => 'South Dakota',
               'TN' => 'Tennessee',
               'TX' => 'Texas',
               'UT' => 'Utah',
               'VA' => 'Virginia',
               'VT' => 'Vermont',
               'WA' => 'Washington',
               'WI' => 'Wisconsin',
               'WV' => 'West Virginia',
               'WY' => 'Wyoming'
           );
           echo form_dropdown('state', $options, $state->state, 'id="state" data-mini="true"');
           ?>
           <?php echo form_error('state'); ?>
		</div>

		<div data-role="fieldcontain">
		    <label for="city">City:</label>
		    <input type="text" name="city" id="city" value="<?php echo $city->city; ?>" />
            <?php echo form_error('city'); ?>
		</div>

		<div data-role="fieldcontain">
			<input type="text" name="content" id="content" placeholder="enter search items.."/>
			<?php echo form_error('content'); ?>
		</div>
	
	    <input type="hidden" name="senderid" value="<?php  echo $this->session->userdata('memberid'); ?>" >

		<div>
			<input class="button" type="submit" name="submit" value="Search" />
		</div>

	    <?php echo form_close(); ?>		
		
	</div><!-- /content -->
	
	<div data-role="footer" data-position="fixed">
        <?php $this->load->view("mobile/m_sub_nav.php");?>
	</div> <!--footer -->	

</div><!-- /page -->

</body>
</html>
