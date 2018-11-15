<?php
/* @var $this RenjaController */
/* @var $model Datarenja */
?>

<?php
$this->breadcrumbs = array(
    'Datarenjas' => array('index'),
    $model->renjaid,
);

$this->menu = array(
    array('label' => 'Daftar Datarenja', 'url' => array('index')),
    array('label' => 'Tambah Datarenja', 'url' => array('create')),
    array('label' => 'Update Datarenja', 'url' => array('update', 'id' => $model->renjaid)),
    array('label' => 'Hapus Datarenja', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->renjaid), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<div class="top-bar clearfix">
    <div class="page-title">
        <h4>
            <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
            Data Renja
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
                'renjaid',
                'datainstansi.nama_instansi',
                'keterangan_renja',
                'data_file_renja',
            ),
        )); ?>
    </div>
</div>
