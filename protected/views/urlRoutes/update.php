<?php
/* @var $this UrlRoutesController */
/* @var $model UrlRoutes */

$this->breadcrumbs=array(
	'Url Routes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UrlRoutes', 'url'=>array('index')),
	array('label'=>'Create UrlRoutes', 'url'=>array('create')),
	array('label'=>'View UrlRoutes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UrlRoutes', 'url'=>array('admin')),
);
?>

<h1>Update UrlRoutes <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>