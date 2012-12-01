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
			<div class="ui-block-a">Messages</div>
	        <div class="ui-block-b" align="right">
	        	<?php
            		if (count($messages) > 0) {
                 		echo (count($messages));
                 		echo ' of ';
                 		echo $total;
                 		echo ' messages';
            		}
	            ?>
			</div>
		</div>

		<div class="ui-grid-solo">
			<ul data-role="listview" data-inset="true">
		        <?php foreach ($messages as $message): ?>

					<li><a href="/home/message_detail/<?php  echo $message['MessageId'] ?>">
						<?php if ($message['IsRead'] == 0) { ?>
								<p><strong><?php  echo $message['SenderName'] ?> ::
								   <?php  echo $message['CategoryName'] ?></strong>
								</p>
								<p><strong>future: snippet of the message?</strong></p>
								<p class="ui-li-aside"><strong><?php  echo $message['DateFormatted'] ?></strong></p>
						<?php } else { ?>
							<p><?php  echo $message['SenderName'] ?> ::
							   <?php  echo $message['CategoryName'] ?>
							</p>
							<p>future: snippet of the message?</p>
							<p class="ui-li-aside"><?php  echo $message['DateFormatted'] ?></p>
						<?php } ?>
					</a></li>
		        <?php endforeach ?>
			</ul>
		</div>

	</div><!-- /content -->
	
	<div data-role="footer" data-position="fixed">
        <?php $this->load->view("mobile/m_sub_nav.php");?>
	</div> <!--footer -->	

</div><!-- /page -->

</body>
</html>
