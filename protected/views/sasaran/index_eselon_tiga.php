<!-- Top Bar Starts -->
<div class="top-bar clearfix">
    <div class="page-title">
        <h4>
            <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
            Data Sasaran Eselon 3
        </h4>
    </div>
    <div class="pull-right" id="mini-nav-right">

        <a href="<?php echo Yii::app()->baseUrl; ?>/sasaran/" class="btn btn-info btn-xs" rel="tooltip"
           data-original-title="Data Sasaran Eselon 2">
            Eselon 2
        </a>

        <a href="<?php echo Yii::app()->baseUrl; ?>/sasaran/eselonTiga" class="btn btn-warning btn-xs" rel="tooltip"
           data-original-title="Data Sasaran Eselon 3">
            Eselon 3
        </a>

        <a href="<?php echo Yii::app()->baseUrl; ?>/sasaran/eselonEmpat" class="btn btn-info btn-xs" rel="tooltip"
           data-original-title="Data Sasaran Eselon 4">
           Eselon 4
        </a>

        <a href="<?php echo Yii::app()->baseUrl; ?>/sasaran/createEselonTiga" class="btn btn-info btn-xs" rel="tooltip"
           data-original-title="Tambah Sasaran Eselon 3">
            <i class="fa fa-plus-circle"></i>
        </a>

            <!-- <ul id="mini-nav" class="clearfix">
                <li class="list-box">
                    <a id="drop1" href="#" role="button" class="dropdown-toggle current-user" data-toggle="dropdown" ">
                        <?php echo Yii::app()->user->getName() ?> <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu sm fadeInUp animated messages">
                        <li class="dropdown-content">
                            <a href="#"><?php echo Yii::app()->user->getRoleName() ?></a>
                            <a href="<?php echo Yii::app()->baseUrl; ?>/login/chgpwd">Change Password</a>
                            <a href="<?php echo Yii::app()->baseUrl; ?>/site/logout">Logout</a>
                        </li>
                    </ul>
                </li>
                <li class="list-box hidden-lg hidden-md hidden-sm" id="mob-nav">
                    <a href="#">
                        <i class="fa fa-reorder"></i>
                    </a>
                </li>
            </ul> -->
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
            'nomor_sasaran_eselon_dua',
            'nomor_sasaran',
            'idpejabat',
            'sasaran',
            array('class' => 'bootstrap.widgets.TbButtonColumn', 'deleteConfirmation' => "js:'Anda yakin menghapus data ini ?'",
            'template'=>'{view} {update} {delete}',
            'buttons' => array(
                'view' => array('url' => 'Yii::app()->controller->createUrl("viewEselonTiga",array("id"=>$data->id))'),
                'update' => array('url' => 'Yii::app()->controller->createUrl("updateEselonTiga",array("id"=>$data->id))'),
                'delete' => array('url' => 'Yii::app()->controller->createUrl("deleteEselonTiga",array("id"=>$data->id))'),
            ),
            )
        );
        
        if (Yii::app()->user->isAdmin()) {
            $coul = array(
                'datainstansi.nama_instansi',
                'datamisi.misi',
                'datatujuan.tujuan',
                'datasasaran.sasaran',
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