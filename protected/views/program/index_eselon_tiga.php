<!-- Top Bar Starts -->
<div class="top-bar clearfix">
    <div class="page-title">
        <h4>
            <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
            Data Program Eselon 3
        </h4>
    </div>
    <div class="pull-right" id="mini-nav-right">

        <a href="<?php echo Yii::app()->baseUrl; ?>/program/index" class="btn btn-info btn-xs" rel="tooltip"
           data-original-title="Data Program Eselon 3">
           Eselon 2
        </a>
        
        <a href="<?php echo Yii::app()->baseUrl; ?>/program/eselonTiga" class="btn btn-warning btn-xs" rel="tooltip"
           data-original-title="Data Program Eselon 3">
           Eselon 3
        </a>

        <a href="<?php echo Yii::app()->baseUrl; ?>/program/createEselonTiga" class="btn btn-info btn-xs" rel="tooltip"
           data-original-title="Tambah Program Eselon Tiga">
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
            'nomor_misi',
            'nomor_tujuan',
            'nomor_sasaran',
            'nomor_indikator',
            'nomor_program',
            'program',
            array('class' => 'bootstrap.widgets.TbButtonColumn', 'deleteConfirmation' => "js:'Anda yakin menghapus data ini ?'",
            'template'=>'{view} {update} {delete}',
            'buttons' => array(
                'view' => array('url' => 'Yii::app()->controller->createUrl("viewEselonTiga",array("id"=>$data->programid))'),
                'update' => array('url' => 'Yii::app()->controller->createUrl("updateEselonTiga",array("id"=>$data->programid))'),
                'delete' => array('url' => 'Yii::app()->controller->createUrl("deleteEselonTiga",array("id"=>$data->programid))'),
            ),
            )
        );

        if (Yii::app()->user->isAdmin()) {
            $coul = array(
                'datainstansi.nama_instansi',
                'nomor_misi',
                'nomor_tujuan',
                'nomor_sasaran',
                'nomor_indikator',
                'nomor_program',
                'program',
                array('class' => 'bootstrap.widgets.TbButtonColumn', 'deleteConfirmation' => "js:'Anda yakin menghapus data ini ?'",)
            );
        }

        $this->widget('\TbGridView', array(
            'id' => 'program-grid',
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