<?php
/***
 * 
 * 
 * 
 * 
 */


class Error{

	public $errors_msg = array();
	
	public function __construct(){
	
		$this->errors_msg=parse_ini_file("translations/en.ini");
	}
	
}
