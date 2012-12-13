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

		<div class="ui-grid-a">
			<div class="ui-block-a">Search results for "<?php echo $this->session->userdata('terms') ?>" 
				near <?php echo $this->session->userdata('city'); ?>, <?php echo $this->session->userdata('state') ?></div>
	        <div class="ui-block-b" align="right">
				<div style="font-weight: bold; text-align: right; padding-top: 10;">
					<a href="/search/">New Search</a>
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
						<?php if ($search['Order']== 1) {
							echo '<a href="/search/profile/'; echo $search["SourceId"]; echo '">';
							echo    '<div style="color:red;">'; 
							echo $search["BusinessName"];
							echo '</div>';						
							} else {
								echo $search["BusinessName"];
								echo '<br/>';
							}
						?>
						<?php  echo $search['Address'] ?><br/>
						<?php if ($search['Order']== 1) {
							echo '</a>'; 
							}
						?>
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
