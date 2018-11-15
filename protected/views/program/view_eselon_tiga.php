<?php
/* @var $this ProgramController */
/* @var $model Program */
?>

<?php
$this->breadcrumbs = array(
    'Programs' => array('eselonTiga'),
    $model->programid,
);

$this->menu = array(
    array('label' => 'Daftar Program', 'url' => array('eselonTiga')),
    array('label' => 'Tambah Program', 'url' => array('createEselonTiga')),
    array('label' => 'Update Program', 'url' => array('updateEselonTiga', 'id' => $model->programid)),
    array('label' => 'Hapus Program', 'url' => '#', 'linkOptions' => array('submit' => array('deleteEselonTiga', 'id' => $model->programid), 'confirm' => 'Anda yakin menghapus data ini ?')),
);
?>

<div class="top-bar clearfix">
    <div class="page-title">
        <h4>
            <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
            Data Program Eselon 3
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
                'datapejabateselontiga.nama_jabatan',
                'nomor_program',
                'program',
                'pagu_anggaran',
                'target_keuangan',
                'realisasi_keuangan',
                'target_fisik',
                'realisasi_fisik',
                'keterangan',
            ),
        )); ?>
    </div>
</div>