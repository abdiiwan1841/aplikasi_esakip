<?php
/* @var $this PejabatController */
/* @var $model Pejabat */
?>

<?php
$this->breadcrumbs=array(
	'Pejabats'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Daftar Pejabat', 'url'=>array('index')),
	array('label'=>'Tambah Pejabat', 'url'=>array('create')),
	array('label'=>'Update Pejabat', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Hapus Pejabat', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>


    <div class="top-bar clearfix">
        <div class="page-title">
            <h4>
                <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
                Data Pejabat
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

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'datainstansi.nama_instansi',
		'dataatasan.nama_pejabat',
		'nama_pejabat',
		'nama_jabatan',
		'nip_pejabat',
        'eselon',
		'nama_golongan_pejabat',
	),
)); ?>
        </div>
    </div>
