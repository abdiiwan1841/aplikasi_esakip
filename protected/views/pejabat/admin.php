<?php
/* @var $this PejabatController */
/* @var $model Pejabat */


$this->breadcrumbs=array(
	'Pejabats'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Daftar Pejabat', 'url'=>array('index')),
	array('label'=>'Tambah Pejabat', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#pejabat-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Pejabats</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('\TbGridView',array(
	'id'=>'pejabat-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'htmlOptions'=> array('class'=>'table-responsive'),
    'emptyText'=>'Belum ada datanya..'
	'columns'=>array(
		'id',
		'id_instansi',
		'parent_id',
		'nama_pejabat',
		'nama_jabatan',
		'nip_pejabat',
		/*
		'nama_golongan_pejabat',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>