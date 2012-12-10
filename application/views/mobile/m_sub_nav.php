<div data-role="navbar">
	<ul>
		<li><a href="/home" <?php if ($title=="Home") echo "class='ui-btn-active ui-state-persist'"; ?> >Home</a></li>
		<!-- <li><a href="b.html">Settings</a></li> -->
		<li><a id="search" href="/search" <?php if ($title=="Search") echo "class='ui-btn-active ui-state-persist'"; ?> >Search</a></li>
		<li><a href="/connect" <?php if ($title=="Connections") echo "class='ui-btn-active ui-state-persist'"; ?> >Connections</a></li>
	</ul>
</div>
