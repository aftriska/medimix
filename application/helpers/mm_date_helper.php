<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('now_date_time'))
{
	function now_date_time()
	{
		$datestring = "%d-%m-%Y %H:%i:%s";
		$now_date = mdate($datestring);
		return $now_date;
	}
}

//end of file