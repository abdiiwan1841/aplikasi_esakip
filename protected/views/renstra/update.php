<?php
/* @var $this RenstraController */
/* @var $model Datarenstra */
?>

<?php
$this->breadcrumbs = array(
    'Datarenstras' => array('index'),
    $model->renstraid => array('view', 'id' => $model->renstraid),
    'Update',
);

$this->menu = array(
    array('label' => 'Daftar Data Renstra', 'url' => array('index')),
    array('label' => 'Tambah Data Renstra', 'url' => array('create')),
    array('label' => 'View Data Renstra', 'url' => array('view', 'id' => $model->renstraid)),
);
?>

<div class="top-bar clearfix">
    <div class="page-title">
        <h4>
            <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
            Update Data Renstra
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
