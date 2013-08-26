<?php

class MyUrlManager extends CUrlManager
{

	public $dbTable = 'url_routes';

	protected function processRules(){
		$command = Yii::app()->db->createCommand("SELECT `pattern`, `route` FROM {$this->dbTable}");
		$urlRules = $command->queryAll();

		foreach ($urlRules as $value){
			//$this->addRules(array('viet-nam' => 'vietnam/default/index'));
			$this->addRules(array($value['pattern'] => $value['route']));
		}
		parent::processRules();
		
	}


}