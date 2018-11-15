<?php
/* @var $this RenjaController */
/* @var $model Datarenja */
?>

<?php
$this->breadcrumbs = array(
    'Datarenjas' => array('index'),
    $model->renjaid => array('view', 'id' => $model->renjaid),
    'Update',
);

$this->menu = array(
    array('label' => 'Daftar Data Renja', 'url' => array('index')),
    array('label' => 'Tambah Data Renja', 'url' => array('create')),
    array('label' => 'View Data Renja', 'url' => array('view', 'id' => $model->renjaid)),
);
?>

<div class="top-bar clearfix">
    <div class="page-title">
        <h4>
            <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
            Update Data Renja
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
