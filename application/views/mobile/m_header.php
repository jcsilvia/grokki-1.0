<div data-role="header" data-theme="d">
	
	<div class="ui-grid-a">
		<div class="ui-block-a">
				<a href="/home/"><img src="/images/grokki_logo_icon_red.gif" alt="grokki logo"></a>
		</div>
		<?php echo $this->session->userdata('username'); ?>
        <div class="ui-block-b" align="right">
		    <?php if ($this->session->userdata('is_business') == 0 
				AND $this->session->userdata('memberid') == TRUE ) {

		    	echo '<a href="/home/create_message"><img src="/images/icon_mbox_create.png" alt="New Message"></a>';
		    } ?>
		    <?php if ($this->session->userdata('memberid') == TRUE )
		    {
		    	echo '<a href="/home/logout"><img src="/images/logout.png" alt="Logout"></a>';
		    } ?>
		</div>
	</div>

</div><!-- /header -->
