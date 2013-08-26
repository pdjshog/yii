<?php
/* @var $this StaticPageController */
/* @var $model StaticPage */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'static-page-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ttile'); ?>
		<?php echo $form->textArea($model,'ttile',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'ttile'); ?>
	</div>

	<div class="row">
		
		
		 <?php echo $form->labelEx($model,'content'); ?><br />
         <?php $this->widget('application.extensions.tinymce.ETinyMce',
array(
'model'=>$model,'attribute'=>'content','editorTemplate'=>'full','htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'tinymce'),
)); ?>
 <?php echo $form->error($model,'contractData'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tpl'); ?>
		<?php echo $form->textArea($model,'tpl',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'tpl'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'default'); ?>
		<?php echo $form->textField($model,'default'); ?>
		<?php echo $form->error($model,'default'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textArea($model,'url',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>
	


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->