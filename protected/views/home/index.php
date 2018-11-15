<!--<link href="<?php /*echo Yii::app()->baseUrl;*/ ?>/static/css/jquery.toastmessage.css" rel="stylesheet" media="screen">
<script src="<?php /*echo Yii::app()->baseUrl;*/ ?>/static/js/jquery.toastmessage.js"></script>-->
<!-- Top Bar Starts -->
<div class="top-bar clearfix">
    <div class="page-title">
        <h4>
            <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
            Dashboard Informasi
        </h4>
    </div>

</div>
<!-- Top Bar Ends -->

<!-- Container fluid Starts -->
<div class="container-fluid">
    <!-- Spacer starts -->
    <div class="spacer-xs">
        <!-- Row Starts -->
        <div class="row no-gutter">
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="panel" style="background-color: red;">
                    <div class="panel-heading">
                        <h4>Total Visi</h4>
                    </div>
                    <div class="panel-body">
                        <div class="daily-stats">
                            <h1 class="number" style="color: #333333;">
                                <?php echo Yii::app()->format->formatNumber($jmlVisi) ?>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="panel" style="background-color: blue;">
                    <div class="panel-heading">
                        <h4>Total Misi</h4>
                    </div>
                    <div class="panel-body">
                        <div class="daily-stats">
                            <h1 class="number primary" style="color: #fcfcfc;">
                                <?php echo Yii::app()->format->formatNumber($jmlMisi) ?>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="panel" style="background-color: green;">
                    <div class="panel-heading">
                        <h4>Total Tujuan</h4>
                    </div>
                    <div class="panel-body">
                        <div class="daily-stats">
                            <h1 class="number primary" style="color: #fcfcfc;">
                                <?php echo Yii::app()->format->formatNumber($jmlTujuan) ?>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="panel" style="background-color: pink;">
                    <div class="panel-heading">
                        <h4>Total Sasaran</h4>
                    </div>
                    <div class="panel-body">
                        <div class="daily-stats">
                            <h1 class="number primary" >
                                <?php echo Yii::app()->format->formatNumber($jmlSasaran) ?>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row no-gutter">
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="panel" style="background-color: orange;">
                    <div class="panel-heading">
                        <h4>Total Indikator</h4>
                    </div>
                    <div class="panel-body">
                        <div class="daily-stats">
                            <h1 class="number" style="color: #333333;">
                                <?php echo Yii::app()->format->formatNumber($jmlIndikator) ?>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="panel" style="background-color: lightgreen;">
                    <div class="panel-heading">
                        <h4>Total Program</h4>
                    </div>
                    <div class="panel-body">
                        <div class="daily-stats">
                            <h1 class="number primary">
                                <?php echo Yii::app()->format->formatNumber($jmlProgram) ?>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="panel" style="background-color: lightblue;">
                    <div class="panel-heading">
                        <h4>Total Kegiatan</h4>
                    </div>
                    <div class="panel-body">
                        <div class="daily-stats">
                            <h1 class="number primary">
                                <?php echo Yii::app()->format->formatNumber($jmlKegiatan) ?>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="panel" style="background-color: #ff00ff;">
                    <div class="panel-heading">
                        <h4>Total Aktivitas</h4>
                    </div>
                    <div class="panel-body">
                        <div class="daily-stats">
                            <h1 class="number primary" style="color: #333333;">
                                <?php echo Yii::app()->format->formatNumber($jmlAktivitas) ?>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <div class="row no-gutter">
                <?php if (Yii::app()->user->isAdmin()) { ?>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="panel" style="background-color: #000066;">
                        <div class="panel-heading">
                            <h4>Total User</h4>
                        </div>
                        <div class="panel-body">
                            <div class="daily-stats">
                                <h1 class="number">
                                    <?php echo Yii::app()->format->formatNumber($jmlUser) ?>
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="panel" style="background-color: #ffcc66;">
                        <div class="panel-heading">
                            <h4>Total OPD</h4>
                        </div>
                        <div class="panel-body">
                            <div class="daily-stats">
                                <h1 class="number primary">
                                    <?php echo Yii::app()->format->formatNumber($jmlOpd) ?>
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            <?php if (Yii::app()->user->isAdminOPD() || Yii::app()->user->isAdmin()) { ?>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="panel" style="background-color: #993333;">
                        <div class="panel-heading">
                            <h4>Total User OPD</h4>
                        </div>
                        <div class="panel-body">
                            <div class="daily-stats">
                                <h1 class="number primary">
                                    <?php echo Yii::app()->format->formatNumber($jmlUserOpd) ?>
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="panel" style="background-color: #cc3300;">
                        <div class="panel-heading">
                            <h4>Total Admin</h4>
                        </div>
                        <div class="panel-body">
                            <div class="daily-stats">
                                <h1 class="number primary">
                                    <?php echo Yii::app()->format->formatNumber($jmlUserAdmin) ?>
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <!-- Row Ends -->
    </div>
    <!-- Spacer ends -->
</div>
<!-- Container fluid ends -->