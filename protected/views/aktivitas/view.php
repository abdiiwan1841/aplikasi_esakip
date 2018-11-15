<?php
/* @var $this AktivitasController */
/* @var $model Aktivitas */
?>

<?php
$this->breadcrumbs = array(
    'Aktivitases' => array('index'),
    $model->aktivitasid,
);

$this->menu = array(
    array('label' => 'Daftar Aktivitas', 'url' => array('index')),
    array('label' => 'Tambah Aktivitas', 'url' => array('create')),
    array('label' => 'Update Aktivitas', 'url' => array('update', 'id' => $model->aktivitasid)),
    array('label' => 'Hapus Aktivitas', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->aktivitasid), 'confirm' => 'Anda yakin menghapus data ini ?')),
);
?>

<div class="top-bar clearfix">
    <div class="page-title">
        <h4>
            <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
            Data Aktivitas
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
        <?php $this->widget('zii.widgets.CDetailView', array(
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
                'dataprogram.program',
                'datakegiatan.kegiatan',
                'nomor_aktivitas',
                'aktivitas',
                'pagu_anggaran',
                'target_keuangan',
                'target_keuangan_triwulan1',
                'target_keuangan_triwulan2',
                'target_keuangan_triwulan3',
                'target_keuangan_triwulan4',
                'realisasi_keuangan',
                'realisasi_keuangan_triwulan1',
                'realisasi_keuangan_triwulan2',
                'realisasi_keuangan_triwulan3',
                'realisasi_keuangan_triwulan4',
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
            ),
        )); ?>
    </div>
</div>
