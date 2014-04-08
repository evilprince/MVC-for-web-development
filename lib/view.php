<?php
/**
 * 
 * view class for loading web pages 
 * @author shubham
 *
 */

class View {

    public function __construct(){

        // echo "i m in view<br>";

    }

    public function renderer($name)
    {
        if ($name=='index')
        {
            include view_add_theme.$name.'/HTML-Template/index.php';
             
        }else {
            include view_add_theme."$name".'.php';
        }
    }
    
    

}