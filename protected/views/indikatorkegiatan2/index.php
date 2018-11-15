<?php
/* @var $this IndikatorkegiatanController */
/* @var $model IndikatorKegiatan */

$this->menu=array(
    array('label'=>'Tambah Indikator Kegiatan', 'url'=>array('create')),
);

?>

<!-- Top Bar Starts -->
<div class="top-bar clearfix">
    <div class="page-title">
        <h4>
            <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
            Data Indikator Kegiatan
        </h4>
    </div>
    <div class="pull-right" id="mini-nav-right">
        <a href="<?php echo Yii::app()->baseUrl; ?>/indikatorkegiatan/create" class="btn btn-info btn-xs" rel="tooltip"
           data-original-title="Tambah">
            <i class="fa fa-plus-circle"></i>
        </a>
    </div>
</div>
<!-- Top Bar Ends -->

<!-- Container fluid Starts -->
<div class="container-fluid">

    <!-- Spacer starts -->
    <div class="spacer-xs">
        <!-- Row Starts -->

<?php $this->widget('\TbGridView',array(
    'id'=>'indikator-kegiatan-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'htmlOptions'=> array('class'=>'table-responsive'),
    'emptyText'=>'Belum ada datanya..',
    'columns'=>array(
		'indikatorid',
		'id_instansi',
		'nomor_misi',
		'nomor_tujuan',
		'nomor_sasaran',
		'nomor_program'
		/*
		'nomor_kegiatan',
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
		)
		)); 
?>

</div>
</div>