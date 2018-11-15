<?php
/* @var $this DataikuController */
/* @var $model Dataiku */
?>

<?php
$this->breadcrumbs = array(
    'Dataikus' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'Daftar Data PK', 'url' => array('index')),
    array('label' => 'Tambah Data Anggaran', 'url' => array('createpagu')),
    array('label' => 'Update Data Anggaran', 'url' => array('updatepagu', 'id' => $model->id)),
    array('label' => 'Hapus Data Anggaran', 'url' => '#', 'linkOptions' => array('submit' => array('deletepagu', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<div class="top-bar clearfix">
    <div class="page-title">
        <h4>
            <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
            Data PK
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
                'datapejabat.nama_pejabat',
                'nama_program',
                'pagu_anggaran',
                'sumber_dana'
            ),
        )); ?>
    </div>
</div>
