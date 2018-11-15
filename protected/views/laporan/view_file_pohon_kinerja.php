<?php
/* @var $this RenstraController */
/* @var $model Datarenstra */
?>

<?php
$this->breadcrumbs = array(
    'Datafilepohonkinerja' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'Daftar File Pohon Kinerja', 'url' => array('indexPohonKinerja')),
    array('label' => 'Tambah File Pohon Kinerja', 'url' => array('uploadFilePohonKinerja')),
    array('label' => 'Update File Pohon Kinerja', 'url' => array('updateDataFilePohonKinerja', 'id' => $model->id)),
    array('label' => 'Hapus File Pohon Kinerja', 'url' => '#', 'linkOptions' => array('submit' => array('deleteFilePohonKinerja', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<div class="top-bar clearfix">
    <div class="page-title">
        <h4>
            <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
            Data Detail File Pohon Kinerja
        </h4>
    </div>
    <div class="pull-right" id="mini-nav-right">
        <?php
        echo TbHtml::buttonDropdown('Aksi', $this->menu, array('split' => false, 'dropup' => false, 'menuOptions' => array('pull' => TbHtml::PULL_RIGHT)));
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
                'id',
                'id_instansi',
                'datainstansi.nama_instansi',
                'file_pk',
                'keterangan',
                'update_time',
            ),
        )); ?>
    </div>
</div>
