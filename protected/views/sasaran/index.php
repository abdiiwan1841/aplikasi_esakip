<!-- Top Bar Starts -->
<div class="top-bar clearfix">
    <div class="page-title">
        <h4>
            <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
            Data Sasaran
        </h4>
    </div>
    <div class="pull-right" id="mini-nav-right">

        <a href="<?php echo Yii::app()->baseUrl; ?>/sasaran/eselonTiga" class="btn btn-info btn-xs" rel="tooltip"
           data-original-title="Data Sasaran Eselon 3">
           Eselon 3
        </a>

        <a href="<?php echo Yii::app()->baseUrl; ?>/sasaran/eselonEmpat" class="btn btn-info btn-xs" rel="tooltip"
           data-original-title="Data Sasaran Eselon 4">
            Eselon 4
        </a>

        <a href="<?php echo Yii::app()->baseUrl; ?>/sasaran/create" class="btn btn-info btn-xs" rel="tooltip"
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
            'nomor_misi',
            'nomor_tujuan',
            'nomor_sasaran',
            'sasaran',
            array('class' => 'bootstrap.widgets.TbButtonColumn', 'deleteConfirmation' => "js:'Anda yakin menghapus data ini ?'",)
        );

        if (Yii::app()->user->isAdmin()) {
            $coul = array(
                'datainstansi.nama_instansi',
                'datamisi.misi',
                'datatujuan.tujuan',
                'nomor_sasaran',
                'sasaran',
                array('class' => 'bootstrap.widgets.TbButtonColumn', 'deleteConfirmation' => "js:'Anda yakin menghapus data ini ?'",)
            );
        }
        $this->widget('\TbGridView', array(
            'id' => 'sasaran-grid',
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