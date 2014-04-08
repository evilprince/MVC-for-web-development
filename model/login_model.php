<?php
/**
 * 
 * login model class for controlling login funcitonalities
 * 
 * @author shubham
 *
 */
class login_model extends Model
{
	private  $_post_fields = array();
	private static $_error_fields = array();

	public function __construct()
	{
		parent::__construct();
		if(isset($_POST['login']))
		{
		if(@isset($_POST['user_name']) && @isset($_POST['user_pass']))
		{
			if(!@empty($_POST['user_name']) && !@empty($_POST['user_pass']))
			{
				$this->setField('user_name');
				$this->setField('user_pass');

			}
			else
			{
				$this->setError('empty_login_details');
			}
		}
		
			 
			if(count(self::$_error_fields)==0)
			{
				$this->log_in();
			}
		}
		 
	}
	
	/**
	 * 
	 * function to set field
	 * @param $field_name
	 */
	public function setField($field_name)
	{
		$this->_post_fields[$field_name] =filter_var($_POST[$field_name], FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS);

	}
	/**
	 * 
	 * function to get field
	 * @param $field_name
	 */
	public function getField($field_name)
	{
		return @$this->_post_fields[$field_name];
	}
	
	/**
	 * 
	 * function to set error 
	 * @param $error_type
	 */
	public function setError($error_type)
	{
		 
		self::$_error_fields[$error_type] = $this->error->errors_msg[$error_type];

	}
	
	/**
	 * 
	 * function to get error
	 * @param $error_type
	 */
	public static  function  getError($error_type)
	{
		return @self::$_error_fields[$error_type];

	}

	/**
	 * 
	 * function to login check
	 */
	public function log_in ()
	{
	
		
		$sth=$this->db->prepare('SELECT user_id FROM user_registered WHERE user_name=? && user_password=? ');

		$sth->execute(array($this->getField('user_name'),$this->tokken->encryptPassword($this->getField('user_pass'))));
		$uid=$sth->fetchAll();
		$count = $sth->rowCount();
		
		if($count > 0)
		{
			session::init();
			session::set('sessionid', $this->tokken->encryptSessionId($uid[0]['user_id']));

			header('Location:dashboard');
			exit;
			 
		}else
		{
			$this->setError('error_login');
		}


	}

}
