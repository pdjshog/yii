<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - '.$page['ttile'];
$this->breadcrumbs=array(
	$page['ttile'],
	);
?>

<h1><?php echo $page['ttile']?></h1>


<?php echo $page['content']?>


<br><br>
