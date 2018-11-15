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
            <a href="<?php echo Yii::app()->baseUrl; ?>/ikuopd/show" class="btn btn-info btn-xs" rel="tooltip"
               data-original-title="Laporan IKU OPD" target="_blank">
                <i class="fa fa-file-pdf-o"></i>
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
    'id'=>'ikuopd-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'htmlOptions'=> array('class'=>'table-responsive'),
    'emptyText'=>'Belum ada datanya..',
    'columns'=>array(
        'sasaran',
		'data_pertimbangan',
		'sumber_data',
        array('class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view}{update}',
            )
)));
?>
        </div>
    </div>




