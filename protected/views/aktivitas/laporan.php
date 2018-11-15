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
<?php if ($ispdf==0) { ?>
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
            LAPORAN RENCANA AKSI TAHUN <?php echo Yii::app()->user->getTahun(); ?><BR>
            <?php echo strtoupper(Yii::app()->user->getNamaOpd()); ?><BR>
            PEMERINTAH DAERAH PROVINSI JAWA BARAT<BR>
        </div>
    </div>
    <div class="row">
        <table class="table table-bordered table-hover table-responsive table-condensed">
            <thead style="background-color:#C5C5EC;font-weight:bold;">
            <tr>
                <th rowspan="2" class="text-center" style="vertical-align:middle;width:80px;">No.</th>
                <th rowspan="2" class="text-center" style="vertical-align:middle;width:500px;">Sasaran</th>
                <th rowspan="2" class="text-center" style="vertical-align:middle;width:500px;">Indikator Kinerja</th>
                <th colspan="4" class="text-center">Target Kinerja</th>
                <th rowspan="2" class="text-center" style="vertical-align:middle;width:500px;">Program</th>
                <th rowspan="2" class="text-center" style="vertical-align:middle;width:500px;">Kegiatan</th>
                <th rowspan="2" class="text-center" style="vertical-align:middle;width:500px;">Aktivitas</th>
                <th colspan="4" class="text-center">Target Keuangan</th>
            </tr>
            <tr>
                <th class="text-center" style="vertical-align:middle;width:100px;">Triw I</th>
                <th class="text-center" style="vertical-align:middle;width:100px;">Triw II</th>
                <th class="text-center" style="vertical-align:middle;width:100px;">Triw III</th>
                <th class="text-center" style="vertical-align:middle;width:100px;">Triw IV</th>
                <th class="text-center" style="vertical-align:middle;width:200px;">Triw I</th>
                <th class="text-center" style="vertical-align:middle;width:200px;">Triw II</th>
                <th class="text-center" style="vertical-align:middle;width:200px;">Triw III</th>
                <th class="text-center" style="vertical-align:middle;width:200px;">Triw IV</th>
            </tr>
            <tr>
                <th class="text-center">1</th>
                <th class="text-center">2</th>
                <th class="text-center">3</th>
                <th class="text-center">4</th>
                <th class="text-center">5</th>
                <th class="text-center">6</th>
                <th class="text-center">7</th>
                <th class="text-center">8</th>
                <th class="text-center">9</th>
                <th class="text-center">10</th>
                <th class="text-center">11</th>
                <th class="text-center">12</th>
                <th class="text-center">13</th>
                <th class="text-center">14</th>
            </tr>
            </thead>
            <tbody>
            <?php

            foreach ($tblAktivitas as $rowAktivitas) {


                $nomor_misi = $rowAktivitas->nomor_misi;
                $nomor_tujuan = $rowAktivitas->nomor_tujuan;
                $nomor_sasaran = $rowAktivitas->nomor_sasaran;
                $nomor_indikator = $rowAktivitas->nomor_indikator;
                $nomor_program = $rowAktivitas->nomor_program;
                $nomor_kegiatan = $rowAktivitas->nomor_kegiatan;

                $criteria = new CDbCriteria();
                $criteria->addCondition("id_instansi=:idx and nomor_misi=:nomor_misi and nomor_tujuan=:nomor_tujuan and nomor_sasaran=:nomor_sasaran");
                $criteria->params = array(':idx' => Yii::app()->user->getOpd(),
                    ':nomor_misi' => $nomor_misi,
                    ':nomor_tujuan' => $nomor_tujuan,
                    ':nomor_sasaran' => $nomor_sasaran,
                );
                $mdlA = Sasaran::model()->find($criteria);

                $criteria = new CDbCriteria();
                $criteria->addCondition("id_instansi=:idx and nomor_misi=:nomor_misi and nomor_tujuan=:nomor_tujuan 
                                            and nomor_sasaran=:nomor_sasaran and nomor_indikator=:nomor_indikator");
                $criteria->params = array(':idx' => Yii::app()->user->getOpd(),
                    ':nomor_misi' => $nomor_misi,
                    ':nomor_tujuan' => $nomor_tujuan,
                    ':nomor_sasaran' => $nomor_sasaran,
                    ':nomor_indikator' => $nomor_indikator,
                );
                $mdlB = Indikator::model()->find($criteria);

                $criteria = new CDbCriteria();
                $criteria->addCondition("id_instansi=:idx and nomor_misi=:nomor_misi and nomor_tujuan=:nomor_tujuan 
                                            and nomor_sasaran=:nomor_sasaran and nomor_indikator=:nomor_indikator
                                            and nomor_program=:nomor_program");
                $criteria->params = array(':idx' => Yii::app()->user->getOpd(),
                    ':nomor_misi' => $nomor_misi,
                    ':nomor_tujuan' => $nomor_tujuan,
                    ':nomor_sasaran' => $nomor_sasaran,
                    ':nomor_indikator' => $nomor_indikator,
                    ':nomor_program' => $nomor_program
                );
                $mdlC = Program::model()->find($criteria);

                $criteria = new CDbCriteria();
                $criteria->addCondition("id_instansi=:idx and nomor_misi=:nomor_misi and nomor_tujuan=:nomor_tujuan 
                                            and nomor_sasaran=:nomor_sasaran and nomor_indikator=:nomor_indikator
                                            and nomor_program=:nomor_program and nomor_kegiatan=:nomor_kegiatan");
                $criteria->params = array(':idx' => Yii::app()->user->getOpd(),
                    ':nomor_misi' => $nomor_misi,
                    ':nomor_tujuan' => $nomor_tujuan,
                    ':nomor_sasaran' => $nomor_sasaran,
                    ':nomor_indikator' => $nomor_indikator,
                    ':nomor_program' => $nomor_program,
                    ':nomor_kegiatan' => $nomor_kegiatan
                );
                $mdlD = Kegiatan::model()->find($criteria);

                ?>
                <tr>
                    <td class="text-center" style="vertical-align:top;"></td>
                    <td class="text-justify"><?php echo $mdlA->sasaran; ?></td>
                    <td class="text-justify"><?php echo $mdlB->indikator; ?></td>
                    <td class="text-center"
                        style="vertical-align:top;"><?php echo number_format($mdlB->target_triwulan1, 2, ',', '.'); ?></td>
                    <td class="text-center"
                        style="vertical-align:top;"><?php echo number_format($mdlB->target_triwulan2, 2, ',', '.'); ?></td>
                    <td class="text-center"
                        style="vertical-align:top;"><?php echo number_format($mdlB->target_triwulan3, 2, ',', '.'); ?></td>
                    <td class="text-center"
                        style="vertical-align:top;"><?php echo number_format($mdlB->target_triwulan4, 2, ',', '.'); ?></td>
                    <td class="text-justify"><?php echo $mdlC->program; ?></td>
                    <td class="text-justify"><?php echo $mdlD->kegiatan; ?></td>
                    <td class="text-justify"><?php echo $rowAktivitas->aktivitas; ?></td>
                    <td class="text-right"
                        style="vertical-align:top;"><?php echo number_format($rowAktivitas->target_keuangan_triwulan1, 2, ',', '.'); ?></td>
                    <td class="text-right"
                        style="vertical-align:top;"><?php echo number_format($rowAktivitas->target_keuangan_triwulan1, 2, ',', '.'); ?></td>
                    <td class="text-right"
                        style="vertical-align:top;"><?php echo number_format($rowAktivitas->target_keuangan_triwulan1, 2, ',', '.'); ?></td>
                    <td class="text-right"
                        style="vertical-align:top;"><?php echo number_format($rowAktivitas->target_keuangan_triwulan1, 2, ',', '.'); ?></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
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