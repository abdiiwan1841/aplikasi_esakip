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
        <?php if ($trgt==1) { ?>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <meta name="Description" content="<?php echo CHtml::encode($this->pageTitle); ?>">
            <meta name="Author" content="Under Maintenance abdiiwan1841@gmail.com">
            <meta http-equiv="X-UA-Compatible" content="IE=9;FF=3;OtherUA=4">
            <meta name="viewport" content="width=device-width,initial-scale=1.0">

            <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl ?>/static/css/theme.css">
        <?php } ?>
    </head>
    <body style="width:2200px;">
    <div class="row text-center" style="font-weight:bold;">
        <div class="col-sm-12 form-inline">
            INDIKATOR KINERJA UTAMA TAHUN <?php echo Yii::app()->user->getTahun(); ?><BR>
            <?php echo strtoupper(Yii::app()->user->getNamaOpd()); ?><BR>
            PEMERINTAH DAERAH PROVINSI JAWA BARAT<BR>
        </div>
    </div>
    <div class="row" style="margin: 0 auto;">
        <table class="table table-bordered table-hover table-responsive table-condensed">
            <thead style="background-color:#C5C5EC;font-weight:bold;">
            <tr >
                <th class="text-center" >No.</th>
                <th class="text-center" >Uraian</th>
                <th class="text-center" >Formulasi / Penjelasan</th>
                <th class="text-center" >Sumber Data</th>
            </tr>
            <tr>
                <th class="text-center">1</th>
                <th class="text-center">2</th>
                <th class="text-center">3</th>
                <th class="text-center">4</th>
            </tr>
            </thead>
            <tbody>
                <?php
                $no=1;
                foreach ($result as $row) {
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $no++;?>.</td>
                        <td ><?php echo $row->sasaran?></td>
                        <td ><?php echo $row->data_pertimbangan?></td>
                        <td ><?php echo $row->sumber_data?></td>
                    </tr>
                    <?php }
                    ?>
            </tbody>
        </table>
    </div>
    </body>
    </html>
<?php
/**
 * File Name: laporan.php
 */
?>