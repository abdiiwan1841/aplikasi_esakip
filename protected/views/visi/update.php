<?php
/* @var $this VisiController */
/* @var $model Tvisi */
?>

<?php
$this->breadcrumbs = array(
    'Tvisis' => array('index'),
    $model->id_instansi => array('view', 'id' => $model->id_instansi),
    'Update',
);


$this->menu = array(
    array('label' => 'Daftar Visi', 'url' => array('index')),
    array('label' => 'View Visi', 'url' => array('view', 'id' => $model->id_instansi)),
);

if (Yii::app()->user->isAdmin()) {
    $this->menu = array(
        array('label' => 'Daftar Visi', 'url' => array('index')),
        array('label' => 'Tambah Visi', 'url' => array('create')),
        array('label' => 'View Visi', 'url' => array('view', 'id' => $model->id_instansi)),
    );
}
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
