<div data-role="navbar">
	<ul>
		<li><a href="/home" <?php if ($title=="Home") echo "class='ui-btn-active ui-state-persist'"; ?> >Home</a></li>
		<!-- <li><a href="b.html">Settings</a></li> -->
		
		<?php
		    if ($this->session->userdata('is_business') == 1 )
		    {		
				echo '<li><a id="reports" href="/reports"';
				 	if ($title=="Reports") echo "class='ui-btn-active ui-state-persist'"; 
				echo '>Reports</a></li>';

				echo '<li><a id="coupons" href="/coupons"';
				 	if ($title=="Coupons") echo "class='ui-btn-active ui-state-persist'"; 
				echo '>Coupons</a></li>';
				
		    } else {
				echo '<li><a id="search" href="/search"';
				 	if ($title=="Search") echo "class='ui-btn-active ui-state-persist'"; 
				echo '>Search</a></li>';

				echo '<li><a id="connect" href="/connect"';
				 	if ($title=="Connections") echo "class='ui-btn-active ui-state-persist'"; 
				echo '>Connections</a></li>';
			}
		?>
	</ul>
</div>
