<?php
class EWebUser extends CWebUser{
	
	protected $_model;
	
	function isAdmin(){
		$user = $this->loadUser();
		if ($user['isadmin']){
			return 'Administrator';
		}
		return false;
	}
	
	function isActive(){
		$user = $this->loadUser();
		if (is_null($user['moderation'])||is_null($user['mailverification'])) {
			return false;
			}
			return true;
		}
	
	// Load user model.
	protected function loadUser()
	{
		$this->_model  = Yii::app()->db->createCommand()->select('*')->from('user')->where('id=:id', array(':id'=>$this->id))->queryRow();
		if (count($this->_model)==0 ) {return false;}
		return $this->_model;
	}
}
