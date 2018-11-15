<!-- Top Bar Starts -->
<div class="top-bar clearfix">
<div class="page-title">
    <h4>
        <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
        Data File Cascading
    </h4>
</div>
<div class="pull-right" id="mini-nav-right">
    
<a href="<?php echo Yii::app()->baseUrl; ?>/laporan/cascading" class="btn btn-warning btn-xs" rel="tooltip"
       data-original-title="Lihat Struktur Pohon Kinerja"> Lihat Struktur Cascading
    </a>
    
    <a href="<?php echo Yii::app()->baseUrl; ?>/laporan/uploadFileCascading" class="btn btn-info btn-xs" rel="tooltip"
       data-original-title="Upload File Pohon Kinerja"> Upload File Cascading
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
            'header' => 'File Cascading',
            'name' => 'file_cas',
            'type' => 'raw',
            'value' => 'CHtml::link($data->file_cas,
                    Yii::app()->createUrl("static/datacascading/$data->file_cas"),
                    array("target"=>"_blank") )',
        ),
        'update_time',
        array('class' => 'bootstrap.widgets.TbButtonColumn', 'deleteConfirmation' => "js:'Anda yakin menghapus data ini ?'",
        'template'=>'{view} {update} {delete}',
        'buttons' => array(
            'view' => array('url' => 'Yii::app()->controller->createUrl("viewDataFileCascading",array("id"=>$data->id))'),
            'update' => array('url' => 'Yii::app()->controller->createUrl("updateDataFileCascading",array("id"=>$data->id))'),
            'delete' => array('url' => 'Yii::app()->controller->createUrl("deleteFileCascading",array("id"=>$data->id))'),
        ),)
    );

    if (Yii::app()->user->isAdmin()) {
        $coul = array(
            'id',
            'id_instansi',
            'keterangan',
            array(
                'header' => 'File Cascading',
                'name' => 'file_cas',
                'type' => 'raw',
                'value' => 'CHtml::link($data->file_cas,
                        Yii::app()->createUrl("static/datacascading/$data->file_cas"),
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