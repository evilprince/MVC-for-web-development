<?php

/**
 * 
 * Main controller parent class for different controllers
 * 
 * @author shubham
 *
 */

class MainController {

    public function __construct()
    { 
        $this->view= new View();     
    }
    
    //function for loading models through controller
    
    public function load_model($name)
    {
        $path_model = model_add.$name.'_model.php';
            
        if(file_exists($path_model))
        {       
            include $path_model;
            $name_model=$name.'_model';
            $this->model= new $name_model();
        }
        else 
        {
            throw new Exception('file not found ');
        }
    }
    
    /**
     * 
     * function for loading view part 
     * @param string $name page to view
     */
    public function load_view($name)
    {
        $this->view->renderer($name);
    }

}