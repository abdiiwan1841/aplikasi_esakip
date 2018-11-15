<?php
/* @var $this RenstraController */
/* @var $model Datarenstra */
?>

<?php
$this->breadcrumbs = array(
    'Dataikus' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'Daftar Data IKU', 'url' => array('index')),
);
?>

<div class="top-bar clearfix">
    <div class="page-title">
        <h4>
            <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
            Tambah Data IKU
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

        <?php $this->renderPartial('_form', array('model' => $model)); ?>
    </div>
</div>
