<?php
/**
 * 
 * Error Controller for loading error pages
 * 
 * 
 * @author shubham
 *
 */


class ErrorController extends MainController{

    public function __construct($name,$type)
    {
        parent::__construct();
        //echo 'i m in error';
		$this->load_view($name);
    }
    
}