<?php
/* @var $this ProgramController */
/* @var $model Program */
?>

<?php
$this->breadcrumbs = array(
    'Programs' => array('uploadfilepohonkinerja'),
    $model->id,
);

$this->menu = array(
    array('label' => 'Daftar File Pohon Kinerja', 'url' => array('uploadfilepohonkinerja')),
    array('label' => 'Hapus File Pohon Kinerja', 'url' => '#', 'linkOptions' => array('submit' => array('DeleteFilePohonKinerja', 'id' => $model->id), 'confirm' => 'Anda yakin menghapus data ini ?')),
);
?>

<div class="top-bar clearfix">
    <div class="page-title">
        <h4>
            <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
            Data Upload File Pohon Kinerja
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
                'id',
                'id_instansi',
                'file_pk',
                'update_time',
            ),
        )); ?>
    </div>
</div>
