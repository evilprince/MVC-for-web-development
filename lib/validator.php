<?php
/**
 * 
 * class for validating 
 * @author shubham
 *
 */


class validator
{
    
    public function __construct()
    {}
    
    Public static function validateURL($url)
    {
    	echo $url;
    	if(filter_var($url,FILTER_VALIDATE_STRING))
    	{
    		return 'true';
    	}
    	else 
    	{
    		return 'false';
    	
    	}
    
    }
    
    public static function validateEmail($email)
    {
    	   
    }
    
    public static function validateUserName($user_name)
    {
    
    
    }
    
    public static function validatePassword($password)
    {
    
    }

}