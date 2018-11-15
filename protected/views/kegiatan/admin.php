<?php
/* @var $this KegiatanController */
/* @var $model Kegiatan */


$this->breadcrumbs = array(
    'Kegiatans' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Daftar Kegiatan', 'url' => array('index')),
    array('label' => 'Tambah Kegiatan', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#kegiatan-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

    <h1>Manage Kegiatans</h1>

    <p>
        You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
            &lt;&gt;</b>
        or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
    </p>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button btn')); ?>
    <div class="search-form" style="display:none">
        <?php $this->renderPartial('_search', array(
            'model' => $model,
        )); ?>
    </div><!-- search-form -->

<?php $this->widget('\TbGridView', array(
    'id' => 'kegiatan-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'htmlOptions'=> array('class'=>'table-responsive'),
    'columns' => array(
        'kegiatanid',
        'id_instansi',
        'nomor_misi',
        'nomor_tujuan',
        'nomor_sasaran',
        'nomor_indikator',
        /*
        'nomor_program',
        'nomor_kegiatan',
        'kegiatan',
        'pagu_anggaran',
        'target_keuangan',
        'realisasi_keuangan',
        'target_fisik',
        'realisasi_fisik',
        'target_keuangan_triwulan1',
        'target_keuangan_triwulan2',
        'target_keuangan_triwulan3',
        'target_keuangan_triwulan4',
        'realisasi_keuangan_triwulan1',
        'realisasi_keuangan_triwulan2',
        'realisasi_keuangan_triwulan3',
        'realisasi_keuangan_triwulan4',
        'target_fisik_triwulan1',
        'target_fisik_triwulan2',
        'target_fisik_triwulan3',
        'target_fisik_triwulan4',
        'realisasi_fisik_triwulan1',
        'realisasi_fisik_triwulan2',
        'realisasi_fisik_triwulan3',
        'realisasi_fisik_triwulan4',
        'nomor_misi_provinsi',
        'nomor_sasaran_provinsi',
        'nomor_indikator_provinsi',
        'ket',
        */
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
)); ?>