<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
</head>

<body>

<?php // get all static pages
$pages = Yii::app()->db->createCommand()->select('*')->from('static')->queryAll();

$sub_page[] = array('label'=>'Editor', 'url'=>Array('/StaticPage/'), 'visible'=>Yii::app()->user->isAdmin());
$sub_page[] = array('label'=>'Pages', 'visible'=>Yii::app()->user->isAdmin());

foreach($pages as $item){
	$sub_page[] = array('label'=>$item['ttile'], 'url'=>Array('/site/Spage&id='.$item['id']));
}

 ?>

<?php 
$menu = array(
	'items'=>array(
			array(
				'class'=>'bootstrap.widgets.TbMenu',
				'items'=>array(
					array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
					/*array('label'=>'Home', 'url'=>array('/site/index')),
					    
					    array('label'=>'Contact', 'url'=>array('/site/contact')),*/
					array('label'=>'User list', 'url'=>array('/user')),
					array('label'=>'Pages', 'url'=>array('#'),'items'=>$sub_page),
					array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
					array('label'=>'My page ('.Yii::app()->user->name.')', 'url'=>array('user/view&id='.Yii::app()->user->getId()), 'visible'=>!Yii::app()->user->isGuest),
					array('label'=>'Logout', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
					),
				),
			),
		);
$this->widget('bootstrap.widgets.TbNavbar',$menu); ?>



<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
