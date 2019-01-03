<?php

/**
 * utf8Converter Trait Doc Comment
 *
 * @category Trait
 * @package  utf8Converter
 * @author   Leonardo <leoamiranda2@gmail.com>
 *
 */

namespace utf8Converter;

trait utf8Converter{
	function utf8_converter($array)	{
	    array_walk_recursive($array, function(&$item, $key){
	        if(!mb_detect_encoding($item, 'utf-8', true)){
	                $item = utf8_encode($item);
	        }
	    });
	 
	    return $array;
	}
}
?>