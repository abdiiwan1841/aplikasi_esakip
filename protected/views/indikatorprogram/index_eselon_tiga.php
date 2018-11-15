<?php
/* @var $this IndikatorprogramController */
/* @var $model IndikatorProgram */

$this->menu=array(
    array('label'=>'Tambah IndikatorProgram', 'url'=>array('create')),
);

?>


<!-- Top Bar Starts -->
<div class="top-bar clearfix">
    <div class="page-title">
        <h4>
            <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
            Data Indikator Program Eselon 3
        </h4>
    </div>
    <div class="pull-right" id="mini-nav-right">

        <a href="<?php echo Yii::app()->baseUrl; ?>/indikatorprogram/index" class="btn btn-info btn-xs" rel="tooltip"
           data-original-title="Daftar Indikator Program Eselon 2">
		   Eselon 2
        </a>

        <a href="<?php echo Yii::app()->baseUrl; ?>/indikatorprogram/eselonTiga" class="btn btn-warning btn-xs" rel="tooltip"
           data-original-title="Daftar Indikator Program Eselon 3">
		   Eselon 3
        </a>

        <a href="<?php echo Yii::app()->baseUrl; ?>/indikatorprogram/createEselonTiga" class="btn btn-info btn-xs" rel="tooltip"
           data-original-title="Tambah Indikator Program Eselon 3">
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
    'id'=>'indikator-program-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'htmlOptions'=> array('class'=>'table-responsive'),
    'emptyText'=>'Belum ada datanya..',
    'columns'=>array(
		'indikatorid',
		// 'id_instansi',
		'nomor_misi',
		'nomor_tujuan',
		'nomor_sasaran',
		'nomor_program',
		'nomor_indikator',
		'indikator',
		'satuan',
		'indikator_kinerja_utama',
        array('class' => 'bootstrap.widgets.TbButtonColumn', 'deleteConfirmation' => "js:'Anda yakin menghapus data ini ?'",
        'template'=>'{view} {update} {delete}',
        'buttons' => array(
            'view' => array('url' => 'Yii::app()->controller->createUrl("viewEselonTiga",array("id"=>$data->indikatorid))'),
            'update' => array('url' => 'Yii::app()->controller->createUrl("updateEselonTiga",array("id"=>$data->indikatorid))'),
            'delete' => array('url' => 'Yii::app()->controller->createUrl("deleteEselonTiga",array("id"=>$data->indikatorid))'),
        ),
        )
		/*'target_rpjm1',
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
