<?php
/* @var $this EntryController */
/* @var $model Entry */

$this->breadcrumbs=array(
	'Entries'=>array('index'),
	$model->id,
);

// $this->menu=array(
// 	array('label'=>'List Entry', 'url'=>array('index')),
// 	array('label'=>'Create Entry', 'url'=>array('create')),
// 	array('label'=>'Update Entry', 'url'=>array('update', 'id'=>$model->id)),
// 	array('label'=>'Delete Entry', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
// 	array('label'=>'Manage Entry', 'url'=>array('admin')),
// );
?>



<h1>View <?php echo $model->house_number.' '.$model->street; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'type'=>'',
	'attributes'=>array(
		'id',
		'type',
		'house_number',
		'street',
		'postcode',
		'bedrooms',
		'date_added',
		'date_updated',
		'price',
		//'image',
	),
)); ?>

<?php echo '<img src="'.Yii::app()->baseUrl.'/images/'.$model->image.'">'?>

<?php 
if (Yii::app()->user->isAdmin) {
	$this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'pills',
    'items'=>array(
        array('label'=>'List Entry', 'url'=>array('index')),
		array('label'=>'Create Entry', 'url'=>array('create')),
		array('label'=>'Update Entry', 'url'=>array('update', 'id'=>$model->id)),
		array('label'=>'Delete Entry', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
		array('label'=>'Manage Entry', 'url'=>array('admin')),
    ),
));
}

 ?>

<div id='SDKmap' class='SDK_map'>
</div>