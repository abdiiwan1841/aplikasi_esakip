<?php
/* @var $this MisiController */
/* @var $model Misi */
?>

<?php
$this->breadcrumbs = array(
    'Misis' => array('index'),
    $model->misid => array('view', 'id' => $model->misid),
    'Update',
);

$this->menu = array(
    array('label' => 'Daftar Misi', 'url' => array('index')),
    array('label' => 'Tambah Misi', 'url' => array('create')),
    array('label' => 'View Misi', 'url' => array('view', 'id' => $model->misid)),
);
?>

<div class="top-bar clearfix">
    <div class="page-title">
        <h4>
            <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
            Update Data Misi
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
