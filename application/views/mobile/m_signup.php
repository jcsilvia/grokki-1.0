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
		
		<?php $this->load->helper('form'); ?>
		<?php echo form_open('signup/index') ?>
		
		<div><h3>Sign up with Grokki today</h3></div>

		<div class="form" >
			<div data-role="fieldcontain" class="ui-hide-label">
				<input type="text" name="username" id="username" value="<?php echo set_value('username'); ?>"
				 	placeholder="username"/>
				<?php echo form_error('username'); ?>
			</div>
			<div data-role="fieldcontain" class="ui-hide-label">
				<input type="password" name="password" id="password" placeholder="password"/>
				<?php echo form_error('password'); ?>
			</div>
			<div data-role="fieldcontain" class="ui-hide-label">
				<input type="email" name="email" id="email" value="<?php echo set_value('email'); ?>" 
				     placeholder="email"/>
				<?php echo form_error('email'); ?>
			</div>
			<div data-role="fieldcontain" class="ui-hide-label">
				<input type="text" name="zipcode" id="zipcode" value="<?php echo set_value('zipcode'); ?>" 
				     placeholder="zipcode"/>
				<?php echo form_error('zipcode'); ?>
			</div>
			<div>
				<label><input type="checkbox" name="is_business" /> Is a business account</label>
			</div>
			<div>
		        Already have an account? <a href="/login/">Sign in here.</a>
			</div>		
			<div>
				<input class="button" type="submit" name="submit" value="Create my account" />
			</div>	

			<?php echo form_close() ?>
			
		</div> <!-- end of class form -->
		
	</div><!-- /content -->

    <?php $this->load->view("mobile/m_footer.php");?>

</div><!-- /page -->

</body>
</html>
