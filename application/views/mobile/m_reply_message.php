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
		
		<div>
			<label for="messagearea">
					From: <?php  echo $messages->SenderName ?><br/>
					Category: <?php  echo $messages->CategoryName ?><br/>
					On: <?php  echo $messages->DateFormatted ?>
			</label><br/>
			<div data-role="fieldcontain">
				<label for="name">Message Body: </label> <?php  echo $messages->Content ?>
			</div>
		</div>	
		
		<div>
			<?php echo form_open('connect/message') ?>
			
			<div data-role="fieldcontain">
				<label for="content">Reply Message:</label>
				<textarea name="content" id="content" placeholder="Enter your reply..."></textarea>				
				<?php echo form_error('content'); ?>
			</div>

	        <input type="hidden" name="senderid" value="<?php  echo $this->session->userdata('memberid') ?>">
	        <input type="hidden" name="categoryid" value="<?php  echo $messages->CategoryId ?>">
	        <input type="hidden" name="associateid" value="<?php  echo $messages->MemberId ?>">

			<div data-role="controlgroup" data-type="horizontal" >
				<a href="javascript:history.back()" data-role="button" data-icon="back">Back</a>
				<input class="button" type="submit" name="submit" value="Reply Message" />
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
