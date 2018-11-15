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
    <body >
    <div class="row text-center" style="font-weight:bold;">
        <div class="col-sm-12 form-inline">
            LAPORAN REALISASI KINERJA DAN ANGGARAN TAHUN <?php echo Yii::app()->user->getTahun(); ?> TRIWULAN <?php echo $triwulan?><BR>
            <?php echo strtoupper(Yii::app()->user->getNamaOpd()); ?><BR>
            PEMERINTAH DAERAH PROVINSI JAWA BARAT<BR>
        </div>
    </div>
    <div class="row" style="margin: 0 auto;">
     <div class="row" style="margin: 0 auto;">
            <table class="table table-bordered table-hover table-responsive table-condensed">
                <thead style="background-color:#C5C5EC;font-weight:bold;">
                <tr>
                    <th class="text-center" rowspan="2" style="width:50px;">No.</th>
                    <th class="text-center" rowspan="2" style="width:220px;">Sasaran</th>
                    <th class="text-center" rowspan="2" style="width:220px;">Indikator</th>
                    <th class="text-center" colspan="3">Kinerja</th>
                    <th class="text-center" rowspan="2" style="width:200px;">Program</th>
                    <th class="text-center" colspan="3">Keuangan</th>
                </tr>
                <tr>
                    <th class="text-center" style="width:100px;">Target</th>
                    <th class="text-center" style="width:100px;">Realisasi TW <?php echo $triwulan?></th>
                    <th class="text-center" style="width:80px;">% Realisasi</th>
                    <th class="text-center" style="width:120px;">Pagu</th>
                    <th class="text-center" style="width:120px;">Realisasi</th>
                    <th class="text-center" style="width:80px;">% Realisasi</th>
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
                </tr>
                </thead>
                <?php
                $thn = Yii::app()->user->getTahun();
                $sk4 = Yii::app()->user->getOpd();

                $counting = 0;
                $tprogram = 0;
                $tindikator = 0;

                $criteria = new CDbCriteria();
                $criteria->addCondition("id_instansi=:idx");
                $criteria->params = array(':idx' => $sk4);
                $mdlProgram = Program::model()->findAll($criteria);
                $jumlahprogram =count($mdlProgram);
                ?>
                <tbody>
                <?php

                $nomor_urut = 0;
                foreach ($mdlProgram as $rowa) {

                    $nomor_program = $rowa['nomor_program'];
                    $nomor_indikator = $rowa['nomor_indikator'];
                    $nomor_sasaran = $rowa['nomor_sasaran'];
                    $nomor_tujuan = $rowa['nomor_tujuan'];
                    $nomor_misi = $rowa['nomor_misi'];
                    $nama_program = $rowa['program'];
                    $pagu = $rowa['pagu_anggaran'];
                    $rpagu = $rowa['realisasi_keuangan'];

                    $criteria2 = new CDbCriteria();
                    $criteria2->select="ifnull(sum(realisasi_keuangan_triwulan".$triwulan."),0) as realisasi_keuangan_triwulan".$triwulan;
                    $criteria2->addCondition("id_instansi=:idx and nomor_sasaran=:nomor_sasaran and nomor_tujuan=$nomor_tujuan and nomor_misi=$nomor_misi and nomor_indikator=$nomor_indikator and nomor_program=$nomor_program ");
                    $criteria2->params = array(':idx' => $sk4,':nomor_sasaran'=>$nomor_sasaran);
                    $rowc = Kegiatan::model()->find($criteria2);
                    $rpagu=$rowc['realisasi_keuangan_triwulan'.$triwulan];
                    $nomor_urut++;
                    /*$sqlstrb = "select * from tindikator where id_instansi='$sk4' and nomor_sasaran=$nomor_sasaran ";
                    $sqlstrb .= "and nomor_tujuan=$nomor_tujuan and nomor_misi=$nomor_misi and nomor_indikator=$nomor_indikator";
                    $resultb = mysql_query($sqlstrb) or die(mysql_error() . "::>><BR>" . $sqlstrb . "<BR>");
                    $rowb = mysql_fetch_assoc($resultb);*/

                    $criteria3 = new CDbCriteria();
                    $criteria3->addCondition("id_instansi=:idx and nomor_sasaran=:nomor_sasaran and nomor_tujuan=$nomor_tujuan and nomor_misi=$nomor_misi and nomor_indikator=$nomor_indikator ");
                    $criteria3->params = array(':idx' => $sk4,':nomor_sasaran'=>$nomor_sasaran);
                    $rowb = Indikator::model()->find($criteria3);

                    $nama_indikator = $rowb['indikator'];
                    $target_indikator = $rowb['target'];
                    $realisasi_indikator = $rowb['realisasi_triwulan'.$triwulan];

                    $criteria2 = new CDbCriteria();
                    $criteria2->addCondition("id_instansi=:idx and nomor_sasaran=:nomor_sasaran and nomor_tujuan=$nomor_tujuan and nomor_misi=$nomor_misi ");
                    $criteria2->params = array(':idx' => $sk4,':nomor_sasaran'=>$nomor_sasaran);
                    $rowd = Sasaran::model()->find($criteria2);
                    $nama_sasaran= $rowd['sasaran'];
                    ?>
                    <tr>
                        <td align="center"><?= $nomor_urut; ?></td>
                        <td align="justify"><?= $nama_sasaran; ?></td>
                        <td align="justify"><?= $nama_indikator; ?></td>
                        <td align="center"><?= number_format($target_indikator, 2, ',', '.'); ?></td>
                        <td align="center"><?= number_format($realisasi_indikator, 2, ',', '.'); ?></td>
                        <?php
                        if ($target_indikator != 0) {
                            $ireal = $realisasi_indikator * 100 / $target_indikator;
                            $warna = MyHelpers::nilaidb($ireal,null,$thn);
                        } else {
                            $ireal = 0;
                            $warna = MyHelpers::nilaidb($ireal,null,$thn);
                        }
                        $tindikator = $tindikator + $ireal;
                        ?>
                        <td align="center" bgcolor="<?= $warna; ?>"><?= number_format($ireal, 2, ',', '.') . "%"; ?></td>
                        <td align="justify"><?= $nama_program; ?></td>
                        <td align="right"><?= number_format($pagu, 2, ',', '.'); ?></td>
                        <td align="right"><?= number_format($rpagu, 2, ',', '.'); ?></td>
                        <?php
                        if ($pagu != 0) {
                            $preal = $rpagu * 100 / $pagu;
                            //echo $preal." - ";
                            $warna = MyHelpers::nilaidb($preal,null,$thn);
                        } else {
                            $preal = 0;
                            $warna = MyHelpers::nilaidb($preal,null,$thn);
                        }
                        $tprogram = $tprogram + $preal;
                        ?>
                        <td align="center" bgcolor="<?= $warna; ?>"><?= number_format($preal, 2, ',', '.') . "%"; ?></td>
                    </tr>
                    <?php
                }
                ?>
                <tr>
                    <td colspan="5" align="right">RATA-RATA :</td>
                    <?php
                    if ($jumlahprogram != 0) {
                        $tindikator = $tindikator / $jumlahprogram;
                    } else {
                        $tindikator = 0;
                    }
                    $warna = MyHelpers::nilaidb($tindikator,null,$thn);
                    ?>
                    <td align="center" bgcolor="<?= $warna; ?>"><?= number_format($tindikator, 2, ',', '.') . "%"; ?></td>
                    <td colspan="3" align="right">RATA-RATA :</td><?php
                    if ($jumlahprogram != 0) {
                        $tprogram = $tprogram / $jumlahprogram;
                    } else {
                        $tprogram = 0;
                    }
                    $warna = MyHelpers::nilaidb($tprogram,null,$thn);
                    ?>
                    <td align="center" bgcolor="<?= $warna; ?>"><?= number_format($tprogram, 2, ',', '.') . "%"; ?></td>
                </tr>

            </table>
            <BR><BR>
            <table>
                <tr>
                    <?php MyHelpers::keterangan_nilai(null,$thn) ?>
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