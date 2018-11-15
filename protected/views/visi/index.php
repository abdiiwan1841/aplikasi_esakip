<?php
?>

<!-- Top Bar Starts -->
<div class="top-bar clearfix">
    <div class="page-title">
        <h4>
            <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
            Data Visi
        </h4>
    </div>
    <?php if ($jmlVisi != "1") {
        ?>
        <div class="pull-right" id="mini-nav-right">
            <a href="<?php echo Yii::app()->baseUrl; ?>/visi/create" class="btn btn-info btn-xs" rel="tooltip"
               data-original-title="Tambah">
                <i class="fa fa-plus-circle"></i>
            </a>
        </div>
    <?php } ?>
</div>
<!-- Top Bar Ends -->

<!-- Container fluid Starts -->
<div class="container-fluid">
    <!-- Spacer starts -->
    <div class="spacer-xs">
        <!-- Row Starts -->
        <?php
        $coul = array(
            'visi',
            array('class' => 'bootstrap.widgets.TbButtonColumn', 'deleteConfirmation' => "js:'Anda yakin menghapus data ini ?'",)
        );

        if (Yii::app()->user->isAdmin()) {
            $coul = array(
                'datainstansi.nama_instansi',
                'id_instansi',
                'visi',
                array('class' => 'bootstrap.widgets.TbButtonColumn', 'deleteConfirmation' => "js:'Anda yakin menghapus data ini ?'",)
            );
        }
        $this->widget('\TbGridView', array(
            'id' => 'visi-grid',
            'dataProvider' => $model->search(),
            'filter' => Yii::app()->user->isAdmin() ? $model : null,
            'htmlOptions'=> array('class'=>'table-responsive'),
            'columns' => $coul,
        )); ?>

    </div>
    <!-- Spacer ends -->
</div>
<!-- Container fluid ends -->
