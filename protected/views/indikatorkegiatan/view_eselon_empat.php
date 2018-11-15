<?php
/* @var $this IndikatorController */
/* @var $model Indikator */
?>

<?php
$this->breadcrumbs = array(
    'Indikators' => array('eselonEmpat'),
    $model->indikatorid,
);

$this->menu = array(
    array('label' => 'Daftar Indikator', 'url' => array('eselonEmpat')),
    array('label' => 'Tambah Indikator', 'url' => array('createEselonEmpat')),
    array('label' => 'Update Indikator', 'url' => array('updateEselonEmpat', 'id' => $model->indikatorid)),
    array('label' => 'Hapus Indikator', 'url' => '#', 'linkOptions' => array('submit' => array('deleteEselonEmpat', 'id' => $model->indikatorid), 'confirm' => 'Anda yakin menghapus data ini ?')),
);
?>

<div class="top-bar clearfix">
    <div class="page-title">
        <h4>
            <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
            Data Indikator Kegiatan Eselon 4
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
                'dataprogrameselontiga.program',
                'datapejabateselontiga.nama_jabatan',
                'dataindikatorprogrameselontiga.indikator',
                'datapejabateselonempat.nama_jabatan',
                'datakegiataneselonempat.kegiatan',
                'nomor_indikator',
                'indikator',
                'satuan',
                array(
                    'name' => 'indikator_kinerja_utama',
                    'value' => $model->indikator_kinerja_utama == 1 ? "Ya" : "Tidak",
                ),
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
                array(
                    'name' => 'indikator_pk',
                    'value' => $model->indikator_pk == 1 ? "Mendukung" : "Tidak Mendukung",
                ),
            ),
        )); ?>
    </div>
</div>
