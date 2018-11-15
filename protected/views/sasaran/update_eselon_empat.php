<?php
/* @var $this SasaranController */
/* @var $model Sasaran */
?>

<?php
$this->breadcrumbs = array(
    'Sasarans' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'Daftar Sasaran', 'url' => array('EselonEmpat')),
    array('label' => 'Tambah Sasaran', 'url' => array('createEselonEmpat')),
    array('label' => 'View Sasaran', 'url' => array('viewEselonEmpat', 'id' => $model->id)),
);
?>

<div class="top-bar clearfix">
    <div class="page-title">
        <h4>
            <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
            Update Data Sasaran Eselon 4
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

        <?php $this->renderPartial('_form_eselon_empat', array('model' => $model)); ?>
    </div>
</div>
