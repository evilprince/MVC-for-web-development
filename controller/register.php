<?php
/**
 * 
 * Register controller for controlling view and model of register functionality
 * 
 * 
 * @author shubham
 *
 */

class register extends MainController{

    public function __construct($name)
    {
        parent::__construct();
        
      	$this->load_model($name);
      	
        $this->view->renderer($name);
        
    }

}