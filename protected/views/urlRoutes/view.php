<?php
/* @var $this UrlRoutesController */
/* @var $model UrlRoutes */

$this->breadcrumbs=array(
	'Url Routes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UrlRoutes', 'url'=>array('index')),
	array('label'=>'Create UrlRoutes', 'url'=>array('create')),
	array('label'=>'Update UrlRoutes', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UrlRoutes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UrlRoutes', 'url'=>array('admin')),
);
?>

<h1>View UrlRoutes #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'pattern',
		'route',
	),
)); ?>
