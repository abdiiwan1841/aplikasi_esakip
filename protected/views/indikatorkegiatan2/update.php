<?php
/* @var $this IndikatorkegiatanController */
/* @var $model IndikatorKegiatan */
?>

<?php
$this->breadcrumbs=array(
	'Indikator Kegiatans'=>array('index'),
	$model->indikatorid=>array('view','id'=>$model->indikatorid),
	'Update',
);

$this->menu=array(
	array('label'=>'Daftar IndikatorKegiatan', 'url'=>array('index')),
	array('label'=>'Tambah IndikatorKegiatan', 'url'=>array('create')),
	array('label'=>'View IndikatorKegiatan', 'url'=>array('view', 'id'=>$model->indikatorid)),
);
?>

    <h1>Update  <?php echo $model->indikatorid; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>