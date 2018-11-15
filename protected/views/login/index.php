<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <link href="<?php echo Yii::app()->baseUrl; ?>/static/css/login.css" rel="stylesheet" media="screen">
    <link href="<?php echo Yii::app()->baseUrl; ?>/static/css/animate.css" rel="stylesheet" media="screen">
    <link href="<?php echo Yii::app()->baseUrl; ?>/static/fonts/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'login-form',
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
)); ?>
    <div id="box" class="animated bounceIn">
        <div id="top_header">
            <a href="<?php echo Yii::app()->baseUrl; ?>">
                <img class="logo" src="<?= Yii::app()->baseUrl; ?>/static/img/logo_sakip.png" alt="logo">
            </a>
        </div>
        <div id="inputs">
            <div class="form-control">
                <?php echo $form->textField($model, 'username', array('Placeholder' => "Username")); ?>
                <i class="fa fa-user"></i>
            </div>
            <div class="form-control">
                <?php echo $form->passwordField($model, 'password', array('Placeholder' => "Password")); ?>
                <i class="fa fa-key"></i>
            </div>
            <div class="form-control">
                <?php echo $form->dropDownList($model, 'tahun', Constant::$listtahunLogin); ?>
            </div>
            <?php echo "cek"; ?>
            <div class="form-control">
                <div class="captcha">   
                    <?php $this->widget('CCaptcha'); ?>
                    <?php echo $form->textField($model, 'verifyCode'); ?>
                </div>
                <?php echo $form->error($model, 'verifyCode'); ?>
            </div>
            <?php echo CHtml::submitButton('Login');?>
        </div>
        <!--<div id="bottom" >
            <a class="right_a" href="<?php /*echo Yii::app()->baseUrl; */?>"><i class="fa fa-home"></i>Home</a>
        </div>-->
    </div>
<?php $this->endWidget(); ?>
</body>
</html>