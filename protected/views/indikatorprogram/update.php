<?php
/* @var $this IndikatorprogramController */
/* @var $model IndikatorProgram */
?>

<?php
$this->breadcrumbs=array(
	'Indikator Program'=>array('index'),
	$model->indikatorid=>array('view','id'=>$model->indikatorid),
	'Update',
);

$this->menu=array(
	array('label'=>'Daftar Indikator Program', 'url'=>array('index')),
	array('label'=>'Tambah Indikato rProgram', 'url'=>array('create')),
	array('label'=>'View Indikator Program', 'url'=>array('view', 'id'=>$model->indikatorid)),
);
?>


<div class="top-bar clearfix">
    <div class="page-title">
        <h4>
            <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
            Update Data Indikator Program
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



    