<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(! function_exists('die_r')){
  
    function die_r($value)
    {
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    die;    
    }
}
if (! function_exists('make_hash')) {
	function make_hash($pwd)
	{
	//	return sha1('dream'.md5($pwd).'!');
		return sha1($pwd);
	}
}
if(! function_exists('make_machine_name')){
  function make_machine_name($str){
    $str=trim($str);
    $str=strtolower($str);
    $str=str_replace('_', '-', $str);
    return $str;
  }
}
