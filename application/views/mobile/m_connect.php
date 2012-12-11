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
			<div class="ui-block-a">Connections</div>
		</div>
		
		<div class="ui-grid-solo">
			<ul data-role="listview" data-inset="true">
				
				<?php if (count($connections) < 1)
		        	echo '<li><div style="font-weight: bold; text-align: center;">You have no connections.</div></li>';
		        ?>
		
		     <?php foreach ($connectionCount as $connectionCnt): ?>
				<li><a href="/connect/listings/<?php  echo $connectionCnt['CategoryId'] ?>">
					<div><?php  echo $connectionCnt['CategoryName'] ?></div>
					<span class="ui-li-count"><?php  echo $connectionCnt['CatCount'] ?></span>
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
