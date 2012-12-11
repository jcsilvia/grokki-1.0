<!DOCTYPE html> 
<html> 
<head> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title>Grokki</title> 
	
	<link href='http://jquery-star-rating-plugin.googlecode.com/svn/trunk/jquery.rating.css' type="text/css" rel="stylesheet"/>
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
	<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
	<script type="text/javascript" src="js/jquery-templ.js"></script>
	
	<script src='http://jquery-star-rating-plugin.googlecode.com/svn/trunk/jquery.js' type="text/javascript"></script>
	<script src='http://jquery-star-rating-plugin.googlecode.com/svn/trunk/jquery.rating.js' type="text/javascript" language="javascript"></script>
	<script src='http://jquery-star-rating-plugin.googlecode.com/svn/trunk/jquery.MetaData.js' type="text/javascript" language="javascript"></script>
	
</head> 
<body> 
	
<div data-role="page" class="type-interior">

    <?php $this->load->view('mobile/m_header.php'); ?>
	<?php $this->load->helper('form'); ?>

	<div data-role="content">
		
		<a href="/connect">Connections</a> > 
			<a href="/connect/listings/<?php echo $profile->CategoryId ?>"> <?php echo $profile->CategoryName ?> </a>
		<br/><br/>
		
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
		<br/><br/>
		<div >
		    <p><b>Average Rating:</b> </p>
		    <div>
		        <?php $class = 'class="star" disabled="disabled"'; echo form_radio('rating', '1', (1 == $rating->Rating) ? set_radio('active', $rating->Rating, TRUE) : set_radio('rating', '1'), $class); ?>
		            <?php $class = 'class="star" disabled="disabled"'; echo form_radio('rating', '2', (2 == $rating->Rating) ? set_radio('active', $rating->Rating, TRUE) : set_radio('rating', '2'), $class); ?>
		            <?php $class = 'class="star" disabled="disabled"'; echo form_radio('rating', '3', (3 == $rating->Rating) ? set_radio('active', $rating->Rating, TRUE) : set_radio('rating', '3'), $class); ?>
		            <?php $class = 'class="star" disabled="disabled"'; echo form_radio('rating', '4', (4 == $rating->Rating) ? set_radio('active', $rating->Rating, TRUE) : set_radio('rating', '4'), $class); ?>
		            <?php $class = 'class="star" disabled="disabled"'; echo form_radio('rating', '5', (5 == $rating->Rating) ? set_radio('active', $rating->Rating, TRUE) : set_radio('rating', '5'), $class); ?>
		    </div>
		</div>
		
		<div>
			<div data-role="controlgroup" data-type="horizontal" >
				<a href="/connect/message/<?php echo $profile->MemberId ?>" data-role="button" data-icon="back">Message</a>
				<a href="/connect/review/<?php echo $profile->MemberId ?>" data-role="button" data-icon="delete">Review</a>
				<a href="/connect/delete/<?php echo $profile->MemberId ?>" data-role="button" data-icon="delete">Delete</a>
			</div>			
		</div>
		
	</div><!-- /content -->
	
	<div data-role="footer" data-position="fixed">
        <?php $this->load->view("mobile/m_sub_nav.php");?>
	</div> <!--footer -->	

</div><!-- /page -->

</body>
</html>
