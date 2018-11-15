<?php
/* @var $this AktivitasController */
/* @var $model Aktivitas */
?>

<?php
$this->breadcrumbs = array(
    'Aktivitases' => array('index'),
    $model->aktivitasid => array('view', 'id' => $model->aktivitasid),
    'Update',
);

$this->menu = array(
    array('label' => 'Daftar Aktivitas', 'url' => array('index')),
    array('label' => 'Tambah Aktivitas', 'url' => array('create')),
    array('label' => 'View Aktivitas', 'url' => array('view', 'id' => $model->aktivitasid)),
);
?>

<div class="top-bar clearfix">
    <div class="page-title">
        <h4>
            <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
            Update Data Aktivitas
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

        <?php $this->renderPartial('_form', array('model' => $model)); ?>
    </div>
</div>
