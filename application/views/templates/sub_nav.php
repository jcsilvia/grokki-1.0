<div class="sub-nav">
    <?php  if($title == 'Home') {echo '<b>Home</b>    <a href="/settings/">     Settings    </a><a href="/search/">    Search    </a><a href="/connect/">    Connections</a>';}
elseif($title == 'Settings') {echo '<a href="/home/">Home    </a>    <b>Settings</b>    <a href="/search/">    Search    </a><a href="/connect/">    Connections</a>';}
elseif($title == 'Search'||$title == 'Search Results') {echo ' <a href="/home/">Home    </a><a href="/settings/">    Settings    </a>    <b>Search</b>    <a href="/connect/">    Connections</a>';}
elseif($title == 'Connections') {echo ' <a href="/home/">Home    </a><a href="/settings/">    Settings    </a><a href="/search/">    Search    </a>    <b>Connections</b>';}
else {echo '<a href="/home/">Home     </a><a href="/settings/">     Settings    </a><a href="/search/">    Search    </a><a href="/connect/">    Connections</a>';}
    ?>

</div>
<div class="flashMsg">
<?php if($this->session->flashdata('flashSuccess'))
{
    echo "<p>"; echo $this->session->flashdata('flashSuccess'); echo "</p>";
}
?>
</div>
<div class="username"><?php echo $username ?> </div>