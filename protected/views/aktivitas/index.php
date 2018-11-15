<!-- Top Bar Starts -->
<?php

$this->menu = array(
    array('label' => 'Tambah Aktivitas', 'url' => array('create')),
    array('label' => 'Laporan Aksi', 'url' => array(Yii::app()->baseUrl . '/aktivitas/laporan')),
);
?>
<div class="top-bar clearfix">
    <div class="page-title">
        <h4>
            <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
            Data Aktivitas Kegiatan
        </h4>
    </div>
    <div class="pull-right" id="mini-nav-right">
        <div class="btn-group">
            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown" name="yt0" type="button"
                    aria-expanded="false">Aksi <b class="caret"></b></button>
            <ul role="menu" class="dropdown-menu pull-right">
                <li role="menuitem"><a tabindex="-1" href="<?php echo Yii::app()->baseUrl ?>/aktivitas/create">Tambah
                        Aktivitas</a></li>
                <li role="menuitem"><a tabindex="-1" href="<?php echo Yii::app()->baseUrl ?>/aktivitas/laporan">Rencana
                        Aksi</a></li>
            </ul>
        </div>
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
            'nomor_kegiatan',
            'nomor_aktivitas',
            'aktivitas',
            array('class' => 'bootstrap.widgets.TbButtonColumn', 'deleteConfirmation' => "js:'Anda yakin menghapus data ini ?'",)
        );

        if (Yii::app()->user->isAdmin()) {
            $coul = array(
                'datainstansi.nama_instansi',
                'nomor_misi',
                'nomor_tujuan',
                'nomor_sasaran',
                'nomor_indikator',
                'nomor_program',
                'nomor_kegiatan',
                'nomor_aktivitas',
                'aktivitas',
                array('class' => 'bootstrap.widgets.TbButtonColumn', 'deleteConfirmation' => "js:'Anda yakin menghapus data ini ?'",)
            );
        }
        $this->widget('\TbGridView', array(
            'id' => 'aktivitas-grid',
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