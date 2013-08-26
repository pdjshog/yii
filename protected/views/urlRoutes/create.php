<?php
/* @var $this UrlRoutesController */
/* @var $model UrlRoutes */

$this->breadcrumbs=array(
	'Url Routes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UrlRoutes', 'url'=>array('index')),
	array('label'=>'Manage UrlRoutes', 'url'=>array('admin')),
);
?>

<h1>Create UrlRoutes</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>