<?php
/**
 * 
 * Index controller for loading index page
 * 
 * @author shubham
 *
 */


class Index extends MainController {


    public function __construct($name){
            
            
            parent::__construct();
            
           // echo 'i m in index';
               
        $this->load_view($name);    
    }


}

