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
			<div class="ui-block-a">Search results for "<?php echo $this->session->userdata('terms') ?>" 
				near <?php echo $this->session->userdata('city'); ?>, <?php echo $this->session->userdata('state') ?></div>
	        <div class="ui-block-b" align="right">
				<div style="font-weight: bold; text-align: right; padding-top: 10;">
					<a href="/search">New Search</a>
				</div>
				<div>
			        <?php
			        if (count($searches) > 0) {
			            echo $total;
			            echo ' results found';
			        }
			        ?>
				</div>
			</div>
		</div>
		<br/>
		<div class="text" style="text-align: right; padding-top: 10;"> 
			<?php echo $links; ?> 
		</div>		

		<div class="ui-grid-solo">
			<ul data-role="listview" data-inset="true">
				<?php foreach ($searches as $search): ?>
					<li>
						<?php  echo $search['BusinessName'] ?><br/>
						<?php  echo $search['Address'] ?><br/>
						<?php  echo $search['City']; echo ', '; echo $search['State']; echo ' '; echo $search['Zipcode']?><br/>
						<?php  echo $search['PhoneNumber'] ?>
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
