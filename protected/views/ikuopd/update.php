<?php
/* @var $this IndikatordaerahController */
/* @var $model Indikatordaerah */
?>

<?php
$this->breadcrumbs=array(
	'Indikatordaerahs'=>array('index'),
	$model->sasaranid=>array('view','id'=>$model->sasaranid),
	'Update',
);

$this->menu=array(
	array('label'=>'Daftar IKU', 'url'=>array('index')),
	array('label'=>'View IKU', 'url'=>array('view', 'id'=>$model->sasaranid)),
);
?>


    <div class="top-bar clearfix">
        <div class="page-title">
            <h4>
                <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
                Update Data Indikator Kinerja utama
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
