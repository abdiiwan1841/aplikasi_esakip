<?php
/* @var $this IndikatordaerahController */
/* @var $model Indikatordaerah */


$this->breadcrumbs=array(
	'Indikatordaerahs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Daftar Indikatordaerah', 'url'=>array('index')),
	array('label'=>'Tambah Indikatordaerah', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#indikatordaerah-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Indikatordaerahs</h1>

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
	'id'=>'indikatordaerah-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'htmlOptions'=> array('class'=>'table-responsive'),
    'emptyText'=>'Belum ada datanya..',
	'columns'=>array(
		'indikatorid',
		'idindikator',
		'level',
		'nomor_indikator',
		'indikator',
        /*'target_keu',
        'realisasi_keu',
        'formulasi',
        'formulasi_asli',
        'sumber_data',
        */
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>