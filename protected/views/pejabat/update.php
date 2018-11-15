<?php
/* @var $this PejabatController */
/* @var $model Pejabat */
?>

<?php
$this->breadcrumbs=array(
	'Pejabats'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Daftar Pejabat', 'url'=>array('index')),
	array('label'=>'Tambah Pejabat', 'url'=>array('create')),
	array('label'=>'View Pejabat', 'url'=>array('view', 'id'=>$model->id)),
);
?>


    <div class="top-bar clearfix">
        <div class="page-title">
            <h4>
                <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
                Update Data Pejabat
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

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
        </div>
    </div>
