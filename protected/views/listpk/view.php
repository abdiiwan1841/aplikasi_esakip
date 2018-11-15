<?php
/* @var $this RenstraController */
/* @var $model Datarenstra */
?>

<?php
$this->breadcrumbs = array(
    'Datapks' => array('index'),
    $model->pkid,
);

$this->menu = array(
    array('label' => 'Daftar Data PK', 'url' => array('index')),
    array('label' => 'Tambah Data PK', 'url' => array('create')),
    array('label' => 'Update Data PK', 'url' => array('update', 'id' => $model->pkid)),
    array('label' => 'Hapus Data PK', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->pkid), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<div class="top-bar clearfix">
    <div class="page-title">
        <h4>
            <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
            Data pk
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
                'pkid',
                'datainstansi.nama_instansi',
                'keterangan_pk',
                'data_file_pk',
            ),
        )); ?>
    </div>
</div>
