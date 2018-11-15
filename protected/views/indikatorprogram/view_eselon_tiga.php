<?php
/* @var $this IndikatorprogramController */
/* @var $model IndikatorProgram */
?>

<?php
$this->breadcrumbs=array(
	'Indikator Programs'=>array('eselonTiga'),
	$model->indikatorid,
);

$this->menu=array(
	array('label'=>'Daftar IndikatorProgram', 'url'=>array('eselonTiga')),
	array('label'=>'Tambah IndikatorProgram', 'url'=>array('createEselonTiga')),
	array('label'=>'Update IndikatorProgram', 'url'=>array('updateEselonTiga', 'id'=>$model->indikatorid)),
	array('label'=>'Hapus IndikatorProgram', 'url'=>'#', 'linkOptions'=>array('submit'=>array('deleteEselonTiga','id'=>$model->indikatorid),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<div class="top-bar clearfix">
    <div class="page-title">
        <h4>
            <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
            Data Indikator Program Eselon 3
        </h4>
    </div>
    <div class="pull-right" id="mini-nav-right">
        <?php
        echo TbHtml::buttonDropdown('Aksi', $this->menu, array('split' => false, 'dropup' => false, 'menuOptions' => array('pull' => TbHtml::PULL_RIGHT)));;
        ?>
    </div>
</div>

<div class="container-fluid">
    <div class="spacer-xs">
    <?php $this->widget('zii.widgets.CDetailView',array(
        'htmlOptions' => array(
            'class' => 'table table-striped table-condensed table-hover',
        ),
        'data'=>$model,
        'attributes'=>array(
            'indikatorid',
            'datainstansi.nama_instansi',
            'datamisi.misi',
            'datatujuan.tujuan',
            'datasasaran.sasaran',
            'datapejabateselontiga.nama_jabatan',
            'dataprogrameselontiga.program',
            'datapejabateselonempat.nama_jabatan',
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
    </div>
</div>