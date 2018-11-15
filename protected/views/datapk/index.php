<!-- Top Bar Starts -->
<div class="top-bar clearfix">
    <div class="page-title">
        <h4>
            <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
            Manajemen PK
        </h4>
    </div>
    <div class="pull-right" id="mini-nav-right">
        <a href="<?php echo Yii::app()->baseUrl; ?>/datapk/create" class="btn btn-info btn-xs" rel="tooltip"
           data-original-title="Tambah PK">
            <i class="fa fa-plus-circle"></i>
        </a>
        <a href="<?php echo Yii::app()->baseUrl; ?>/datapk/createpagu" class="btn btn-info btn-xs" rel="tooltip"
           data-original-title="Tambah Anggaran">
            <i class="fa fa-plus"></i>
        </a>

    </div>
</div>
<!-- Top Bar Ends -->

<!-- Container fluid Starts -->
<div class="container-fluid">

    <!-- Spacer starts -->
    <div class="spacer-xs">
        <?php echo TbHtml::alert(TbHtml::ALERT_COLOR_DANGER, 'Kepala Dinas/OPD hanya mengisi anggaran'); ?>
        <form class="form-horizontal" role="form">
            <div class="row">
            <div class="form-group">
                <?php echo TbHtml::label('Nama Pejabat', '', array('class' => "col-md-2"));?>
                <?php
                $idOpd= Yii::app()->user->getOpd();
                $type_list=CHtml::listData(Pejabat::model()->findAll("id_instansi=$idOpd"),'id','fullname');
                echo TbHtml::dropDownList('xid',
                    $selected_value=$idx,
                    $type_list,
                    array('span' => 5,'empty'=>'--Pilih Pejabat--','submit' => ''));
                ?>
            </div>
            </div>
            <div class="row">
            <div class="form-group">
                <div class="col-md-offset-2 col-md-12">
                <a href="<?php echo Yii::app()->baseUrl."/datapk/showpkdata/&i=".$idx; ?>" target="_blank" class="btn btn-info  btn-xs">Dok. PK</a>
                <a href="<?php echo Yii::app()->baseUrl; ?>/datapk/showpk" class="btn btn-info btn-xs" rel="tooltip"
                   data-original-title="PK Kepala OPD" target="_blank">
                    <i class="fa fa-file-word-o"></i> Dok PK Kepala OPD
                </a>
                </div>
            </div></div>
        </form>

        <br/>
        <div class="row">
        <!-- Row Ends -->

        <?php

        $coul = array(
            'sasaran_strategis',
            'indikator',
            'target',
            array('class' => 'bootstrap.widgets.TbButtonColumn', 'deleteConfirmation' => "js:'Anda yakin menghapus data ini ?'",)
        );
        $this->widget('\TbGridView', array(
            'id' => 'kegiatan-grid',
            'type' => array(TbHtml::GRID_TYPE_CONDENSED, TbHtml::GRID_TYPE_HOVER, TbHtml::GRID_TYPE_BORDERED),
            'dataProvider' => $perjanjian->search(),
            'filter' => $perjanjian,
            'htmlOptions'=> array('class'=>'table-responsive'),
            'columns' => $coul,
        )); ?>

        <?php

        $coul = array(
            'nama_program',
            'pagu_anggaran',
            'sumber_dana',
            array('class' => 'bootstrap.widgets.TbButtonColumn', 'deleteConfirmation' => "js:'Anda yakin menghapus data ini ?'",
                'template'=>'{view} {update} {delete}',
                'buttons' => array(
                    'view' => array('url' => 'Yii::app()->controller->createUrl("viewpagu",array("id"=>$data->id))'),
                    'update' => array('url' => 'Yii::app()->controller->createUrl("updatepagu",array("id"=>$data->id))'),
                    'delete' => array('url' => 'Yii::app()->controller->createUrl("deletepagu",array("id"=>$data->id))'),
                ),
          )
        );
        $this->widget('\TbGridView', array(
            'id' => 'kegiatan-grid',
            'type' => array(TbHtml::GRID_TYPE_CONDENSED, TbHtml::GRID_TYPE_HOVER, TbHtml::GRID_TYPE_BORDERED),
            'dataProvider' => $anggaran->search(),
            'filter' => $anggaran,
            'htmlOptions'=> array('class'=>'table-responsive'),
            'columns' => $coul,
        )); ?>
        </div>
    </div>
    <!-- Spacer ends -->
</div>
<!-- Container fluid ends -->

