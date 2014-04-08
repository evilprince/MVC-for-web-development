<?php


/**
 *
 * Code for registeration form ...
 * @author shubham meena
 *
 * Contains all fields of the registration form posted
 * through the post method .All posted variables are
 * stored in a private array according to the name fields
 * in the html form.
 *
 */
class register_model extends Model {

    /**
     *
     * This is a private array which contains the posted variables ...
     * @var array
     */
    private $_post_fields=array();
    
    private static $_error_validation = array();

    
    public function __construct()
    {
        parent::__construct();
        
        

        if(isset($_POST['register']))
        {	
      		if(isset($_POST['user_name']) && isset($_POST['user_email']) && isset($_POST['user_password']) && isset($_POST['user_rp_password']))
      		{ 
      			
      			if(!empty($_POST['user_name']) && !empty($_POST['user_email']) && !empty($_POST['user_password']) && !empty($_POST['user_rp_password']))
      			{
      				$_POST['user_password'] =$this->tokken->encryptPassword($_POST['user_password']);
      				$_POST['user_rp_password'] =$this->tokken->encryptPassword($_POST['user_rp_password']); 
      				
	        		$this->setVariables('user_name');
					$this->setVariables('user_email');
					$this->setVariables('user_password');
					
					if(!empty($_POST['accept_user_agreement']))
					{
						$this->setVariables('accept_user_agreement');
					}
					else 
					{
						@$this->setError('unchecked_agreement');
					}
      		
      			}
      			else 
      			{
      				
      				@$this->setError('empty_fields');
      			}
      			
			 	
      			
      				if(count(self::$_error_validation)==0)
      				{
      					
      					$this->validation();
      					
      						if(count(self::$_error_validation)==0)
      						{
      							if($this->checkPassword() == true)
      							{
      								$this->register();
      							}
      							else
      							{
      								@$this->setError('distinct_password');
      								$this->_post_fields['user_password'] = null;
      								$this->_post_fields['user_rp_password'] = null;
      					
      							}
      					
      						}
      			
      				}
      			
      		}		        	

        }
       
    }
    
    public function setVariables($field_name)
    {

        $this->_post_fields[$field_name] =filter_var($_POST[$field_name], FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);

        //returning the whole object
    }
    
    public function getVariables($field_name)
    {
    
        return @$this->_post_fields[$field_name];
        
    }
    
    public function setError($error_type)
    {
    	self::$_error_validation[$error_type] =  $this->error->errors_msg[$error_type];
    }

	public static function getError($error_type)
	{
		return @self::$_error_validation[$error_type];
		
	}
	
	public function checkPassword()
	{
		if($this->getVariables('user_password') == $_POST['user_rp_password'])
		{
			return true;
		}
		else 
		{
			return false;
		}
	
	}
	
	public function validation()
	{
	
		if(validator::validateEmail($this->getVariables('user_email')) == 'false')
		{
			@$this->setError('email_validate');
			$this->setVariables('user_email') == null;
		}
		
		if(validator::validateUserName($this->getVariables('user_name')) == 'false')
		{
			@$this->setError('user_name_validate');
			$this->setVariables('user_name') == null;
		}
		
		if(validator::validatePassword($this->getVariables('user_password')) == 'false')
		{
			@$this->setError('password_validate');
			$this->setVariables('user_password') == null;
		}
	
	}
	

	public function register()
	{
		
		
		$this->_post_fields['user_account_type']='0';
		$this->_post_fields['user_creation_timestamp']=$this->time_stamp->getTimeStamp();
		$this->_post_fields['user_activation_hash']=$this->tokken->createTokkens();
		
		$sth = $this->db->insert('user_registered',$this->_post_fields);
	
	}
	
	public function sendMail()
	{
	
	
	}
	

}