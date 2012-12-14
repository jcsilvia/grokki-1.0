<?php
class Mobile {
	
	public function is_mobile() {

		$iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
		$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
		$palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
		$berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
		$ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");

		//for test purpose
		//$firefox = strpos($_SERVER['HTTP_USER_AGENT'],"Firefox");
        //if ($iphone || $android || $palmpre || $ipod || $berry || $firefox == true)
        if ($iphone || $android || $palmpre || $ipod || $berry)
		{ 
		  return true;
		}

		return false;
	}
}
?>
