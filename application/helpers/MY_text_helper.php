<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    function phone ($str)
    {
        $strPhone = preg_replace("[^0-9]",'', $str);
        if (strlen($strPhone) != 10)
            return $strPhone;

        $strArea = substr($strPhone, 0, 3);
        $strPrefix = substr($strPhone, 3, 3);
        $strNumber = substr($strPhone, 6, 4);

        $strPhone = "(".$strArea.") ".$strPrefix."-".$strNumber;

        return ($strPhone);
    }

