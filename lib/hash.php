<?php

/**
 * 
 * for creating hashed tokkens and encrypting password's 
 * 
 * @author shubham
 *
 */

class hash{

	
	/**
	 * 
	 * function for creating tokkens 
	 * 
	 * @param int $length defined length of tokkens
	 * 
	 */
	public function createTokkens($length=24)
	{
		if(function_exists('openssl_random_pseudo_bytes')) {
            $token = base64_encode(openssl_random_pseudo_bytes($length, $strong));
            if($strong == TRUE)
                return strtr(substr($token, 0, $length), '+/=', '-_,'); //base64 is about 33% longer, so we need to truncate the result
        }

        //fallback to mt_rand if php < 5.3 or no openssl available
        $characters = '0123456789';
        $characters .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz/+'; 
        $charactersLength = strlen($characters)-1;
        $token = '';

        //select some random characters
        for ($i = 0; $i < $length; $i++) {
            $token .= $characters[mt_rand(0, $charactersLength)];
        }        

        return $token;
		
	}
	
	/**
	 * 
	 * function to encrypt passwords for database
	 * 
	 * @param string $pass password given during registration
	 */
	public function encryptPassword($pass)
	{
	
		$options=array(
				'salt'=>'abcdefghi12345^&*(asdfg',
				'cost'=>'12'
				);
		
			$hash = password_hash($pass,PASSWORD_DEFAULT,$options);
			
			return $hash;
	
	}
	
	/**
	 * 
	 * function to encrypt session id to make sessions secure
	 * @param int $id user id 
	 */
	public function encryptSessionId($id)
	{
				$hash = password_hash($pass,PASSWORD_DEFAULT);
			
			return $hash;
	
	}
	



}