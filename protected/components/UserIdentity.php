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
	const ERROR_USERNAME_NOT_ACTIVE = 3;
	
	public function authenticate() 
	{
		/*$user = Yii::app()->db->createCommand("SELECT * FROM `user` WHERE `username` = '".$this->username."';");*/
		$user  = Yii::app()->db->createCommand()->select('*')->from('user')->where('username=:username', array(':username'=>$this->username))->queryRow();
		if (count($user)==0) { $this->errorCode=self::ERROR_USERNAME_INVALID; }
		if($user['password']!=$this->password) {$this->errorCode=self::ERROR_PASSWORD_INVALID;}
			
	if (is_null($user['moderation']) || is_null($user['mailverification'])) {
			$this->errorCode=self::ERROR_USERNAME_NOT_ACTIVE;
			
			}
			
			
		$this->_id = $user['id'];
		$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode; 
	}
	
	public function getId()
	{
		return $this->_id;
	}
}