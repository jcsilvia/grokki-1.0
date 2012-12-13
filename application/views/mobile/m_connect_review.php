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
	
<div data-role="page" class="type-interior">

    <?php $this->load->view('mobile/m_header.php'); ?>
	<?php $this->load->helper('form'); ?>

	<div data-role="content">
		
		<a href="/connect">Connections</a> > 
			<a href="/connect/listings/<?php echo $profile->CategoryId ?>"> <?php echo $profile->CategoryName ?> </a> >
			<a href="/connect/profile/<?php  echo $profile->MemberId ?>"> <?php echo $profile->BusinessName ?> </a>
		<br/><br/>
		
		<div>
			<?php echo form_open('connect/review') ?>
			
			<script src='http://jquery-star-rating-plugin.googlecode.com/svn/trunk/jquery.rating.js' type="text/javascript" language="javascript"></script>
			<script src='http://jquery-star-rating-plugin.googlecode.com/svn/trunk/jquery.MetaData.js' type="text/javascript" language="javascript"></script>
			<link href='http://jquery-star-rating-plugin.googlecode.com/svn/trunk/jquery.rating.css' type="text/css" rel="stylesheet"/>

            <p>Rating:</p>
            <div style="position:absolute; top:13; left:50;">
                <input name="rating" type="radio" class="star" value="1"/>
                <input name="rating" type="radio" class="star" value="2"/>
                <input name="rating" type="radio" class="star" value="3" checked="checked"/>
                <input name="rating" type="radio" class="star" value="4"/>
                <input name="rating" type="radio" class="star" value="5"/>
            </div>
			
			<div data-role="fieldcontain">
				<label for="content">Review:</label>
				<textarea name="content" id="content" placeholder="Enter your review.."></textarea>				
				<?php echo form_error('content'); ?>
			</div>

	        <input type="hidden" name="senderid" value="<?php  echo $this->session->userdata('memberid') ?>">
	        <input type="hidden" name="associateid" value="<?php  echo $profile->MemberId ?>">

			<div>
				<input class="button" type="submit" name="submit" value="Submit Review" />
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
