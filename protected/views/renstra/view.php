<?php
/* @var $this RenstraController */
/* @var $model Datarenstra */
?>

<?php
$this->breadcrumbs = array(
    'Datarenstras' => array('index'),
    $model->renstraid,
);

$this->menu = array(
    array('label' => 'Daftar Datarenstra', 'url' => array('index')),
    array('label' => 'Tambah Datarenstra', 'url' => array('create')),
    array('label' => 'Update Datarenstra', 'url' => array('update', 'id' => $model->renstraid)),
    array('label' => 'Hapus Datarenstra', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->renstraid), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<div class="top-bar clearfix">
    <div class="page-title">
        <h4>
            <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
            Data Renstra
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
                'renstraid',
                'datainstansi.nama_instansi',
                'keterangan_renstra',
                'data_file_renstra',
            ),
        )); ?>
    </div>
</div>
