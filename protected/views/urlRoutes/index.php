<?php
/* @var $this UrlRoutesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Url Routes',
);

$this->menu=array(
	array('label'=>'Create UrlRoutes', 'url'=>array('create')),
	array('label'=>'Manage UrlRoutes', 'url'=>array('admin')),
);
?>

<h1>Url Routes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
