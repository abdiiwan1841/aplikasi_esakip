<!-- Top Bar Starts -->
<div class="top-bar clearfix">
<div class="page-title">
    <h4>
        <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
        Data File Pohon Kinerja
    </h4>
</div>
<div class="pull-right" id="mini-nav-right">
    
<a href="<?php echo Yii::app()->baseUrl; ?>/laporan/pohonkinerja" class="btn btn-warning btn-xs" rel="tooltip"
       data-original-title="Lihat Struktur Pohon Kinerja"> Lihat Struktur Pohon Kinerja
    </a>
    
    <a href="<?php echo Yii::app()->baseUrl; ?>/laporan/uploadFilePohonKinerja" class="btn btn-info btn-xs" rel="tooltip"
       data-original-title="Upload File Pohon Kinerja"> Upload File Pohon Kinerja
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
        'id',
        'id_instansi',
        'keterangan',
        array(
            'header' => 'File Pohon Kinerja',
            'name' => 'file_pk',
            'type' => 'raw',
            'value' => 'CHtml::link($data->file_pk,
                    Yii::app()->createUrl("static/filepohonkinerja/$data->file_pk"),
                    array("target"=>"_blank") )',
        ),
        'update_time',
        array('class' => 'bootstrap.widgets.TbButtonColumn', 'deleteConfirmation' => "js:'Anda yakin menghapus data ini ?'",
        'template'=>'{view} {update} {delete}',
        'buttons' => array(
            'view' => array('url' => 'Yii::app()->controller->createUrl("viewDataFilePohonKinerja",array("id"=>$data->id))'),
            'update' => array('url' => 'Yii::app()->controller->createUrl("updateDataFilePohonKinerja",array("id"=>$data->id))'),
            'delete' => array('url' => 'Yii::app()->controller->createUrl("deleteFilePohonKinerja",array("id"=>$data->id))'),
        ),)
    );

    if (Yii::app()->user->isAdmin()) {
        $coul = array(
            'id',
            'id_instansi',
            'keterangan',
            array(
                'header' => 'File Pohon Kinerja',
                'name' => 'file_pk',
                'type' => 'raw',
                'value' => 'CHtml::link($data->file_pk,
                        Yii::app()->createUrl("static/filepohonkinerja/$data->file_pk"),
                        array("target"=>"_blank") )',
            ),
            'update_time',
            array('class' => 'bootstrap.widgets.TbButtonColumn', 'deleteConfirmation' => "js:'Anda yakin menghapus data ini ?'",
            'template'=>'{view} {update} {delete}',
            'buttons' => array(
                'view' => array('url' => 'Yii::app()->controller->createUrl("viewDataFilePohonKinerja",array("id"=>$data->id))'),
                'update' => array('url' => 'Yii::app()->controller->createUrl("updateDataFilePohonKinerja",array("id"=>$data->id))'),
                'delete' => array('url' => 'Yii::app()->controller->createUrl("deleteFilePohonKinerja",array("id"=>$data->id))'),
            ),)
        );
    }

    $this->widget('\TbGridView', array(
        'id' => 'renstra-grid',
        'type' => array(TbHtml::GRID_TYPE_CONDENSED, TbHtml::GRID_TYPE_HOVER, TbHtml::GRID_TYPE_BORDERED),
        'dataProvider' => $model->search(),
        'filter' => $model,
        'htmlOptions'=> array('class'=>'table-responsive'),
        'columns' => $coul,
    )); ?>
    <!-- Row Ends -->
</div>
<!-- Spacer ends -->
</div>
<!-- Container fluid ends -->