<?php
/* @var $this IndikatorController */
/* @var $model Indikator */
?>

<?php
$this->breadcrumbs = array(
    'Indikators' => array('eselonEmpat'),
    $model->indikatorid => array('viewEselonEmpat', 'id' => $model->indikatorid),
    'Update',
);

$this->menu = array(
    array('label' => 'Daftar Indikator', 'url' => array('eselonEmpat')),
    array('label' => 'Tambah Indikator', 'url' => array('createEselonEmpat')),
    array('label' => 'View Indikator', 'url' => array('viewEselonEmpat', 'id' => $model->indikatorid)),
);
?>

<div class="top-bar clearfix">
    <div class="page-title">
        <h4>
            <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
            Update Data Indikator Eselon 4
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
