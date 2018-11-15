<?php
/* @var $this DataikuController */
/* @var $model Dataiku */
?>

<?php
$this->breadcrumbs = array(
    'Dataikus' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'Daftar Data PK', 'url' => array('index')),
    array('label' => 'Tambah Data Anggaran', 'url' => array('create')),
    array('label' => 'View Data Anggaran', 'url' => array('viewpagu', 'id' => $model->id)),
);
?>

<div class="top-bar clearfix">
    <div class="page-title">
        <h4>
            <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
            Update Data Anggaran
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

        <?php $this->renderPartial('_formpagu', array('model' => $model)); ?>
    </div>
</div>
