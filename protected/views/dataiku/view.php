<?php
/* @var $this DataikuController */
/* @var $model Dataiku */
?>

<?php
$this->breadcrumbs = array(
    'Dataikus' => array('index'),
    $model->ikuid,
);

$this->menu = array(
    array('label' => 'Daftar Data IKU', 'url' => array('index')),
    array('label' => 'Tambah Data IKU', 'url' => array('create')),
    array('label' => 'Update Data IKU', 'url' => array('update', 'id' => $model->ikuid)),
    array('label' => 'Hapus Data IKU', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->ikuid), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<div class="top-bar clearfix">
    <div class="page-title">
        <h4>
            <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
            Data IKU
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
                'ikuid',
                'datainstansi.nama_instansi',
                'keterangan_iku',
                'data_file_iku',
            ),
        )); ?>
    </div>
</div>
