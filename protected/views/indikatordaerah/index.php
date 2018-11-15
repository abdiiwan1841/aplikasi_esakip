<?php
/* @var $this IndikatordaerahController */
/* @var $model Indikatordaerah */

$this->menu=array(
    array('label'=>'Tambah Indikatordaerah', 'url'=>array('create')),
);

?>

    <!-- Top Bar Starts -->
    <div class="top-bar clearfix">
        <div class="page-title">
            <h4>
                <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
                Data Indikator Kinerja Utama
            </h4>
        </div>
        <div class="pull-right" id="mini-nav-right">
            <a href="<?php echo Yii::app()->baseUrl; ?>/indikatordaerah/create" class="btn btn-info btn-xs" rel="tooltip"
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


<?php $this->widget('\TbGridView',array(
    'id'=>'indikatordaerah-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'htmlOptions'=> array('class'=>'table-responsive'),
    'emptyText'=>'Belum ada datanya..',
    'columns'=>array(
        'datamisi.misi',
		'dataindikator.indikator',
		'nomor_indikator',
		'indikator',
		/*'target_keu',
		'realisasi_keu',*/
		/*'formulasi',*/
		'sumber_data',
        array('class' => 'bootstrap.widgets.TbButtonColumn', 'deleteConfirmation' => "js:'Anda yakin menghapus data ini ?'",)
)));
?>
        </div>
    </div>




