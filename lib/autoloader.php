<?php
/**
 * 
 * autoloader funtion for autoloading libraries
 * 
 * @author shubham
 * 
 */

 function autoloaderClass($class)
	{
		if (file_exists(lib_add.strtolower($class).'.php') )
		{
			include_once lib_add.strtolower($class).'.php';
		
		}
		else
		{
			throw new Exception();
		
		}
	
	}
	