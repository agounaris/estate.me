<?php
/* @var $this EntryController */
/* @var $model Entry */

$this->breadcrumbs=array(
	'Entries'=>array('index'),
	'Manage',
);

// $this->menu=array(
// 	array('label'=>'List Entry', 'url'=>array('index')),
// 	array('label'=>'Create Entry', 'url'=>array('create')),
// );

?>

<h1>Search Properties</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<div class="search-form">
<?php $this->renderPartial('_guestSearch',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
	

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'type'=>'bordered',
	'id'=>'entry-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		//'id',
		//'type',
		array(
        	'name'  => 'house_number',
        	'value' => 'CHtml::link($data->house_number,Yii::app()->createUrl("entry/view",array("id"=>$data->id)))',
        	'type'  => 'raw',
    	),
    	array(
        	'name'  => 'street',
        	'value' => 'CHtml::link($data->street,Yii::app()->createUrl("entry/view",array("id"=>$data->id)))',
        	'type'  => 'raw',
    	),
    	array(
        	'name'  => 'postcode',
        	'value' => 'CHtml::link($data->postcode,Yii::app()->createUrl("entry/view",array("id"=>$data->id)))',
        	'type'  => 'raw',
    	),
		/*'bedrooms',		
		'date_added',
		'date_updated',
		'price',
		'image',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{view}',
			'htmlOptions'=>array('style'=>'width: 50px;cursor: pointer;'),
		),
	),
)); 

?>


