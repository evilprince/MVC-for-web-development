<?php
/**
 * 
 * logout controller handles logout and session destroy functionality
 * 
 * @author shubham
 *
 */

class logout 
{
    public function __construct()
    {
           session::init();
           session::destroy();
      
        
           header('Location:login');
          exit;     
         
        
    }


}