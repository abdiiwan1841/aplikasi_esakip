<?php
/* @var $this VisiController */
/* @var $model Tvisi */
?>

<?php
$this->breadcrumbs = array(
    'Tvisis' => array('index'),
    $model->id_instansi => array('view', 'id' => $model->usrxid),
    'Update',
);


$this->menu = array(
    array('label' => 'Daftar Pengguna', 'url' => array('index')),
    array('label' => 'View Pengguna', 'url' => array('view', 'id' => $model->usrxid)),
);

if (Yii::app()->user->isAdmin()) {
    $this->menu = array(
        array('label' => 'Daftar Pengguna', 'url' => array('index')),
        array('label' => 'Tambah Pengguna', 'url' => array('create')),
        array('label' => 'View Pengguna', 'url' => array('view', 'id' => $model->usrxid)),
    );
}
?>

<div class="top-bar clearfix">
    <div class="page-title">
        <h4>
            <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
            Update Data Pengguna
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
