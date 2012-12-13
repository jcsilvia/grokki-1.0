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
<?php $this->load->view('analytics_tracking.php'); ?>
<div data-role="page" class="type-interior">

    <?php $this->load->view('mobile/m_header.php'); ?>
	<?php $this->load->helper('form'); ?>

	<div data-role="content">
		
		<a href="/connect">Connections</a> > 
			<a href="/connect/listings/<?php echo $profile->CategoryId ?>"> <?php echo $profile->CategoryName ?> </a> >
			<a href="/connect/profile/<?php  echo $profile->MemberId ?>"> <?php echo $profile->BusinessName ?> </a>
		<br/><br/>
		
		<div>
			<?php echo form_open('connect/message') ?>
			
			<div data-role="fieldcontain">
				<label for="content">Write Message:</label>
				<textarea name="content" id="content" placeholder="Enter your message..."></textarea>				
				<?php echo form_error('content'); ?>
			</div>

	        <input type="hidden" name="senderid" value="<?php  echo $this->session->userdata('memberid') ?>">
	        <input type="hidden" name="categoryid" value="<?php  echo $profile->CategoryId ?>">
	        <input type="hidden" name="associateid" value="<?php  echo $profile->MemberId ?>">

			<div>
				<input class="button" type="submit" name="submit" value="Send Message" />
			</div>
			
			<?php echo form_close() ?>
		</div>	
		
	</div><!-- /content -->
	
	<div data-role="footer" data-position="fixed">
        <?php $this->load->view("mobile/m_sub_nav.php");?>
	</div> <!--footer -->	

</div><!-- /page -->

</body>
</html>
