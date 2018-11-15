<?php
/* @var $this KegiatanController */
/* @var $model Kegiatan */
?>

<?php
$this->breadcrumbs = array(
    'Kegiatans' => array('eselonEmpat'),
    $model->kegiatanid,
);

$this->menu = array(
    array('label' => 'Daftar Kegiatan', 'url' => array('eselonEmpat')),
    array('label' => 'Tambah Kegiatan', 'url' => array('createEselonEmpat')),
    array('label' => 'Update Kegiatan', 'url' => array('updateEselonEmpat', 'id' => $model->kegiatanid)),
    array('label' => 'Hapus Kegiatan', 'url' => '#', 'linkOptions' => array('submit' => array('deleteEselonEmpat', 'id' => $model->kegiatanid), 'confirm' => 'Anda yakin menghapus data ini ?')),
);
?>

<div class="top-bar clearfix">
    <div class="page-title">
        <h4>
            <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
            Data Kegiatan
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
        <?php

        $this->widget('zii.widgets.CDetailView', array(
            'htmlOptions' => array(
                'class' => 'table table-striped table-condensed table-hover',
            ),
            'data' => $model,
            'attributes' => array(
                'datainstansi.nama_instansi',
                'datamisi.misi',
                'datatujuan.tujuan',
                'datasasaran.sasaran',
                'dataindikator.indikator',
                'datapejabateselontiga.nama_jabatan',
                'dataprogram.program',
                'dataindikatorprogrameselontiga.indikator',
                'datapejabateselonempat.nama_jabatan',
                'nomor_kegiatan',
                'kegiatan',
                'pagu_anggaran',
                'target_keuangan',
                'target_keuangan_triwulan1',
                'target_keuangan_triwulan2',
                'target_keuangan_triwulan3',
                'target_keuangan_triwulan4',
                'realisasi_keuangan_triwulan1',
                'realisasi_keuangan_triwulan2',
                'realisasi_keuangan_triwulan3',
                'realisasi_keuangan_triwulan4',
                'realisasi_keuangan',
                'target_fisik',
                'target_fisik_triwulan1',
                'target_fisik_triwulan2',
                'target_fisik_triwulan3',
                'target_fisik_triwulan4',
                'realisasi_fisik',
                'realisasi_fisik_triwulan1',
                'realisasi_fisik_triwulan2',
                'realisasi_fisik_triwulan3',
                'realisasi_fisik_triwulan4',
                'nomor_misi_provinsi',
                'nomor_sasaran_provinsi',
                'dataindikatorprov.indikator',
                'ket',
                array('class' => 'bootstrap.widgets.TbButtonColumn', 'deleteConfirmation' => "js:'Anda yakin menghapus data ini ?'",)
            ),
        )); ?>
    </div>
</div>
