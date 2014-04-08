<?php
/**
 * 
 * login controller handles login page and login model
 * 
 * 
 * @author shubham
 *
 */

class login extends MainController{

    public function __construct($name)
    {
        parent::__construct();
        
            session::init();
        
         if(session::get('loggedin')==true)
          {
              header('Location:dashboard');
               exit;        
          }
        
        
        $this->load_model($name);
        
      
        //after model go for view 
        $this->load_view($name);
       
      
    }
    
    
    

}