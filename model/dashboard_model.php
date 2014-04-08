<?php
/**
 * 
 * Dashboard model class for controlling dashboard functionalites 
 * 
 * @author shubham
 *
 */


class dashboard_model extends Model
{
	private $sessionSet=true;
	
    public function __construct()
    {
        parent::__construct();
        
        if($this->sessionSet == false)
        {
        	session::destroy();
        	
        	header("LOCATION:login");
        	exit;
        
        }
        

    }
    
    private function checkSessionId()
    {
  		  
		    
    
    }
  
}