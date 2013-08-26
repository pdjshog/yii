<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->username,
);

if (!$model->token) {
	$token=md5(time());
	$content= Yii::app()->db->createCommand("UPDATE `user` SET `token` = '".$token."' WHERE `id` =".$model->id." ;")->query();
	@mail ($model->email,'token','index.php?r=user/confirmmail?token='.$token);	
	}

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>View User <?php echo $model->username; ?></h1>

<?php
if (Yii::app()->user->isAdmin()) {		
	$this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>array(
					'id',
					'username',
					'password',
					'email',
					'isadmin',
					'moderation',
					'mailverification',
					'token',
					),
				));

} else {
	
	$this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>array(
					'id',
					'username',
					'email',
					),
				));
	}
 ?>

<?php 
if (!is_null($model->avatar)) {
	echo '<img src="'.$model->avatar.'" width="150">';
	}
echo '<br><br>';
if (Yii::app()->user->getId() == $_GET['id']) {
	$this->widget('ext.EFineUploader.EFineUploader',
		array(
				'id'=>'FineUploader',
				'config'=>array(
					'autoUpload'=>true,
					'request'=>array(
						'endpoint'=>'index.php?r=user/upload',// OR $this->createUrl('controller/upload'),
						'params'=>array('YII_CSRF_TOKEN'=>Yii::app()->request->csrfToken),
						),
					'retry'=>array('enableAuto'=>true,'preventRetryResponseProperty'=>true),
					'chunking'=>array('enable'=>true,'partSize'=>100),//bytes
					'callbacks'=>array(
						'onComplete'=>"js:function(id, name, response){ $('li.qq-upload-success').remove(); }",
						//'onError'=>"js:function(id, name, errorReason){ }",
						),
					'validation'=>array(
						'allowedExtensions'=>array('jpg','jpeg'),
						'sizeLimit'=>2 * 1024 * 1024,//maximum file size in bytes
						//'minSizeLimit'=>2*1024*1024,// minimum file size in bytes
						),
					/*'messages'=>array(
					'tooManyItemsError'=>'Too many items error',
					'typeError'=>"Файл {file} имеет неверное расширение. Разрешены файлы только с расширениями: {extensions}.",
					'sizeError'=>"Размер файла {file} велик, максимальный размер {sizeLimit}.",
					'minSizeError'=>"Размер файла {file} мал, минимальный размер {minSizeLimit}.",
					'emptyError'=>"{file} is empty, please select files again without it.",
					'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
									                 ),*/
					)
				));
}

?>