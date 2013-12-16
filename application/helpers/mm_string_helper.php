<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * My Reduce Multiples for alpha_name (rman)
 *
 *
 * @access	public
 * @param	string
 * @param	string	the character you wish to reduce
 * @param	bool	TRUE/FALSE - whether to trim the character from the beginning/end
 * @return	string
 */
if ( ! function_exists('my_rman'))
{
	function my_rman($str)
	{
		//array for the character you to reduce based on its form_validation (alpha_name)
		$char[0] = " ";
		$char[1] = "'";
		$char[2] = "-";
		$char[3] = "_";
		
		$x = count($char);
		
		for($i=0;$i<$x;$i++)
		{
			$str = preg_replace('#'.preg_quote($char[$i], '#').'{2,}#', $char[$i], $str);
		}

		return $str;
	}
}