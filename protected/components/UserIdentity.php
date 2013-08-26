<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	
	private $_id;
	const ERROR_USERNAME_NOT_ACTIVE = 6;
	
	public function authenticate() 
	{
		$this->errorCode = 0;
		/*$user = Yii::app()->db->createCommand("SELECT * FROM `user` WHERE `username` = '".$this->username."';");*/
		$user  = Yii::app()->db->createCommand()->select('*')->from('user')->where('username=:username', array(':username'=>$this->username))->queryRow();
		if (count($user)==0) { return $this->errorCode=self::ERROR_USERNAME_INVALID; }
		if($user['password']!=$this->password) { return $this->errorCode=self::ERROR_PASSWORD_INVALID;}
						
		if ($user['moderation']=='') {
		return $this->errorCode=self::ERROR_USERNAME_NOT_ACTIVE;
			}
			
		if($user['mailverification']==''){
		return 	$this->errorCode=self::ERROR_USERNAME_NOT_ACTIVE;
			}
			
			
		$this->_id = $user['id'];
		$this->errorCode=self::ERROR_NONE;
		return $this->errorCode; 
	}
	
	public function getId()
	{
		return $this->_id;
	}
}