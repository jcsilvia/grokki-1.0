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
		
		<?php $firstElement = $connections[0]; ?>
		<div class="ui-block-a"><a href="/connect">Connections</a> > <?php echo $firstElement['CategoryName'] ?> </div> <br/>
		
		<div class="ui-grid-solo">
			<ul data-role="listview" data-inset="true">
				
		     <?php foreach ($connections as $connection): ?>
				<li><a href="/connect/profile/<?php  echo $connection['MemberId'] ?>">
					<?php  echo $connection['BusinessName'] ?><br/>
					<?php  echo $connection['City'] ?>, <?php  echo $connection['State'] ?>
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
