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
    <body style="width:100%;">
    <div class="row text-center" style="font-weight:bold;">
        <div class="col-sm-12 form-inline">
            LAPORAN PENGUKURAN KINERJA INDIKATOR/PROGRAM/KEGIATAN/AKTIVITAS TAHUN <?php echo Yii::app()->user->getTahun(); ?><BR>
            <?php echo strtoupper(Yii::app()->user->getNamaOpd()); ?><BR>
            PEMERINTAH DAERAH PROVINSI JAWA BARAT<BR>
        </div>
    </div>
    <div class="row" style="margin: 0 auto;">
        <table class="table table-bordered table-hover table-responsive table-condensed">
            <thead style="background-color:#C5C5EC;font-weight:bold;">
            <tr>
                <th rowspan="2" class="text-center" style="vertical-align:middle;width:80px;">No.</th>
                <th rowspan="2" class="text-center" style="vertical-align:middle;width:500px;">Sasaran</th>
                <th rowspan="2" class="text-center" style="vertical-align:middle;width:500px;">Indikator Kinerja</th>
                <th colspan="4" class="text-center">% Capaian Kinerja</th>
                <th rowspan="2" class="text-center" style="vertical-align:middle;width:500px;">Program</th>
                <th rowspan="2" class="text-center" style="vertical-align:middle;width:500px;">Kegiatan</th>
                <th rowspan="2" class="text-center" style="vertical-align:middle;width:500px;">Aktivitas</th>
                <th colspan="4" class="text-center">% Capaian Keuangan</th>
            </tr>
            <tr>
                <th class="text-center" style="vertical-align:middle;width:100px;">Triw I</th>
                <th class="text-center" style="vertical-align:middle;width:100px;">Triw II</th>
                <th class="text-center" style="vertical-align:middle;width:100px;">Triw III</th>
                <th class="text-center" style="vertical-align:middle;width:100px;">Triw IV</th>
                <th class="text-center" style="vertical-align:middle;width:100px;">Triw I</th>
                <th class="text-center" style="vertical-align:middle;width:100px;">Triw II</th>
                <th class="text-center" style="vertical-align:middle;width:100px;">Triw III</th>
                <th class="text-center" style="vertical-align:middle;width:100px;">Triw IV</th>
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
            $thn = Yii::app()->user->getTahun();
            $sk4 = Yii::app()->user->getOpd();
            $penomoran_aktivitas=0;

            $criteria = new CDbCriteria();
            $criteria->addCondition("id_instansi=:idx");
            $criteria->params = array(':idx' => $sk4);
            $result1 = Aktivitas::model()->findAll($criteria);

            foreach($result1 as $row1){
                $nomor_aktivitas=$row1['nomor_aktivitas'];
                $nama_aktivitas=$row1['aktivitas'];
                $nomor_kegiatan=$row1['nomor_kegiatan'];
                $nomor_indikator=$row1['nomor_indikator'];
                $nomor_misi=$row1['nomor_misi'];
                $nomor_tujuan=$row1['nomor_tujuan'];
                $nomor_sasaran=$row1['nomor_sasaran'];
                $nomor_program=$row1['nomor_program'];
                $target_keuangan_aktivitas=$row1['target_keuangan'];

                if($target_keuangan_aktivitas!=0){
                    $realisasi_keu_tri1=$row1['realisasi_keuangan_triwulan1']*100/$row1['target_keuangan'];
                    $realisasi_keu_tri2=$row1['realisasi_keuangan_triwulan2']*100/$row1['target_keuangan'];
                    $realisasi_keu_tri3=$row1['realisasi_keuangan_triwulan3']*100/$row1['target_keuangan'];
                    $realisasi_keu_tri4=$row1['realisasi_keuangan_triwulan4']*100/$row1['target_keuangan'];
                } else {
                    $realisasi_keu_tri1=0;
                    $realisasi_keu_tri2=0;
                    $realisasi_keu_tri3=0;
                    $realisasi_keu_tri4=0;
                }
                $penomoran_aktivitas++;

                $criteria2 = new CDbCriteria();
                $criteria2->addCondition("id_instansi=:idx and nomor_sasaran=:nomor_sasaran and nomor_tujuan=$nomor_tujuan and nomor_misi=$nomor_misi and nomor_kegiatan=$nomor_kegiatan and nomor_program=$nomor_program and nomor_indikator=$nomor_indikator");
                $criteria2->params = array(':idx' => $sk4,':nomor_sasaran'=>$nomor_sasaran);
                $rowd = Kegiatan::model()->find($criteria2);
                $nama_kegiatan= $rowd['kegiatan'];


                $criteria2 = new CDbCriteria();
                $criteria2->addCondition("id_instansi=:idx and nomor_sasaran=:nomor_sasaran and nomor_tujuan=$nomor_tujuan and nomor_misi=$nomor_misi and nomor_program=$nomor_program and nomor_indikator=$nomor_indikator");
                $criteria2->params = array(':idx' => $sk4,':nomor_sasaran'=>$nomor_sasaran);
                $rowd = Program::model()->find($criteria2);
                $nama_program= $rowd['program'];

                $criteria2 = new CDbCriteria();
                $criteria2->addCondition("id_instansi=:idx and nomor_sasaran=:nomor_sasaran and nomor_tujuan=$nomor_tujuan and nomor_misi=$nomor_misi and nomor_indikator=$nomor_indikator");
                $criteria2->params = array(':idx' => $sk4,':nomor_sasaran'=>$nomor_sasaran);
                $rowd = Indikator::model()->find($criteria2);
                $nama_indikator= $rowd['indikator'];
                $target_indikator=$rowd['target'];

                if($target_indikator!=0){
                    $realisasi_tri1=$rowd['realisasi_triwulan1']*100/$target_indikator;
                    $realisasi_tri2=$rowd['realisasi_triwulan2']*100/$target_indikator;
                    $realisasi_tri3=$rowd['realisasi_triwulan3']*100/$target_indikator;
                    $realisasi_tri4=$rowd['realisasi_triwulan4']*100/$target_indikator;
                } else {
                    $realisasi_tri1=0;
                    $realisasi_tri2=0;
                    $realisasi_tri3=0;
                    $realisasi_tri4=0;
                }

                //$nama_sasaran=fgetsasaran($nomor_sasaran,$nomor_tujuan,$nomor_misi,$sk4);
                $criteria2 = new CDbCriteria();
                $criteria2->addCondition("id_instansi=:idx and nomor_sasaran=:nomor_sasaran and nomor_tujuan=$nomor_tujuan and nomor_misi=$nomor_misi ");
                $criteria2->params = array(':idx' => $sk4,':nomor_sasaran'=>$nomor_sasaran);
                $rowd = Sasaran::model()->find($criteria2);
                $nama_sasaran= $rowd['sasaran'];


                ?>
                <tr>
                    <td class="text-center" style="vertical-align:top;"></td>
                    <td class="text-justify"><?=$nama_sasaran;?></td>
                    <td class="text-justify"><?=$nama_indikator;?></td>
                    <td class="text-center" style="vertical-align:top;"><?=number_format($realisasi_tri1,2,',','.');?></td>
                    <td class="text-center" style="vertical-align:top;"><?=number_format($realisasi_tri2,2,',','.');?></td>
                    <td class="text-center" style="vertical-align:top;"><?=number_format($realisasi_tri3,2,',','.');?></td>
                    <td class="text-center" style="vertical-align:top;"><?=number_format($realisasi_tri4,2,',','.');?></td>
                    <td class="text-justify"><?=$nama_program;?></td>
                    <td class="text-justify"><?=$nama_kegiatan;?></td>
                    <td class="text-justify"><?=$nama_aktivitas;?></td>
                    <td class="text-center" style="vertical-align:top;"><?=number_format($realisasi_keu_tri1,2,',','.');?></td>
                    <td class="text-center" style="vertical-align:top;"><?=number_format($realisasi_keu_tri2,2,',','.');?></td>
                    <td class="text-center" style="vertical-align:top;"><?=number_format($realisasi_keu_tri3,2,',','.');?></td>
                    <td class="text-center" style="vertical-align:top;"><?=number_format($realisasi_keu_tri4,2,',','.');?></td>
                </tr>
                <?php

            }
            ?>
            </tbody>
        </table>
        <!--<BR><BR>
        <table>
            <tr>
                <?php /*MyHelpers::keterangan_nilai(null,$thn) */?>
            </tr>
        </table>-->
    </div>
    </body>
    </html>
<?php
/**
 * File Name: laporan.php
 */
?>