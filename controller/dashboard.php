<?php
/*
*code for dashboard controller
*->handles the view of the dashboard
*->handles the model of the dashboard
*
*
*@author shubham
*/


class dashboard extends MainController
{
	/**
	 * 
	 * Constructor
	 * @param string $name dashboard
	 */	
    public function __construct($name)
    {
        
        
        parent::__construct();

        $this->load_model($name);   
        $this->load_view($name);
       
    
    }
    

}