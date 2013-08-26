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
	
	// Load user model.
	protected function loadUser()
	{
		$this->_model  = Yii::app()->db->createCommand()->select('*')->from('user')->where('id=:id', array(':id'=>$this->id))->queryRow();
		if (count($this->_model)==0 ) {return false;}
		return $this->_model;
	}
}
