<!DOCTYPE html> 
<html> 
<head> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title>Grokki</title> 
	
	<link href='http://jquery-star-rating-plugin.googlecode.com/svn/trunk/jquery.rating.css' type="text/css" rel="stylesheet"/>
	<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
	<script type="text/javascript" src="js/jquery-templ.js"></script>
	
</head> 
<body>
<?php $this->load->view('analytics_tracking.php'); ?>
<div data-role="page" class="type-interior" >

    <?php $this->load->view('mobile/m_header.php'); ?>
	<?php $this->load->helper('form'); ?>

	<div data-role="content">
		
		<div class="ui-grid-a">
			<div class="ui-block-a">Search results for "<?php echo $this->session->userdata('terms') ?>" 
				near <?php echo $this->session->userdata('city'); ?>, <?php echo $this->session->userdata('state') ?></div>
		</div>		
		
		<div>
			<label for="messagearea">
				<div data-role="fieldcontain">
					<label for="name">Business Name: </label> <?php echo $profile->BusinessName ?>
				</div>
				<div data-role="fieldcontain">
					<label for="name">Grokki User: </label> <?php echo $profile->UserName ?>
				</div>
				<div data-role="fieldcontain">
					<label for="name">Address: </label> <?php  echo $profile->Address1 ?><br/>
			         	<?php  echo $profile->City ?>,
			         	<?php  echo $profile->State ?>
			         	<?php  echo $profile->ZipCode ?>
				</div>
				<div data-role="fieldcontain">
					<label for="name">Phone: </label> <?php  echo $phone ?>
				</div>
				<div data-role="fieldcontain">
					<label for="name">Date Joined: </label> <?php  echo $profile->DateFormatted ?>
				</div>
				<div data-role="fieldcontain">
					<label for="name">Point of Contact: </label> <?php  echo $profile->ContactName ?>
				</div>
			</label>
		</div>	
		
		<div>
			<div data-role="controlgroup" data-type="horizontal" >
				<a href="javascript:history.back()" data-role="button" data-icon="back">Back</a>
				<?php if ($alreadyConnected != 1) {
					echo '<a href="/home/add_connection/'; echo $profile->MemberId; 
						echo '" data-role="button" data-icon="check">Add Connection</a>';
					} else {
						echo '<a href="/home/add_connection/<?php echo $profile->MemberId ?>" data-role="button" class="ui-disabled" data-icon="check">
							Connected</a>';
					}
				?>
			</div>			
		</div>
		
	</div><!-- /content -->
	
	<div data-role="footer" data-position="fixed">
        <?php $this->load->view("mobile/m_sub_nav.php");?>
	</div> <!--footer -->	

</div><!-- /page -->

</body>
</html>
