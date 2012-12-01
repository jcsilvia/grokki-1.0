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
			<h4>Welcome to grokki.com</h4>
            <p>We're fundamentally changing the way consumers and local businesses connect.</p>
		</div>
		<a href="/signup/" data-role="button">Sign up</a>
		<a href="/login/" data-role="button">Sign in</a>
	</div><!-- /content -->

    <?php $this->load->view("mobile/m_footer.php");?>

</div><!-- /page -->

</body>
</html>
