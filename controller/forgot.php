<?php
/*
*
*/


class forgot extends MainController{

    public function __construct($name)
    {
        parent::__construct();
        
            
        $this->load_model($name);
        
        //after model go for view 
        $this->load_view($name);
       
      
    }
    
    
    

}