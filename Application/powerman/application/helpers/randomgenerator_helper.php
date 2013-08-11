<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('randomEmailCode'))
{
    function randomEmailCode()
    {		
    	$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
	    $pass = array(); //remember to declare $pass as an array
	    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
	    for ($i = 0; $i < 8; $i++) {
	        $n = rand(0, $alphaLength);
	        $pass[] = $alphabet[$n];
	    }
		
	    return implode($pass); //turn the array into a string		
    } 
}

if ( ! function_exists('randomPhoneCode'))
{
    function randomPhoneCode()
    {
	    return rand(10000, 100000);
    } 
}
