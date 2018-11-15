<?php
/* @var $this PejabatController */
/* @var $model Pejabat */

$this->menu=array(
    array('label'=>'Tambah Pejabat', 'url'=>array('create')),
);

?>

    <!-- Top Bar Starts -->
    <div class="top-bar clearfix">
        <div class="page-title">
            <h4>
                <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
                Data Pejabat
            </h4>
        </div>
        <div class="pull-right" id="mini-nav-right">
            <a href="<?php echo Yii::app()->baseUrl; ?>/pejabat/create" class="btn btn-info btn-xs" rel="tooltip"
               data-original-title="Tambah">
                <i class="fa fa-plus-circle"></i>
            </a>
        </div>
    </div>
    <!-- Top Bar Ends -->

    <!-- Container fluid Starts -->
    <div class="container-fluid">

        <!-- Spacer starts -->
        <div class="spacer-xs">
            <!-- Row Starts -->

<?php

$coul = array(
    'dataatasan.nama_pejabat',
    'nama_pejabat',
    'nama_jabatan',
    'nip_pejabat',
    'eselon',
    'nama_golongan_pejabat',
    array('class' => 'bootstrap.widgets.TbButtonColumn', 'deleteConfirmation' => "js:'Anda yakin menghapus data ini ?'",)
);

if (Yii::app()->user->isAdmin()) {
    $coul = array(
        'datainstansi.nama_instansi',
        'dataatasan.nama_pejabat',
        'nama_pejabat',
        'nama_jabatan',
        'nip_pejabat',
        'eselon',
        'nama_golongan_pejabat',
        array('class' => 'bootstrap.widgets.TbButtonColumn', 'deleteConfirmation' => "js:'Anda yakin menghapus data ini ?'",)
    );
}


$this->widget('\TbGridView',array(
    'id'=>'pejabat-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'htmlOptions'=> array('class'=>'table-responsive'),
    'emptyText'=>'Belum ada datanya..',
    'columns'=>$coul
)); ?>
        </div>
    </div>

