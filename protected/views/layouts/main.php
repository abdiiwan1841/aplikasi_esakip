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
    <!--<link rel="stylesheet" href="<?php /*echo Yii::app()->baseUrl; */?>/static/css/theme-custom.css"/>-->
    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/static/css/custom.css"/>

    <!-- Animate CSS -->
    <link href="<?php echo Yii::app()->baseUrl; ?>/static/css/animate.css" rel="stylesheet" media="screen">
    <link href="<?php echo Yii::app()->baseUrl; ?>/static/bootstrap-3.3.5-dist/fonts/font-awesome.min.css"
          rel="stylesheet">
    <link href="<?php echo Yii::app()->baseUrl; ?>/static/bootstrap-3.3.5-dist/fonts/metrize.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/static/js/jquery.smartmenus.min.js"></script>
    <script type="text/javascript"
            src="<?php echo Yii::app()->baseUrl; ?>/static/js/jquery.smartmenus.bootstrap.min.js"></script>
    <!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo Yii::app()->baseUrl; ?>">
                    <img src="<?php echo Yii::app()->baseUrl; ?>/static/img/logo_sakip.png">
            </a>
            <p class="navbar-text hidden-xs hidden-md hidden-sm"
               style="max-width:250px;line-height: 120%;padding-top:5px">Laman Akuntabilitas Kinerja Instansi Pemerintah Daerah Provinsi Jawa Barat</p>
        </div>
        <div class="navbar-collapse collapse">
            <!-- Left nav -->
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo Yii::app()->baseUrl; ?>/lkip">LKIP</a></li>
                <li><a href="<?php echo Yii::app()->baseUrl; ?>/peraturan">Peraturan/UU</a></li>
                <li><a href="<?php echo Yii::app()->baseUrl; ?>/istilah">Istilah Sakip</a></li>
                <!--<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Informasi<b
                                    class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php /*echo Yii::app()->baseUrl; */?>/peraturan">Peraturan/UU</a></li>
                            <li><a href="<?php /*echo Yii::app()->baseUrl; */?>/istilah">Daftar Istilah</a></li>
                        </ul>
                    </li>-->
                <!--<li><a href="<?php /*echo Yii::app()->baseUrl; */?>/kontak">Kontak</a></li>-->
                <?php if (Yii::app()->user->isGuest) { ?>
                    <li><a href="<?php echo Yii::app()->baseUrl; ?>/login" >SignIn</a></li>
                <?php } else { ?>
                    <li><a href="<?php echo Yii::app()->baseUrl; ?>/site/logout">Signout</a></li>
                <?php } ?>
            </ul>

        </div><!--/.nav-collapse -->
    </div><!--/.container -->
</div>

<div class="container-fluid" style="margin-top:60px;">
    <?php echo $content; ?>
    <div class="footer">
        <div class="row" >
            <div class="col-sm-12 text-center copyright"><p><?php echo Yii::app()->params['kopikanan']; ?></p></div>
        </div>
    </div>
</div> <!-- /container -->


</body>
</html>
