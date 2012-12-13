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
<div data-role="page">

    <?php $this->load->view('mobile/m_header.php'); ?>

	<div data-role="content">
		<div>
			<label for="messagearea">
					From: <?php  echo $messages->SenderName ?><br/>
					Category: <?php  echo $messages->CategoryName ?><br/>
					On: <?php  echo $messages->DateFormatted ?>
					<br/><br/><br/>
					<?php  echo $messages->Content ?>
			</label>
		</div>	
		<br/><br/>
		<div>
			<div data-role="controlgroup" data-type="horizontal" >
				<a href="javascript:history.back()" data-role="button" data-icon="back">Back</a>
	            <?php
	                if ($messages->SenderId <> 1)
	                {
	                    echo'<a data-role="button" data-icon="add" href="/home/reply_message/';
	                    echo $messages->MessageId;
	                    echo'">Reply</a>';
	                }
	            ?>
				<a href="/home/delete_message/<?php echo $messages->MessageId ?>" data-role="button" data-icon="delete">Delete</a>
			</div>			
		</div>
		
	</div><!-- /content -->
	
	<div data-role="footer" data-position="fixed">
        <?php $this->load->view("mobile/m_sub_nav.php");?>
	</div> <!--footer -->	

</div><!-- /page -->

</body>
</html>
