<?php
/* @var $this IndikatorprogramController */
/* @var $model IndikatorProgram */


$this->breadcrumbs=array(
	'Indikator Programs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Daftar IndikatorProgram', 'url'=>array('index')),
	array('label'=>'Tambah IndikatorProgram', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#indikator-program-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Indikator Programs</h1>

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
	'id'=>'indikator-program-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'htmlOptions'=> array('class'=>'table-responsive'),
    'emptyText'=>'Belum ada datanya..'
	'columns'=>array(
		'indikatorid',
		'id_instansi',
		'nomor_misi',
		'nomor_tujuan',
		'nomor_sasaran',
		'nomor_program',
		/*
		'nomor_indikator',
		'indikator',
		'satuan',
		'indikator_kinerja_utama',
		'target_rpjm1',
		'target_rpjm2',
		'target_rpjm3',
		'target_rpjm4',
		'target_rpjm5',
		'target_tahun_sebelumnya',
		'realisasi_tahun_sebelumnya',
		'target',
		'realisasi',
		'target_akhir_renstra',
		'keterangan',
		'analisis',
		'tipe_formula',
		'target_triwulan1',
		'target_triwulan2',
		'target_triwulan3',
		'target_triwulan4',
		'realisasi_triwulan1',
		'realisasi_triwulan2',
		'realisasi_triwulan3',
		'realisasi_triwulan4',
		'keterangan_triwulan1',
		'keterangan_triwulan2',
		'keterangan_triwulan3',
		'keterangan_triwulan4',
		'penjelasan_formulasi',
		'sumber_data',
		'indikator_pk',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>