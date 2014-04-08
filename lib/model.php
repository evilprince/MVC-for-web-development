<?php
/**
 * 
 * Model class is the parent class for all models
 * objects of different library classes are build here.
 * 
 * @author shubham
 *
 */

class Model
{
    public function __construct()
    {
       
        $this->db=new Database();
        
        $this->error = new Error();
        
        $this->time_stamp = new timestamp();

        $this->tokken = new hash();
       
       
    }
    
    

}