<?php
/**
 * Author: Abdi-Iwan
 * Date: 9/7/2017 2:35 AM
 * Build For : Gabungan-BIT
 */
?>
    <!DOCTYPE html>
    <html>
    <head>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="Description" content="<?php echo CHtml::encode($this->pageTitle); ?>">
        <meta name="Author" content="Under Maintenance abdiiwan1841@gmail.com">
        <meta http-equiv="X-UA-Compatible" content="IE=9;FF=3;OtherUA=4">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl ?>/static/css/theme.css">
    </head>
    <body style="width:2200px;">
    <div class="row text-center" style="font-weight:bold;">
        <div class="col-sm-12 form-inline">
            LAPORAN PENGUKURAN KINERJA TAHUN <?php echo Yii::app()->user->getTahun(); ?><BR>
            <?php echo strtoupper(Yii::app()->user->getNamaOpd()); ?><BR>
            PEMERINTAH DAERAH PROVINSI JAWA BARAT<BR>
        </div>
    </div>
    <div class="row" style="margin: 0 auto;">

        <BR><BR>
        <table>
            <tr>
                <?php //keterangan_nilai() ?>
            </tr>
        </table>
    </div>
    </body>
    </html>
<?php
/**
 * File Name: laporan.php
 */
?>