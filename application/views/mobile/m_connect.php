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
		
		<div><h4>Connections</h4></div>
		
		<div class="ui-grid-solo">
			<ul data-role="listview" data-inset="true">
				
				<?php if (count($connections) < 1)
		        	echo '<li><div style="font-weight: bold; text-align: center;">You have no connections.</div></li>';
		        ?>
				
		        <?php foreach ($connections as $connection): ?>
					<li>
						<?php  echo $connection['BusinessName'] ?><br/>
						<?php  echo $connection['CategoryName'] ?><br/>
						<?php  echo $connection['City']; echo ', '; echo $connection['State']; ?><br/>
						<a href="/connect/message/<?php  echo $connection['MemberId'] ?>">Message Directly</a><br/>
						<a href="/connect/profile/<?php  echo $connection['MemberId'] ?>">View Profile</a><br/>
						<a href="/connect/review/<?php  echo $connection['MemberId'] ?>">Add Review</a><br/>
						<a href="/connect/delete/<?php  echo $connection['MemberId'] ?>">Delete Connection</a>
					</li>
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
