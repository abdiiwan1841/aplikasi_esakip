<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="icon" type="image/x-icon" href="<?php echo Yii::app()->baseUrl; ?>/favicon.ico"/>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo Yii::app()->baseUrl; ?>/favicon.ico"/>
    <meta name="language" content="en">
    <?php Yii::app()->bootstrap->register(); ?>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <link href="<?php echo Yii::app()->baseUrl; ?>/static/css/animate.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/static/css/daterange.css">
    <link href="<?php echo Yii::app()->baseUrl; ?>/static/css/main.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/static/css/slidebars.css">

    <link href="<?php echo Yii::app()->baseUrl; ?>/static/bootstrap-3.3.5-dist/fonts/font-awesome.min.css"
          rel="stylesheet">

    <link href="<?php echo Yii::app()->baseUrl; ?>/static/bootstrap-3.3.5-dist/fonts/metrize.css" rel="stylesheet">
    <!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<aside id="sidebar">

    <!-- Logo starts -->
    <a href="<?php echo Yii::app()->baseUrl; ?>/home" class="logo">
        <img src="<?php echo Yii::app()->baseUrl; ?>/static/img/logo_sakip.png" alt="logo">
    </a>
    <!-- Logo ends -->
    <!-- Extras starts -->
    <div class="extras">
        <div class="ex-wrapper">
            <div class="alert alert-info">
                <strong>TA : <?php echo Yii::app()->user->getTahun(); ?></strong>
            </div>
        </div>
    </div>
    <!-- Extras ends -->
    <?php
    $ctrlName = strtolower($this->id);
    $arrActId = array("lap1", "lap2", "lap2", "lap3", "lap4", "lap5", "lap6", "lap7", "kontak", "manual", "perubahan", "faq");

    if (in_array(strtolower($this->action->id), $arrActId)) $ctrlName .= "/" . strtolower($this->action->id);

    $arrDash = array("home", "visi", "misi", "tujuan","indikatordaerah","indikatortujuan","dataiku");
    $arrData = array("sasaran", "indikator", "program", "kegiatan", "aktivitas", "rencanaaksi", "renja", "renstra","indikatorprogram","indikatorkegiatan");
    $arrLap = array("laporan", "laporan/lap1", "laporan/lap2", "laporan/lap3", "laporan/lap4", "laporan/lap5");
    $arrLap2 = array("laporan/lap6", "laporan/lap7", "mergerdata", "hapusdata");
    $arrAdm = array("userdata", "dataopd", "ikudata", "uudata", "istilahdata");
    $arrHelp = array("bantuan/kontak", "bantuan/manual", "bantuan/perubahan", "bantuan/faq");
    $arrKinerja = array("pejabat", "datapk","listpk");
    //Yii::app()->urlManager->parseUrl(Yii::app()->request);
    ?>
    <!-- Menu start -->
    <div id='menu'>
        <ul>
            <li class='has-sub <?php echo in_array($ctrlName, $arrDash) ? "active highlight" : "" ?>'>
                <a href='<?php echo Yii::app()->baseUrl; ?>/home'>
                    <div class="fs1 " aria-hidden="true" data-icon="&#xe007;"></div>
                    <span>Dashboard</span>
                </a>
                <ul <?php echo in_array($ctrlName, $arrDash) ? "style='display: block'" : "" ?>>
                    <li>
                        <a href='<?php echo Yii::app()->baseUrl; ?>/indikatordaerah' <?php echo $ctrlName === "indikatordaerah" ? "class='select'" : "" ?>>
                            <span>I.K.U</span>
                        </a>
                    </li>
                    <li>
                        <a href='<?php echo Yii::app()->baseUrl; ?>/dataiku' <?php echo $ctrlName === "dataiku" ? "class='select'" : "" ?>>
                            <span>Data I.K.U</span>
                        </a>
                    </li>
                    <li>
                        <a href='<?php echo Yii::app()->baseUrl; ?>/visi' <?php echo $ctrlName === "visi" ? "class='select'" : "" ?>>
                            <span>Visi</span>
                        </a>
                    </li>
                    <li>
                        <a href='<?php echo Yii::app()->baseUrl; ?>/misi' <?php echo $ctrlName === "misi" ? "class='select'" : "" ?>>
                            <span>Misi</span>
                        </a>
                    </li>
                    <li>
                        <a href='<?php echo Yii::app()->baseUrl; ?>/tujuan' <?php echo $ctrlName === "tujuan" ? "class='select'" : "" ?>>
                            <span>Tujuan</span>
                        </a>
                    </li>
                    <li>
                        <a href='<?php echo Yii::app()->baseUrl; ?>/indikatortujuan' <?php echo $ctrlName === "indikatortujuan" ? "class='select'" : "" ?>>
                            <span>Indikator Tujuan</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class='has-sub <?php echo in_array($ctrlName, $arrData) ? "active highlight" : "" ?>'>
                <a href='#'>
                    <div class="fs1" aria-hidden="true" data-icon="&#xe0a0;"></div>
                    <span>Data Capaian</span>
                </a>
                <ul <?php echo in_array($ctrlName, $arrData) ? "style='display: block'" : "" ?>>
                    <li>
                        <a href='<?php echo Yii::app()->baseUrl; ?>/sasaran' <?php echo $ctrlName === "sasaran" ? "class='select'" : "" ?>>
                            <span>Sasaran</span>
                        </a>
                    </li>
                    <li>
                        <a href='<?php echo Yii::app()->baseUrl; ?>/indikator' <?php echo $ctrlName === "indikator" ? "class='select'" : "" ?>>
                            <span>Indikator Sasaran</span>
                        </a>
                    </li>
                    <li>
                        <a href='<?php echo Yii::app()->baseUrl; ?>/program' <?php echo $ctrlName === "program" ? "class='select'" : "" ?>>
                            <span>Program</span>
                        </a>
                    </li>
                    <li>
                        <a href='<?php echo Yii::app()->baseUrl; ?>/indikatorprogram' <?php echo $ctrlName === "indikatorprogram" ? "class='select'" : "" ?>>
                            <span>Indikator program</span>
                        </a>
                    </li>
                    <li>
                        <a href='<?php echo Yii::app()->baseUrl; ?>/kegiatan' <?php echo $ctrlName === "kegiatan" ? "class='select'" : "" ?>>
                            <span>Kegiatan</span>
                        </a>
                    </li>
                    <li>
                        <a href='<?php echo Yii::app()->baseUrl; ?>/indikatorkegiatan' <?php echo $ctrlName === "indikatorkegiatan" ? "class='select'" : "" ?>>
                            <span>Indikator Kegiatan</span>
                        </a>
                    </li>
                    <li>
                        <a href='<?php echo Yii::app()->baseUrl; ?>/aktivitas' <?php echo $ctrlName === "aktivitas" ? "class='select'" : "" ?>>
                            <span>Aktivitas</span>
                        </a>
                    </li>
                    <!-- <li>
                        <a href='<?php /*echo Yii::app()->baseUrl;*/ ?>/rencanaaksi'  <?php /*echo $ctrlName==="rencanaaksi"?"class='select'":"" */ ?>>
                            <span>Rencana Aksi</span>
                        </a>
                    </li>-->
                    <li>
                        <a href='<?php echo Yii::app()->baseUrl; ?>/renja' <?php echo $ctrlName === "renja" ? "class='select'" : "" ?>>
                            <span>Renja</span>
                        </a>
                    </li>
                    <li>
                        <a href='<?php echo Yii::app()->baseUrl; ?>/renstra' <?php echo $ctrlName === "renstra" ? "class='select'" : "" ?>>
                            <span>Renstra</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class='has-sub  <?php echo in_array($ctrlName, $arrKinerja) ? "active highlight" : "" ?>'>
                <a href='#'>
                    <div class="fs1 icon-setting" aria-hidden="true"></div>
                    <span>Perjanjian Kinerja</span>
                </a>
                <ul <?php echo in_array($ctrlName, $arrKinerja) ? "style='display: block'" : "" ?>>
                    <li>
                        <a href='<?php echo Yii::app()->baseUrl; ?>/pejabat' <?php echo $ctrlName === "pejabat" ? "class='select'" : "" ?>>
                            <span>Manajemen Pejabat</span>
                        </a>
                    </li>
                        <li>
                            <a href='<?php echo Yii::app()->baseUrl; ?>/datapk' <?php echo $ctrlName === "datapk" ? "class='select'" : "" ?>>
                                <span>Manajemen PK</span>
                            </a>
                        </li>
                    <li>
                        <a href='<?php echo Yii::app()->baseUrl; ?>/listpk' <?php echo $ctrlName === "listpk" ? "class='select'" : "" ?>>
                            <span>Data PK</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class='has-sub  <?php echo in_array($ctrlName, $arrLap) ? "active highlight" : "" ?>'>
                <a href='#'>
                    <div class="fs1  icon-documents" aria-hidden="true"></div>
                    <span>Laporan Capaian</span>
                </a>
                <ul <?php echo in_array($ctrlName, $arrLap) ? "style='display: block'" : "" ?>>
                    <li>
                        <a href='<?php echo Yii::app()->baseUrl; ?>/laporan/lap1' <?php echo $ctrlName === "laporan/lap1" ? "class='select'" : "" ?>>
                            <span>Pengukuran Kinerja</span>
                        </a>
                    </li>
                    <li>
                        <a href='<?php echo Yii::app()->baseUrl; ?>/laporan/lap2' <?php echo $ctrlName === "laporan/lap2" ? "class='select'" : "" ?>>
                            <span>Realisasi Anggaran</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::app()->baseUrl; ?>/laporan/lap3" <?php echo $ctrlName === "laporan/lap3" ? "class='select'" : "" ?>>
                            <span>Efesiensi Penggunaan Sumber Daya</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::app()->baseUrl; ?>/laporan/lap4" <?php echo $ctrlName === "laporan/lap4" ? "class='select'" : "" ?>>
                            <span>Pengukuran Kinerja Kegiatan/Aktivitas</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::app()->baseUrl; ?>/laporan/lap5" <?php echo $ctrlName === "laporan/lap5" ? "class='select'" : "" ?>>
                            <span>Pengukuran Kinerja Indikator/Program/Kegiatan/Aktivitas</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class='has-sub  <?php echo in_array($ctrlName, $arrLap2) ? "active highlight" : "" ?>'>
                <a href='#'>
                    <div class="fs1 icon-documents" aria-hidden="true"></div>
                    <span>Rekap dan Lainnya</span>
                </a>
                <ul <?php echo in_array($ctrlName, $arrLap2) ? "style='display: block'" : "" ?>>
                    <!--<li>
                        <a href='<?php /*echo Yii::app()->baseUrl;*/ ?>/laporan/lap6' <?php /*echo $ctrlName==="laporan/lap6"?"class='select'":"" */ ?>>
                            <span>Pemeriksaan Sendiri</span>
                        </a>
                    </li>-->
                    <li>
                        <a href='<?php echo Yii::app()->baseUrl; ?>/laporan/lap6' <?php echo $ctrlName === "laporan/lap7" ? "class='select'" : "" ?>>
                            <span>Tampilkan Seluruh OPD</span>
                        </a>
                    </li>
                    <li>
                        <a href='<?php echo Yii::app()->baseUrl; ?>/mergerdata' <?php echo $ctrlName === "mergerdata" ? "class='select'" : "" ?>>
                            <span>Merger Data</span>
                        </a>
                    </li>
                    <li>
                        <a href='<?php echo Yii::app()->baseUrl; ?>/hapusdata' <?php echo $ctrlName === "hapusdata" ? "class='select'" : "" ?>>
                            <span>Hapus Data</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class='has-sub  <?php echo in_array($ctrlName, $arrAdm) ? "active highlight" : "" ?>'>
                <a href='#'>
                    <div class="fs1 icon-setting" aria-hidden="true"></div>
                    <span>Administrasi</span>
                </a>
                <ul <?php echo in_array($ctrlName, $arrAdm) ? "style='display: block'" : "" ?>>
                    <li>
                        <a href='<?php echo Yii::app()->baseUrl; ?>/userdata' <?php echo $ctrlName === "userdata" ? "class='select'" : "" ?>>
                            <span>Manajemen Pengguna</span>
                        </a>
                    </li>
                    <?php if (Yii::app()->user->isAdmin()) { ?>
                        <li>
                            <a href='<?php echo Yii::app()->baseUrl; ?>/dataopd' <?php echo $ctrlName === "dataopd" ? "class='select'" : "" ?>>
                                <span>Data OPD</span>
                            </a>
                        </li>
                        <li>
                            <a href='<?php echo Yii::app()->baseUrl; ?>/ikudata' <?php echo $ctrlName === "ikudata" ? "class='select'" : "" ?>>
                                <span>IKU Kepala Daerah</span>
                            </a>
                        </li>
                        <li>
                            <a href='<?php echo Yii::app()->baseUrl; ?>/uudata' <?php echo $ctrlName === "uudata" ? "class='select'" : "" ?>>
                                <span>Perundang-undangan</span>
                            </a>
                        </li>
                        <li>
                            <a href='<?php echo Yii::app()->baseUrl; ?>/istilahdata' <?php echo $ctrlName === "istilahdata" ? "class='select'" : "" ?>>
                                <span>Istilah-istilah</span>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </li>

            <li class='has-sub  <?php echo in_array($ctrlName, $arrHelp) ? "active highlight" : "" ?>'>
                <a href='#'>
                    <div class="fs1 icon-question" aria-hidden="true"></div>
                    <span>Bantuan</span>
                </a>
                <ul <?php echo in_array($ctrlName, $arrHelp) ? "style='display: block'" : "" ?>>
                    <li>
                        <a href='<?php echo Yii::app()->baseUrl; ?>/bantuan/kontak' <?php echo $ctrlName === "bantuan/kontak" ? "class='select'" : "" ?>>
                            <span>Kontak Teknis</span>
                        </a>
                    </li>
                    <li>
                        <a href='<?php echo Yii::app()->baseUrl; ?>/bantuan/manual' <?php echo $ctrlName === "bantuan/manual" ? "class='select'" : "" ?>>
                            <span>Manual</span>
                        </a>
                    </li>
                    <!--<li>
                        <a href='<?php /*echo Yii::app()->baseUrl;*/ ?>/bantuan/perubahan'  <?php /*echo $ctrlName==="bantuan/perubahan"?"class='select'":"" */ ?>>
                            <span>Perubahan</span>
                        </a>
                    </li>-->
                    <!--<li>
                        <a href='<?php /*echo Yii::app()->baseUrl;*/ ?>/bantuan/faq'  <?php /*echo $ctrlName==="bantuan/faq"?"class='select'":"" */ ?>>
                            <span>FAQ</span>
                        </a>
                    </li>-->
                </ul>
            </li>
        </ul>
    </div>
    <!-- Menu End -->
</aside>
<!-- Left sidebar end -->

<!-- Dashboard Wrapper Start -->
<div class="dashboard-wrapper">
    <!-- Header start -->
    <header>
        <ul class="pull-left" id="left-nav">
            <li class="hidden-lg hidden-md">
                <div class="logo-mob clearfix">
                    <h2>
                        <div class="fs1" aria-hidden="true" data-icon="&#xe0db;"></div>
                        <span><?php echo Yii::app()->params['namependek']; ?></span></h2>
                </div>
            </li>
            <li class="visible-lg visible-md">
                <div class="logo-mob clearfix">
                    <h2>
                        <div class="fs1" aria-hidden="true" data-icon="&#xe0db;"></div>
                        <span><?php echo Yii::app()->params['namepanjang']; ?></span></h2>
                </div>
            </li>
        </ul>
        <div class="pull-right">
            <ul id="mini-nav" class="clearfix">
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
            </ul>
        </div>
    </header>
    <!-- Header ends -->

    <!-- Main Container Start -->
    <div class="main-container">
        <?php echo $content; ?>
    </div>
    <!-- Main Container Start -->

    <!-- Footer Start -->
    <footer>
        <?php echo Yii::app()->params['kopikanan']; ?>
    </footer>
    <!-- Footer end -->

</div>
<!-- Dashboard Wrapper End -->

<!-- Animated Right Sidebar -->
<script src="<?php echo Yii::app()->baseUrl; ?>/static/js/slidebars.js"></script>

<!-- Tyny Scrollbar -->
<script src="<?php echo Yii::app()->baseUrl; ?>/static/js/tiny-scrollbar.js"></script>

<!-- Date Range -->
<script src="<?php echo Yii::app()->baseUrl; ?>/static/js/daterange/moment.js"></script>
<script src="<?php echo Yii::app()->baseUrl; ?>/static/js/daterange/daterangepicker.js"></script>

<!-- Custom JS -->
<script src="<?php echo Yii::app()->baseUrl; ?>/static/js/custom.js"></script>
<script src="<?php echo Yii::app()->baseUrl; ?>/static/js/custom-index.js"></script>
</body>
</html>
