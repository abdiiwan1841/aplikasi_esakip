<?php
/* @var $this TujuanController */
/* @var $model Tujuan */
?>

<?php
$this->breadcrumbs = array(
    'Tujuans' => array('index'),
    $model->tujuanid => array('view', 'id' => $model->tujuanid),
    'Update',
);

$this->menu = array(
    array('label' => 'Daftar Tujuan', 'url' => array('index')),
    array('label' => 'Tambah Tujuan', 'url' => array('create')),
    array('label' => 'View Tujuan', 'url' => array('view', 'id' => $model->tujuanid)),
);
?>

<div class="top-bar clearfix">
    <div class="page-title">
        <h4>
            <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
            Update Data Tujuan
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
