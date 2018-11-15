<?php
/* @var $this IndikatorprogramController */
/* @var $model IndikatorProgram */
?>

<?php
$this->breadcrumbs=array(
	'Indikator Programs'=>array('index'),
	$model->indikatorid,
);

$this->menu=array(
	array('label'=>'Daftar IndikatorProgram', 'url'=>array('index')),
	array('label'=>'Tambah IndikatorProgram', 'url'=>array('create')),
	array('label'=>'Update IndikatorProgram', 'url'=>array('update', 'id'=>$model->indikatorid)),
	array('label'=>'Hapus IndikatorProgram', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->indikatorid),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View  #<?php echo $model->indikatorid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'indikatorid',
		'id_instansi',
		'nomor_misi',
		'nomor_tujuan',
		'nomor_sasaran',
		'nomor_program',
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
	),
)); ?>