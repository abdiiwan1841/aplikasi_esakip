<?php
/* @var $this RenstraController */
/* @var $model Datarenstra */
?>

<?php
$this->breadcrumbs = array(
    'Datapks' => array('index'),
    $model->pkid => array('view', 'id' => $model->pkid),
    'Update',
);

$this->menu = array(
    array('label' => 'Daftar Data PK', 'url' => array('index')),
    array('label' => 'Tambah Data PK', 'url' => array('create')),
    array('label' => 'View Data PK', 'url' => array('view', 'id' => $model->pkid)),
);
?>

<div class="top-bar clearfix">
    <div class="page-title">
        <h4>
            <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
            Update Data PK
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
