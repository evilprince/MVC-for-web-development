<?php
/**
 * 
 * Session class for session hadling during loggin and log out
 * 
 * @author shubham
 *
 */

class session {
	
	/**
	 * 
	 * function to initialize sessions
	 */
    public static function init()
    {
    
        session_start();
    
    }
    
    /**
     * 
     * function to set session
     * @param int $value user id
     */
    public static function set($value)
    {   
         
        $_SESSION['sessionId']=$value;
        
    }
    
    /**
     * 
     * fucntion to get the session 
     * 
     */
    public static function get()
    {
        if(isset($_SESSION['sessionId']))
        return $_SESSION['sessionId'];
       
        return false;
       }
    
    /**
     * 
     * function to destroy sessions
     */   
    public static function destroy()
    {
        session_destroy();
    
    }
    
}