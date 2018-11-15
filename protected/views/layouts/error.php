<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?= Yii::app()->baseUrl; ?>/favicon.ico"/>
    <link rel="shortcut icon" type="image/x-icon" href="<?= Yii::app()->baseUrl; ?>/favicon.ico"/>
    <?php Yii::app()->bootstrap->register(); ?>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <link href="<?php echo Yii::app()->baseUrl; ?>/static/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo Yii::app()->baseUrl; ?>/static/css/main.css" rel="stylesheet" media="screen">
    <link href="<?php echo Yii::app()->baseUrl; ?>/static/fonts/font-awesome.min.css" rel="stylesheet">

    <!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

</head>

<body style="background: #398ab9;">

<!-- Container fluid starts -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-lg-push-4 col-md-push-3 col-md-6 col-sm-push-3 col-sm-6 col-sx-12">
            <!-- Error container starts -->
            <div class="error-container">
                <h1>Oops!</h1>
                <h2 class="text-white">Ada kesalahan pada halaman yang di akses !!!!</h2>
                <div class="error-details text-white">
                    <?php echo $content; ?>
                </div>
                <div class="error-actions">
                    <a href="<?php echo Yii::app()->request->urlReferrer; ?>" class="btn btn-info btn-rounded">
                        <i class="fa fa-home"></i> Kembali
                    </a>


                </div>
            </div>
            <!-- Error Container ends -->
        </div>
    </div>
</div>
<script src="<?php echo Yii::app()->baseUrl; ?>/static/js/jquery.js"></script>

<script src="<?php echo Yii::app()->baseUrl; ?>/static/js/bootstrap.min.js"></script>
</body>

</html>