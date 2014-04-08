<?php
/**
 * 
 * profile controller for loading profile funcitonalities
 * 
 * @author shubham
 *
 */


class profile extends MainController
{
    public function __construct($name)
    {
        
        
        parent::__construct();
        
           session::init();
        
         if(session::get('loggedin')==false)
          {
              session::destroy();
              header('Location:login');
               exit;        
          }

          
        $this->load_view($name);
        $this->load_model($name);
    
    }

}