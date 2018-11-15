<!DOCTYPE html>
<html>
<head>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <?php if ($ispdf==0) {?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="Description" content="<?php echo CHtml::encode($this->pageTitle); ?>">
    <meta name="Author" content="Under Maintenance abdiiwan1841@gmail.com">
    <meta http-equiv="X-UA-Compatible" content="IE=9;FF=3;OtherUA=4">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl ?>/static/css/theme.css">
    <?php  }?>
</head>

<?php
/**
 * Author: Abdi-Iwan
 * Date: 9/12/2017 7:47 AM
 * Build For : Gabungan-BIT
 */

    $vardb = $thn;
    $varopd = $opd;
    $varlap = $idLap;

    $dsn = "mysql:host=".Yii::app()->params['dbhost'].";dbname=db".$vardb;
    $connection=new CDbConnection($dsn,Yii::app()->params['dbuser'],Yii::app()->params['dbpwd']);
    $connection->active=true;

    if ($varlap == 1) {

        //Laporan 1
        ?>

        <body style="width:1240px;">
        <div class="container" style="font-family:times, serif;">
            
            <div class="row text-center" style="font-weight:bold;">
                <div class="col-sm-12 form-inline">
                    LAPORAN PENGUKURAN KINERJA TAHUN <?php echo $vardb; ?><BR><?php echo strtoupper(MyHelpers::fgetonedata($vardb,"topd",$varopd)) ?><BR>
                    PEMERINTAH DAERAH PROVINSI JAWA BARAT<BR>
                </div>
            </div>
            <div class="row" style="height:30px;"></div>
            <div class="row" style="margin: 0 auto;">
                <table class="table table-bordered table-hover table-responsive table-condensed">
                    <thead style="background-color:#C5C5EC;font-weight:bold;">
                    <tr>
                        <th class="text-center" rowspan="2" style="width:50px;">No.</th>
                        <th class="text-center" rowspan="2" style="width:350px;">Sasaran</th>
                        <th class="text-center" rowspan="2">Indikator</th>
                        <th class="text-center" rowspan="2" style="width:80px;">Capaian Thn Lalu</th>
                        <th class="text-center" colspan="3">Target</th>
                        <th class="text-center" rowspan="2" style="width:80px;">Target Akhir Renstra</th>
                        <th class="text-center" rowspan="2" style="width:120px;">Capaian Thn <?php echo $vardb; ?> terhadap
                            Target Akhir Renstra
                        </th>
                    </tr>
                    <tr>
                        <th class="text-center" style="width:80px;">Target</th>
                        <th class="text-center" style="width:80px;">Realisasi</th>
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
                    </tr>
                    </thead>
                    <?php
                    $counting = 0;
                    $tprogram = 0;
                    $tprogram1 = 0;
                    $sqlstra = "select * from tindikator where id_instansi='$varopd'";
                    $resulta = $connection->createCommand($sqlstra)->queryAll();
                    $jumlahindikator = count($resulta);
                    ?>
                    <tbody>
                    <?php
                    ////require_once 'inc/penilaian.php';
                    $nomor_urut = 0;
                    foreach ($resulta as $rowa) {
                        $nomor_indikator = $rowa['nomor_indikator'];
                        $nomor_sasaran = $rowa['nomor_sasaran'];
                        $nomor_tujuan = $rowa['nomor_tujuan'];
                        $nomor_misi = $rowa['nomor_misi'];
                        $nama_indikator = $rowa['indikator'];
                        $capaianlalu = $rowa['realisasi_tahun_sebelumnya'];
                        $target = $rowa['target'];
                        $realisasi = $rowa['realisasi'];
                        $targetrenstra = $rowa['target_akhir_renstra'];
                        $nomor_urut++;

                        $sqlstrc = "select sasaran from tsasaran where id_instansi='$varopd' and nomor_sasaran=$nomor_sasaran ";
                        $sqlstrc .= "and nomor_tujuan=$nomor_tujuan and nomor_misi=$nomor_misi ";
                        $rowc = $connection->createCommand($sqlstrc)->queryRow();
                        $nama_sasaran = $rowc['sasaran'];
                        ?>
                        <tr>
                            <td align="center"><?php echo $nomor_urut; ?></td>
                            <td align="justify"><?php echo $nama_sasaran; ?></td>
                            <td align="justify"><?php echo $nama_indikator; ?></td>
                            <td align="center"><?php echo number_format($capaianlalu, 0, ',', '.'); ?></td>
                            <td align="center"><?php echo number_format($target, 0, ',', '.'); ?></td>
                            <td align="center"><?php echo number_format($realisasi, 0, ',', '.'); ?></td>
                            <?php
                            if ($target != 0) {
                                $preal = $realisasi * 100 / $target;
                                $warna = MyHelpers::nilaiByValue($preal,1,$vardb);
                            } else {
                                $preal = 0;
                                $warna = MyHelpers::nilaiByValue($preal,1,$vardb);
                            }
                            $tprogram = $tprogram + $preal;
                            ?>
                            <td align="center"
                                bgcolor="<?php echo $warna; ?>"><?php echo number_format($preal, 2, ',', '.') . "%"; ?></td>
                            <td align="center"><?php echo number_format($targetrenstra, 2, ',', '.'); ?></td>
                            <?php
                            if ($targetrenstra != 0) {
                                $preal = $realisasi * 100 / $targetrenstra;
                                $warna = MyHelpers::nilaiByValue($preal,1,$vardb);
                            } else {
                                $preal = 0;
                                $warna = MyHelpers::nilaiByValue($preal,1,$vardb);
                            }
                            $tprogram1 = $tprogram1 + $preal;
                            ?>
                            <td align="center" bgcolor="<?php echo $warna; ?>"><?php echo number_format($preal, 2, ',', '.'); ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                    <tr>
                        <td colspan="6" align="right">RATA-RATA :</td>
                        <?php
                        if ($jumlahindikator != 0) {
                            $tprogram = $tprogram / $jumlahindikator;
                        } else {
                            $tprogram = 0;
                        }
                        $warna = MyHelpers::nilaiByValue($tprogram,null,$vardb);
                        ?>
                        <td align="center"
                            bgcolor="<?php echo $warna; ?>"><?php echo number_format($tprogram, 2, ',', '.') . "%"; ?></td>
                        <td colspan="2"></td>
                    </tr>
                    </tbody>
                </table>
                <BR><BR>
                <table>
                    <tr>
                       <?php MyHelpers::keteranganNilai(1,$vardb); ?>
                    </tr>
                </table>
            </div>
            <div class="row" style="height:30px;"></div>
        </div>

        </body>
        <?php
//Laporan 1
    }
    if ($varlap == 6) {
        
        //Laporan 6
        ?>

        <body style="width:1300px;">
        <!-- BEGIN OF BODY -->
        <div class="container" style="font-family:times, serif;width:1300px;">
            
            <div class="row text-center" style="font-weight:bold;">
                <div class="col-sm-12 form-inline">
                    LAPORAN REALISASI KINERJA DAN ANGGARAN TAHUN <?php echo $vardb; ?><BR><?php echo strtoupper(MyHelpers::fgetonedata($vardb,"topd",$varopd)); ?>
                    <BR>
                    PEMERINTAH DAERAH PROVINSI JAWA BARAT<BR>
                </div>
            </div>
            <div class="row" style="height:30px;"></div>
            <div class="row" style="margin: 0 auto;">
                <table class="table table-bordered table-hover table-responsive table-condensed">
                    <thead style="background-color:#C5C5EC;font-weight:bold;">
                    <tr>
                        <th class="text-center" rowspan="2" style="width:50px;">No.</th>
                        <th class="text-center" rowspan="2" style="width:200px;">Sasaran</th>
                        <th class="text-center" rowspan="2" style="width:200px;">Indikator</th>
                        <th class="text-center" colspan="3">Kinerja</th>
                        <th class="text-center" rowspan="2" style="width:200px;">Program</th>
                        <th class="text-center" colspan="3">Keuangan</th>
                    </tr>
                    <tr>
                        <th class="text-center" style="width:120px;">Target</th>
                        <th class="text-center" style="width:120px;">Realisasi</th>
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
                    $counting = 0;
                    $tprogram = 0;
                    $tindikator = 0;
                    $sqlstra = "select * from tprogram where id_instansi='$varopd'";
                    $resulta = $connection->createCommand($sqlstra)->queryAll();
                    $jumlahprogram = count($resulta);
                    ?>
                    <tbody>
                    <?php
                    ////require_once 'inc/penilaian.php';
                    $nomor_urut = 0;
                    foreach ($resulta as $rowa) {
                        $nomor_program = $rowa['nomor_program'];
                        $nomor_indikator = $rowa['nomor_indikator'];
                        $nomor_sasaran = $rowa['nomor_sasaran'];
                        $nomor_tujuan = $rowa['nomor_tujuan'];
                        $nomor_misi = $rowa['nomor_misi'];
                        $nama_program = $rowa['program'];
                        $pagu = $rowa['pagu_anggaran'];
                        $rpagu = $rowa['realisasi_keuangan'];

                        $sqlstrb="select ifnull(sum(realisasi_keuangan_triwulan4),0) as JmlReal from tkegiatan where id_instansi='$varopd' and nomor_sasaran=$nomor_sasaran ";
                        $sqlstrb .="and nomor_tujuan=$nomor_tujuan and nomor_misi=$nomor_misi and nomor_indikator=$nomor_indikator ";
                        $sqlstrb .="and nomor_program=$nomor_program ";
                        $rowc=  $connection->createCommand($sqlstrb)->queryRow();
                        $rpagu=$rowc['JmlReal'];

                        $nomor_urut++;
                        $sqlstrb = "select * from tindikator where id_instansi='$varopd' and nomor_sasaran=$nomor_sasaran ";
                        $sqlstrb .= "and nomor_tujuan=$nomor_tujuan and nomor_misi=$nomor_misi and nomor_indikator=$nomor_indikator";
                        $rowb = $connection->createCommand($sqlstrb)->queryRow();
                        $nama_indikator = $rowb['indikator'];
                        $target_indikator = $rowb['target'];
                        $realisasi_indikator = $rowb['realisasi'];
                        ?>
                        <tr>
                            <td align="center"><?php echo $nomor_urut; ?></td>
                            <?php
                            $sqlstrc = "select * from tsasaran where id_instansi='$varopd' and nomor_sasaran=$nomor_sasaran ";
                            $sqlstrc .= "and nomor_tujuan=$nomor_tujuan and nomor_misi=$nomor_misi ";
                            $rowc = $connection->createCommand($sqlstrc)->queryRow();
                            $nama_sasaran = $rowc['sasaran'];
                            ?>
                            <td align="justify"><?php echo $nama_sasaran; ?></td>
                            <td align="justify"><?php echo $nama_indikator; ?></td>
                            <td align="center"><?php echo number_format($target_indikator, 2, ',', '.'); ?></td>
                            <td align="center"><?php echo number_format($realisasi_indikator, 2, ',', '.'); ?></td>
                            <?php
                            if ($target_indikator != 0) {
                                $ireal = $realisasi_indikator * 100 / $target_indikator;
                                $warna = MyHelpers::nilaiByValue($ireal,1,$vardb);
                            } else {
                                $ireal = 0;
                                $warna = MyHelpers::nilaiByValue($ireal,1,$vardb);
                            }
                            $tindikator = $tindikator + $ireal;
                            ?>
                            <td align="center"
                                bgcolor="<?php echo $warna; ?>"><?php echo number_format($ireal, 2, ',', '.') . "%"; ?></td>
                            <td align="justify"><?php echo $nama_program; ?></td>
                            <td align="right"><?php echo number_format($pagu, 2, ',', '.'); ?></td>
                            <td align="right"><?php echo number_format($rpagu, 2, ',', '.'); ?></td>
                            <?php
                            if ($pagu != 0) {
                                $preal = $rpagu * 100 / $pagu;
                                $warna = MyHelpers::nilaiByValue($preal,1,$vardb);
                            } else {
                                $preal = 0;
                                $warna = MyHelpers::nilaiByValue($preal,1,$vardb);
                            }
                            $tprogram = $tprogram + $preal;
                            ?>
                            <td align="center"
                                bgcolor="<?php echo $warna; ?>"><?php echo number_format($preal, 2, ',', '.') . "%"; ?></td>
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
                        $warna = MyHelpers::nilaiByValue($tindikator,1,$vardb);
                        ?>
                        <td align="center"
                            bgcolor="<?php echo $warna; ?>"><?php echo number_format($tindikator, 2, ',', '.') . "%"; ?></td>
                        <td colspan="3" align="right">RATA-RATA :</td>
                        <?php
                        if ($jumlahprogram != 0) {
                            $tprogram = $tprogram / $jumlahprogram;
                        } else {
                            $tprogram = 0;
                        }
                        $warna = MyHelpers::nilaiByValue($tprogram,1,$vardb);
                        ?>
                        <td align="center"
                            bgcolor="<?php echo $warna; ?>"><?php echo number_format($tprogram, 2, ',', '.') . "%"; ?></td>
                    </tr>
                    </tbody>
                </table>
                <BR><BR>
                <table>
                    <tr>
                        <?php MyHelpers::keteranganNilai(1,$vardb);?>
                    </tr>
                </table>
            </div>
            <div class="row" style="height:50px;"></div>
        </div>
        <!-- END OF BODY -->
        </body>

        <?php
    }
    if ($varlap == 2) {
        
        //Laporan Pengukuran Kinerja Triwulan I
        ?>

        <body style="width:1300px;">
        <!-- BEGIN OF BODY -->
        <div class="container" style="font-family:times, serif;width:1300px;">
            
            <div class="row text-center" style="font-weight:bold;">
                <div class="col-sm-12 form-inline">
                    LAPORAN PENGUKURAN KINERJA TAHUN <?php echo $vardb; ?> TRIWULAN I<BR><?php echo strtoupper(MyHelpers::fgetonedata($vardb,"topd",$varopd)); ?>
                    <BR>
                    PEMERINTAH DAERAH PROVINSI JAWA BARAT<BR>
                </div>
            </div>
            <div class="row" style="height:30px;"></div>
            <div class="row" style="margin: 0 auto;">
                <table class="table table-bordered table-hover table-responsive table-condensed">
                    <thead style="background-color:#C5C5EC;font-weight:bold;">
                    <tr>
                        <th class="text-center" rowspan="2" style="width:50px;">No.</th>
                        <th class="text-center" rowspan="2" style="width:350px;">Sasaran</th>
                        <th class="text-center" rowspan="2">Indikator</th>
                        <th class="text-center" rowspan="2" style="width:80px;">Capaian Thn Lalu</th>
                        <th class="text-center" colspan="3">Target</th>
                        <th class="text-center" rowspan="2" style="width:80px;">Target Akhir Renstra</th>
                        <th class="text-center" rowspan="2" style="width:120px;">Capaian Thn <?php echo $vardb; ?> terhadap
                            Target Akhir Renstra
                        </th>
                    </tr>
                    <tr>
                        <th class="text-center" style="width:80px;">Target</th>
                        <th class="text-center" style="width:80px;">Realisasi T1</th>
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
                    </tr>
                    </thead>
                    <?php
                    $counting = 0;
                    $tprogram = 0;
                    $tprogram1 = 0;
                    $sqlstra = "select * from tindikator where id_instansi='$varopd'";
                    $resulta = $connection->createCommand($sqlstra)->queryAll();
                    $jumlahindikator = count($resulta);
                    ?>
                    <tbody>
                    <?php
                    ////require_once 'inc/penilaian.php';
                    $nomor_urut = 0;
                    foreach ($resulta as $rowa) {
                        $nomor_indikator = $rowa['nomor_indikator'];
                        $nomor_sasaran = $rowa['nomor_sasaran'];
                        $nomor_tujuan = $rowa['nomor_tujuan'];
                        $nomor_misi = $rowa['nomor_misi'];
                        $nama_indikator = $rowa['indikator'];
                        $capaianlalu = $rowa['realisasi_tahun_sebelumnya'];
                        //$target=$rowa['target_triwulan1'];
                        $target = $rowa['target'];
                        $realisasi = $rowa['realisasi_triwulan1'];
                        $targetrenstra = $rowa['target_akhir_renstra'];
                        $nomor_urut++;
                        $sqlstrc = "select * from tsasaran where id_instansi='$varopd' and nomor_sasaran=$nomor_sasaran ";
                        $sqlstrc .= "and nomor_tujuan=$nomor_tujuan and nomor_misi=$nomor_misi ";
                        $rowc = $connection->createCommand($sqlstrc)->queryRow();
                        $nama_sasaran = $rowc['sasaran'];
                        ?>
                        <tr>
                            <td align="center"><?php echo $nomor_urut; ?></td>
                            <td align="justify"><?php echo $nama_sasaran; ?></td>
                            <td align="justify"><?php echo $nama_indikator; ?></td>
                            <td align="center"><?php echo number_format($capaianlalu, 0, ',', '.'); ?></td>
                            <td align="center"><?php echo number_format($target, 0, ',', '.'); ?></td>
                            <td align="center"><?php echo number_format($realisasi, 0, ',', '.'); ?></td>
                            <?php
                            if ($target != 0) {
                                $preal = $realisasi * 100 / $target;
                                $warna = MyHelpers::nilaiByValue($preal,1,$vardb);
                            } else {
                                $preal = 0;
                                $warna = MyHelpers::nilaiByValue($preal,1,$vardb);
                            }
                            $tprogram = $tprogram + $preal;
                            ?>
                            <td align="center" bgcolor="<?php echo $warna; ?>"><?php echo number_format($preal, 2, ',', '.'); ?></td>
                            <td align="center"><?php echo number_format($targetrenstra, 0, ',', '.'); ?></td>
                            <?php
                            if ($targetrenstra != 0) {
                                $preal = $realisasi * 100 / $targetrenstra;
                                $warna = MyHelpers::nilaiByValue($preal,1,$vardb);
                            } else {
                                $preal = 0;
                                $warna = MyHelpers::nilaiByValue($preal,1,$vardb);
                            }
                            $tprogram1 = $tprogram1 + $preal;
                            ?>
                            <td align="center" bgcolor="<?php echo $warna; ?>"><?php echo number_format($preal, 2, ',', '.'); ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                    <tr>
                        <td colspan="6"></td>
                        <td></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td colspan="6" align="right">RATA-RATA :</td>
                        <?php
                        if ($jumlahindikator != 0) {
                            $tprogram = $tprogram / $jumlahindikator;
                        } else {
                            $tprogram = 0;
                        }

                        $warna = MyHelpers::nilaiByValue($tprogram,1,$vardb); ?>
                        <td align="center" bgcolor="<?php echo $warna; ?>"><?php echo number_format($tprogram, 2, ',', '.'); ?></td>
                        <td></td>
                        <?php
                        if ($jumlahindikator != 0) {
                            $tprogram1 = $tprogram1 / $jumlahindikator;
                        } else {
                            $tprogram1 = 0;
                        }

                        $warna = MyHelpers::nilaiByValue($tprogram1,1,$vardb); ?>
                        <td align="center" bgcolor="<?php echo $warna; ?>"><?php echo number_format($tprogram1, 2, ',', '.'); ?></td>
                    </tr>
                    </tbody>
                </table>
                <BR><BR>
                <table>
                    <tr>
                        <?php MyHelpers::keteranganNilai(1,$vardb);?>
                    </tr>
                </table>
            </div>
            <div class="row" style="height:50px;"></div>
        </div>
        <!-- END OF BODY -->


        <?php
    }
    if ($varlap == 3) {
        
        //Laporan Pengukuran Kinerja Triwulan I
        ?>

        <body style="width:1300px;">
        <!-- BEGIN OF BODY -->
        <div class="container" style="font-family:times, serif;width:1300px;">
            
            <div class="row text-center" style="font-weight:bold;">
                <div class="col-sm-12 form-inline">
                    LAPORAN PENGUKURAN KINERJA TAHUN <?php echo $vardb; ?> TRIWULAN II<BR><?php echo strtoupper(MyHelpers::fgetonedata($vardb,"topd",$varopd)); ?>
                    <BR>
                    PEMERINTAH DAERAH PROVINSI JAWA BARAT<BR>
                </div>
            </div>
            <div class="row" style="height:30px;"></div>
            <div class="row" style="margin: 0 auto;">
                <table class="table table-bordered table-hover table-responsive table-condensed">
                    <thead style="background-color:#C5C5EC;font-weight:bold;">
                    <tr>
                        <th class="text-center" rowspan="2" style="width:50px;">No.</th>
                        <th class="text-center" rowspan="2" style="width:350px;">Sasaran</th>
                        <th class="text-center" rowspan="2">Indikator</th>
                        <th class="text-center" rowspan="2" style="width:80px;">Capaian Thn Lalu</th>
                        <th class="text-center" colspan="3">Target</th>
                        <th class="text-center" rowspan="2" style="width:80px;">Target Akhir Renstra</th>
                        <th class="text-center" rowspan="2" style="width:120px;">Capaian Thn <?php echo $vardb; ?> terhadap
                            Target Akhir Renstra
                        </th>
                    </tr>
                    <tr>
                        <th class="text-center" style="width:80px;">Target</th>
                        <th class="text-center" style="width:80px;">Realisasi T2</th>
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
                    </tr>
                    </thead>
                    <?php
                    $counting = 0;
                    $tprogram = 0;
                    $tprogram1 = 0;
                    $sqlstra = "select * from tindikator where id_instansi='$varopd'";
                    $resulta = $connection->createCommand($sqlstra)->queryAll();
                    $jumlahindikator = count($resulta);
                    ?>
                    <tbody>
                    <?php
                    /////require_once 'inc/penilaian.php';
                    $nomor_urut = 0;
                    foreach ($resulta as $rowa) {
                        $nomor_indikator = $rowa['nomor_indikator'];
                        $nomor_sasaran = $rowa['nomor_sasaran'];
                        $nomor_tujuan = $rowa['nomor_tujuan'];
                        $nomor_misi = $rowa['nomor_misi'];
                        $nama_indikator = $rowa['indikator'];
                        $capaianlalu = $rowa['realisasi_tahun_sebelumnya'];
                        //$target=$rowa['target_triwulan1'];
                        $target = $rowa['target'];
                        $realisasi = $rowa['realisasi_triwulan2'];
                        $targetrenstra = $rowa['target_akhir_renstra'];
                        $nomor_urut++;
                        $sqlstrc = "select * from tsasaran where id_instansi='$varopd' and nomor_sasaran=$nomor_sasaran ";
                        $sqlstrc .= "and nomor_tujuan=$nomor_tujuan and nomor_misi=$nomor_misi ";
                        $rowc = $connection->createCommand($sqlstrc)->queryRow();
                        $nama_sasaran = $rowc['sasaran'];
                        ?>
                        <tr>
                            <td align="center"><?php echo $nomor_urut; ?></td>
                            <td align="justify"><?php echo $nama_sasaran; ?></td>
                            <td align="justify"><?php echo $nama_indikator; ?></td>
                            <td align="center"><?php echo number_format($capaianlalu, 0, ',', '.'); ?></td>
                            <td align="center"><?php echo number_format($target, 0, ',', '.'); ?></td>
                            <td align="center"><?php echo number_format($realisasi, 0, ',', '.'); ?></td>
                            <?php
                            if ($target != 0) {
                                $preal = $realisasi * 100 / $target;
                                $warna = MyHelpers::nilaiByValue($preal,1,$vardb);
                            } else {
                                $preal = 0;
                                $warna = MyHelpers::nilaiByValue($preal,1,$vardb);
                            }
                            $tprogram = $tprogram + $preal;
                            ?>
                            <td align="center" bgcolor="<?php echo $warna; ?>"><?php echo number_format($preal, 2, ',', '.'); ?></td>
                            <td align="center"><?php echo number_format($targetrenstra, 0, ',', '.'); ?></td>
                            <?php
                            if ($targetrenstra != 0) {
                                $preal = $realisasi * 100 / $targetrenstra;
                                $warna = MyHelpers::nilaiByValue($preal,1,$vardb);
                            } else {
                                $preal = 0;
                                $warna = MyHelpers::nilaiByValue($preal,1,$vardb);
                            }
                            $tprogram1 = $tprogram1 + $preal;
                            ?>
                            <td align="center" bgcolor="<?php echo $warna; ?>"><?php echo number_format($preal, 2, ',', '.'); ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                    <tr>
                        <td colspan="6"></td>
                        <td></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td colspan="6" align="right">RATA-RATA :</td>
                        <?php
                        if ($jumlahindikator != 0) {
                            $tprogram = $tprogram / $jumlahindikator;
                        } else {
                            $tprogram = 0;
                        }

                        $warna = MyHelpers::nilaiByValue($tprogram,1,$vardb); ?>
                        <td align="center" bgcolor="<?php echo $warna; ?>"><?php echo number_format($tprogram, 2, ',', '.'); ?></td>
                        <td></td>
                        <?php
                        if ($jumlahindikator != 0) {
                            $tprogram1 = $tprogram1 / $jumlahindikator;
                        } else {
                            $tprogram1 = 0;
                        }

                        $warna = MyHelpers::nilaiByValue($tprogram1,1,$vardb); ?>
                        <td align="center" bgcolor="<?php echo $warna; ?>"><?php echo number_format($tprogram1, 2, ',', '.'); ?></td>
                    </tr>
                    </tbody>
                </table>
                <BR><BR>
                <table>
                    <tr>
                        <?php MyHelpers::keteranganNilai(1,$vardb);?>
                    </tr>
                </table>
            </div>
            <div class="row" style="height:50px;"></div>
        </div>
        <!-- END OF BODY -->
        
        </body>
        <?php
    }
    if ($varlap == 4) {

        //Laporan Pengukuran Kinerja Triwulan I
        ?>

        <body style="width:1300px;">
        <!-- BEGIN OF BODY -->
        <div class="container" style="font-family:times, serif;width:1300px;">
            
            <div class="row text-center" style="font-weight:bold;">
                <div class="col-sm-12 form-inline">
                    
                    LAPORAN PENGUKURAN KINERJA TAHUN <?php echo $vardb; ?> TRIWULAN III<BR><?php echo strtoupper(MyHelpers::fgetonedata($vardb,"topd",$varopd)); ?>
                    <BR>
                    PEMERINTAH DAERAH PROVINSI JAWA BARAT<BR>
                </div>
            </div>
            <div class="row" style="height:30px;"></div>
            <div class="row" style="margin: 0 auto;">
                <table class="table table-bordered table-hover table-responsive table-condensed">
                    <thead style="background-color:#C5C5EC;font-weight:bold;">
                    <tr>
                        <th class="text-center" rowspan="2" style="width:50px;">No.</th>
                        <th class="text-center" rowspan="2" style="width:350px;">Sasaran</th>
                        <th class="text-center" rowspan="2">Indikator</th>
                        <th class="text-center" rowspan="2" style="width:80px;">Capaian Thn Lalu</th>
                        <th class="text-center" colspan="3">Target</th>
                        <th class="text-center" rowspan="2" style="width:80px;">Target Akhir Renstra</th>
                        <th class="text-center" rowspan="2" style="width:120px;">Capaian Thn <?php echo $vardb; ?> terhadap
                            Target Akhir Renstra
                        </th>
                    </tr>
                    <tr>
                        <th class="text-center" style="width:80px;">Target</th>
                        <th class="text-center" style="width:80px;">Realisasi T3</th>
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
                    </tr>
                    </thead>
                    <?php
                    $counting = 0;
                    $tprogram = 0;
                    $tprogram1 = 0;
                    $sqlstra = "select * from tindikator where id_instansi='$varopd'";
                    $resulta = $connection->createCommand($sqlstra)->queryAll();
                    $jumlahindikator = count($resulta);
                    ?>
                    <tbody>
                    <?php
                    //require_once 'inc/penilaian.php';
                    $nomor_urut = 0;
                    foreach ($resulta as $rowa){
                        $nomor_indikator = $rowa['nomor_indikator'];
                        $nomor_sasaran = $rowa['nomor_sasaran'];
                        $nomor_tujuan = $rowa['nomor_tujuan'];
                        $nomor_misi = $rowa['nomor_misi'];
                        $nama_indikator = $rowa['indikator'];
                        $capaianlalu = $rowa['realisasi_tahun_sebelumnya'];
                        //$target=$rowa['target_triwulan1'];
                        $target = $rowa['target'];
                        $realisasi = $rowa['realisasi_triwulan3'];
                        $targetrenstra = $rowa['target_akhir_renstra'];
                        $nomor_urut++;
                        $sqlstrc = "select * from tsasaran where id_instansi='$varopd' and nomor_sasaran=$nomor_sasaran ";
                        $sqlstrc .= "and nomor_tujuan=$nomor_tujuan and nomor_misi=$nomor_misi ";
                        $rowc = $connection->createCommand($sqlstrc)->queryRow();
                        $nama_sasaran = $rowc['sasaran'];
                        ?>
                        <tr>
                            <td align="center"><?php echo $nomor_urut; ?></td>
                            <td align="justify"><?php echo $nama_sasaran; ?></td>
                            <td align="justify"><?php echo $nama_indikator; ?></td>
                            <td align="center"><?php echo number_format($capaianlalu, 0, ',', '.'); ?></td>
                            <td align="center"><?php echo number_format($target, 0, ',', '.'); ?></td>
                            <td align="center"><?php echo number_format($realisasi, 0, ',', '.'); ?></td>
                            <?php
                            if ($target != 0) {
                                $preal = $realisasi * 100 / $target;
                                $warna = MyHelpers::nilaiByValue($preal,1,$vardb);
                            } else {
                                $preal = 0;
                                $warna = MyHelpers::nilaiByValue($preal,1,$vardb);
                            }
                            $tprogram = $tprogram + $preal;
                            ?>
                            <td align="center" bgcolor="<?php echo $warna; ?>"><?php echo number_format($preal, 2, ',', '.'); ?></td>
                            <td align="center"><?php echo number_format($targetrenstra, 0, ',', '.'); ?></td>
                            <?php
                            if ($targetrenstra != 0) {
                                $preal = $realisasi * 100 / $targetrenstra;
                                $warna = MyHelpers::nilaiByValue($preal,1,$vardb);
                            } else {
                                $preal = 0;
                                $warna = MyHelpers::nilaiByValue($preal,1,$vardb);
                            }
                            $tprogram1 = $tprogram1 + $preal;
                            ?>
                            <td align="center" bgcolor="<?php echo $warna; ?>"><?php echo number_format($preal, 2, ',', '.'); ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                    <tr>
                        <td colspan="6"></td>
                        <td></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td colspan="6" align="right">RATA-RATA :</td>
                        <?php
                        if ($jumlahindikator != 0) {
                            $tprogram = $tprogram / $jumlahindikator;
                        } else {
                            $tprogram = 0;
                        }

                        $warna = MyHelpers::nilaiByValue($tprogram,1,$vardb); ?>
                        <td align="center" bgcolor="<?php echo $warna; ?>"><?php echo number_format($tprogram, 2, ',', '.'); ?></td>
                        <td></td>
                        <?php
                        if ($jumlahindikator != 0) {
                            $tprogram1 = $tprogram1 / $jumlahindikator;
                        } else {
                            $tprogram1 = 0;
                        }

                        $warna = MyHelpers::nilaiByValue($tprogram1,1,$vardb); ?>
                        <td align="center" bgcolor="<?php echo $warna; ?>"><?php echo number_format($tprogram1, 2, ',', '.'); ?></td>
                    </tr>
                    </tbody>
                </table>
                <BR><BR>
                <table>
                    <tr>
                        <?php MyHelpers::keteranganNilai(1,$vardb);?>
                    </tr>
                </table>
            </div>
            <div class="row" style="height:50px;"></div>
        </div>
        <!-- END OF BODY -->
        </body>
        <?php
    }
    if ($varlap == 5) {
        
        //Laporan Pengukuran Kinerja Triwulan I
        ?>

        <body style="width:1300px;">
        <!-- BEGIN OF BODY -->
        <div class="container" style="font-family:times, serif;width:1300px;">
            
            <div class="row text-center" style="font-weight:bold;">
                <div class="col-sm-12 form-inline">
                    
                    LAPORAN PENGUKURAN KINERJA TAHUN <?php echo $vardb; ?> TRIWULAN IV<BR><?php echo strtoupper(MyHelpers::fgetonedata($vardb,"topd",$varopd)); ?>
                    <BR>
                    PEMERINTAH DAERAH PROVINSI JAWA BARAT<BR>
                </div>
            </div>
            <div class="row" style="height:30px;"></div>
            <div class="row" style="margin: 0 auto;">
                <table class="table table-bordered table-hover table-responsive table-condensed">
                    <thead style="background-color:#C5C5EC;font-weight:bold;">
                    <tr>
                        <th class="text-center" rowspan="2" style="width:50px;">No.</th>
                        <th class="text-center" rowspan="2" style="width:350px;">Sasaran</th>
                        <th class="text-center" rowspan="2">Indikator</th>
                        <th class="text-center" rowspan="2" style="width:80px;">Capaian Thn Lalu</th>
                        <th class="text-center" colspan="3">Target</th>
                        <th class="text-center" rowspan="2" style="width:80px;">Target Akhir Renstra</th>
                        <th class="text-center" rowspan="2" style="width:120px;">Capaian Thn <?php echo $vardb; ?> terhadap
                            Target Akhir Renstra
                        </th>
                    </tr>
                    <tr>
                        <th class="text-center" style="width:80px;">Target</th>
                        <th class="text-center" style="width:80px;">Realisasi T4</th>
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
                    </tr>
                    </thead>
                    <?php
                    $counting = 0;
                    $tprogram = 0;
                    $tprogram1 = 0;
                    $sqlstra = "select * from tindikator where id_instansi='$varopd'";
                    $resulta = $connection->createCommand($sqlstra)->queryAll();
                    $jumlahindikator = count($resulta);
                    ?>
                    <tbody>
                    <?php
                    ////require_once 'inc/penilaian.php';
                    $nomor_urut = 0;
                    foreach ($resulta as $rowa ) {
                        $nomor_indikator = $rowa['nomor_indikator'];
                        $nomor_sasaran = $rowa['nomor_sasaran'];
                        $nomor_tujuan = $rowa['nomor_tujuan'];
                        $nomor_misi = $rowa['nomor_misi'];
                        $nama_indikator = $rowa['indikator'];
                        $capaianlalu = $rowa['realisasi_tahun_sebelumnya'];
                        //$target=$rowa['target_triwulan1'];
                        $target = $rowa['target'];
                        $realisasi = $rowa['realisasi_triwulan4'];
                        $targetrenstra = $rowa['target_akhir_renstra'];
                        $nomor_urut++;
                        $sqlstrc = "select * from tsasaran where id_instansi='$varopd' and nomor_sasaran=$nomor_sasaran ";
                        $sqlstrc .= "and nomor_tujuan=$nomor_tujuan and nomor_misi=$nomor_misi ";
                        $rowc = $connection->createCommand($sqlstrc)->queryRow();
                        $nama_sasaran = $rowc['sasaran'];
                        ?>
                        <tr>
                            <td align="center"><?php echo $nomor_urut; ?></td>
                            <td align="justify"><?php echo $nama_sasaran; ?></td>
                            <td align="justify"><?php echo $nama_indikator; ?></td>
                            <td align="center"><?php echo number_format($capaianlalu, 0, ',', '.'); ?></td>
                            <td align="center"><?php echo number_format($target, 0, ',', '.'); ?></td>
                            <td align="center"><?php echo number_format($realisasi, 0, ',', '.'); ?></td>
                            <?php
                            if ($target != 0) {
                                $preal = $realisasi * 100 / $target;
                                $warna = MyHelpers::nilaiByValue($preal,1,$vardb);
                            } else {
                                $preal = 0;
                                $warna = MyHelpers::nilaiByValue($preal,1,$vardb);
                            }
                            $tprogram = $tprogram + $preal;
                            ?>
                            <td align="center" bgcolor="<?php echo $warna; ?>"><?php echo number_format($preal, 2, ',', '.'); ?></td>
                            <td align="center"><?php echo number_format($targetrenstra, 0, ',', '.'); ?></td>
                            <?php
                            if ($targetrenstra != 0) {
                                $preal = $realisasi * 100 / $targetrenstra;
                                $warna = MyHelpers::nilaiByValue($preal,1,$vardb);
                            } else {
                                $preal = 0;
                                $warna = MyHelpers::nilaiByValue($preal,1,$vardb);
                            }
                            $tprogram1 = $tprogram1 + $preal;
                            ?>
                            <td align="center" bgcolor="<?php echo $warna; ?>"><?php echo number_format($preal, 2, ',', '.'); ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                    <tr>
                        <td colspan="6"></td>
                        <td></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td colspan="6" align="right">RATA-RATA :</td>
                        <?php
                        if ($jumlahindikator != 0) {
                            $tprogram = $tprogram / $jumlahindikator;
                        } else {
                            $tprogram = 0;
                        }

                        $warna = MyHelpers::nilaiByValue($tprogram,1,$vardb); ?>
                        <td align="center" bgcolor="<?php echo $warna; ?>"><?php echo number_format($tprogram, 2, ',', '.'); ?></td>
                        <td></td>
                        <?php
                        if ($jumlahindikator != 0) {
                            $tprogram1 = $tprogram1 / $jumlahindikator;
                        } else {
                            $tprogram1 = 0;
                        }

                        $warna = MyHelpers::nilaiByValue($tprogram1,1,$vardb); ?>
                        <td align="center" bgcolor="<?php echo $warna; ?>"><?php echo number_format($tprogram1, 2, ',', '.'); ?></td>
                    </tr>
                    </tbody>
                </table>
                <BR><BR>
                <table>
                    <tr>
                        <?php MyHelpers::keteranganNilai(1,$vardb);?>
                    </tr>
                </table>
            </div>
            <div class="row" style="height:50px;"></div>
        </div>
        <!-- END OF BODY -->

        </body>
        <?php
    }
    if ($varlap == 7) {
        
        //Laporan Realisasi Kinerja dan Anggaran Triwulan I
        ?>

        <body style="width:1300px;">
        <!-- BEGIN OF BODY -->
        <div class="container" style="font-family:times, serif;width:1300px;">
            
            <div class="row text-center" style="font-weight:bold;">
                <div class="col-sm-12 form-inline">
                    
                    LAPORAN REALISASI KINERJA DAN ANGGARAN TAHUN <?php echo $vardb; ?> TRIWULAN
                    I<BR><?php echo strtoupper(MyHelpers::fgetonedata($vardb,"topd",$varopd)); ?><BR>
                    PEMERINTAH DAERAH PROVINSI JAWA BARAT<BR>
                </div>
            </div>
            <div class="row" style="height:30px;"></div>
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
                        <th class="text-center" style="width:100px;">Realisasi T1</th>
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
                    $counting = 0;
                    $tprogram = 0;
                    $tindikator = 0;
                    $sqlstra = "select * from tprogram where id_instansi='$varopd'";
                    $resulta = $connection->createCommand($sqlstra)->queryAll();
                    $jumlahprogram = count($resulta);
                    ?>
                    <tbody>
                    <?php
                    ////require_once 'inc/penilaian.php';
                    $nomor_urut = 0;
                    foreach ($resulta as $rowa) {
                        $nomor_program = $rowa['nomor_program'];
                        $nomor_indikator = $rowa['nomor_indikator'];
                        $nomor_sasaran = $rowa['nomor_sasaran'];
                        $nomor_tujuan = $rowa['nomor_tujuan'];
                        $nomor_misi = $rowa['nomor_misi'];
                        $nama_program = $rowa['program'];
                        $pagu = $rowa['pagu_anggaran'];
                        $rpagu = $rowa['realisasi_keuangan'];
                        $nomor_urut++;
                        $sqlstrb = "select * from tindikator where id_instansi='$varopd' and nomor_sasaran=$nomor_sasaran ";
                        $sqlstrb .= "and nomor_tujuan=$nomor_tujuan and nomor_misi=$nomor_misi and nomor_indikator=$nomor_indikator";
                        $rowb = $connection->createCommand($sqlstrb)->queryRow();
                        $nama_indikator = $rowb['indikator'];
                        $target_indikator = $rowb['target'];
                        $realisasi_indikator = $rowb['realisasi_triwulan1'];
                        ?>
                        <tr>
                            <td align="center"><?php echo $nomor_urut; ?></td>
                            <?php
                            $sqlstrc = "select * from tsasaran where id_instansi='$varopd' and nomor_sasaran=$nomor_sasaran ";
                            $sqlstrc .= "and nomor_tujuan=$nomor_tujuan and nomor_misi=$nomor_misi ";
                            $rowc = $connection->createCommand($sqlstrc)->queryRow();
                            $nama_sasaran = $rowc['sasaran'];
                            ?>
                            <td align="justify"><?php echo $nama_sasaran; ?></td>
                            <td align="justify"><?php echo $nama_indikator; ?></td>
                            <td align="center"><?php echo number_format($target_indikator, 0, ',', '.'); ?></td>
                            <td align="center"><?php echo number_format($realisasi_indikator, 0, ',', '.'); ?></td>
                            <?php
                            if ($target_indikator != 0) {
                                $ireal = $realisasi_indikator * 100 / $target_indikator;
                                $warna = MyHelpers::nilaiByValue($ireal,1,$vardb);
                            } else {
                                $ireal = 0;
                                $warna = MyHelpers::nilaiByValue($ireal,1,$vardb);
                            }
                            $tindikator = $tindikator + $ireal;
                            ?>
                            <td align="center"
                                bgcolor="<?php echo $warna; ?>"><?php echo number_format($ireal, 2, ',', '.') . "%"; ?></td>
                            <td align="justify"><?php echo $nama_program; ?></td>
                            <td align="right"><?php echo number_format($pagu, 2, ',', '.'); ?></td>
                            <td align="right"><?php echo number_format($rpagu, 2, ',', '.'); ?></td>
                            <?php
                            if ($pagu != 0) {
                                $preal = $rpagu * 100 / $pagu;
                                $warna = MyHelpers::nilaiByValue($preal,null,$vardb);
                            } else {
                                $preal = 0;
                                $warna = MyHelpers::nilaiByValue($preal,null,$vardb);
                            }
                            $tprogram = $tprogram + $preal;
                            ?>
                            <td align="center"
                                bgcolor="<?php echo $warna; ?>"><?php echo number_format($preal, 2, ',', '.') . "%"; ?></td>
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
                        $warna = MyHelpers::nilaiByValue($tindikator,null,$vardb);
                        ?>
                        <td align="center"
                            bgcolor="<?php echo $warna; ?>"><?php echo number_format($tindikator, 2, ',', '.') . "%"; ?></td>
                        <td colspan="3" align="right">RATA-RATA :</td><?php
                        if ($jumlahprogram != 0) {
                            $tprogram = $tprogram / $jumlahprogram;
                        } else {
                            $tprogram = 0;
                        }
                        $warna = MyHelpers::nilaiByValue($tprogram,null,$vardb);
                        ?>
                        <td align="center"
                            bgcolor="<?php echo $warna; ?>"><?php echo number_format($tprogram, 2, ',', '.') . "%"; ?></td>
                    </tr>
                    </tbody>
                </table>
                <BR><BR>
                <table>
                    <tr>
                        <?php MyHelpers::keteranganNilai(1,$vardb);?>
                    </tr>
                </table>
            </div>
            <div class="row" style="height:50px;"></div>
        </div>
        <!-- END OF BODY -->
        
        </body>
        <?php
    }
    if ($varlap == 8) {
        

        
        
        //Laporan Realisasi Kinerja dan Anggaran Triwulan I
        ?>

        <body style="width:1300px;">
        <!-- BEGIN OF BODY -->
        <div class="container" style="font-family:times, serif;width:1300px;">
            
            <div class="row text-center" style="font-weight:bold;">
                <div class="col-sm-12 form-inline">
                    
                    Laporan Realisasi Kinerja dan Anggaran Tahun <?php echo $vardb; ?> TRIWULAN
                    II<BR><?php echo strtoupper(MyHelpers::fgetonedata($vardb,"topd",$varopd)); ?><BR>
                    PEMERINTAH DAERAH PROVINSI JAWA BARAT<BR>
                </div>
            </div>
            <div class="row" style="height:30px;"></div>
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
                        <th class="text-center" style="width:100px;">Realisasi T2</th>
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
                    $counting = 0;
                    $tprogram = 0;
                    $tindikator = 0;
                    $sqlstra = "select * from tprogram where id_instansi='$varopd'";
                    $resulta = $connection->createCommand($sqlstra)->queryAll();
                    $jumlahprogram = count($resulta);
                    ?>
                    <tbody>
                    <?php
                    ////require_once 'inc/penilaian.php';
                    $nomor_urut = 0;
                    foreach ($resulta as $rowa) {
                        $nomor_program = $rowa['nomor_program'];
                        $nomor_indikator = $rowa['nomor_indikator'];
                        $nomor_sasaran = $rowa['nomor_sasaran'];
                        $nomor_tujuan = $rowa['nomor_tujuan'];
                        $nomor_misi = $rowa['nomor_misi'];
                        $nama_program = $rowa['program'];
                        $pagu = $rowa['pagu_anggaran'];
                        $rpagu = $rowa['realisasi_keuangan'];
                        $nomor_urut++;
                        $sqlstrb = "select * from tindikator where id_instansi='$varopd' and nomor_sasaran=$nomor_sasaran ";
                        $sqlstrb .= "and nomor_tujuan=$nomor_tujuan and nomor_misi=$nomor_misi and nomor_indikator=$nomor_indikator";
                        $rowb = $connection->createCommand($sqlstrb)->queryRow();
                        $nama_indikator = $rowb['indikator'];
                        $target_indikator = $rowb['target'];
                        $realisasi_indikator = $rowb['realisasi_triwulan2'];
                        ?>
                        <tr>
                            <td align="center"><?php echo $nomor_urut; ?></td>
                            <?php
                            $sqlstrc = "select * from tsasaran where id_instansi='$varopd' and nomor_sasaran=$nomor_sasaran ";
                            $sqlstrc .= "and nomor_tujuan=$nomor_tujuan and nomor_misi=$nomor_misi ";
                            $rowc = $connection->createCommand($sqlstrc)->queryRow();
                            $nama_sasaran = $rowc['sasaran'];
                            ?>
                            <td align="justify"><?php echo $nama_sasaran; ?></td>
                            <td align="justify"><?php echo $nama_indikator; ?></td>
                            <td align="center"><?php echo number_format($target_indikator, 0, ',', '.'); ?></td>
                            <td align="center"><?php echo number_format($realisasi_indikator, 0, ',', '.'); ?></td>
                            <?php
                            if ($target_indikator != 0) {
                                $ireal = $realisasi_indikator * 100 / $target_indikator;
                                $warna = MyHelpers::nilaiByValue($ireal,1,$vardb);
                            } else {
                                $ireal = 0;
                                $warna = MyHelpers::nilaiByValue($ireal,1,$vardb);
                            }
                            $tindikator = $tindikator + $ireal;
                            ?>
                            <td align="center"
                                bgcolor="<?php echo $warna; ?>"><?php echo number_format($ireal, 2, ',', '.') . "%"; ?></td>
                            <td align="justify"><?php echo $nama_program; ?></td>
                            <td align="right"><?php echo number_format($pagu, 2, ',', '.'); ?></td>
                            <td align="right"><?php echo number_format($rpagu, 2, ',', '.'); ?></td>
                            <?php
                            if ($pagu != 0) {
                                $preal = $rpagu * 100 / $pagu;
                                $warna = MyHelpers::nilaiByValue($preal,null,$vardb);
                            } else {
                                $preal = 0;
                                $warna = MyHelpers::nilaiByValue($preal,null,$vardb);
                            }
                            $tprogram = $tprogram + $preal;
                            ?>
                            <td align="center"
                                bgcolor="<?php echo $warna; ?>"><?php echo number_format($preal, 2, ',', '.') . "%"; ?></td>
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
                        $warna = MyHelpers::nilaiByValue($tindikator,null,$vardb);
                        ?>
                        <td align="center"
                            bgcolor="<?php echo $warna; ?>"><?php echo number_format($tindikator, 2, ',', '.') . "%"; ?></td>
                        <td colspan="3" align="right">RATA-RATA :</td><?php
                        if ($jumlahprogram != 0) {
                            $tprogram = $tprogram / $jumlahprogram;
                        } else {
                            $tprogram = 0;
                        }
                        $warna = MyHelpers::nilaiByValue($tprogram,null,$vardb);
                        ?>
                        <td align="center"
                            bgcolor="<?php echo $warna; ?>"><?php echo number_format($tprogram, 2, ',', '.') . "%"; ?></td>
                    </tr>
                    </tbody>
                </table>
                <BR><BR>
                <table>
                    <tr>
                        <?php MyHelpers::keteranganNilai(1,$vardb);?>
                    </tr>
                </table>
            </div>
            <div class="row" style="height:50px;"></div>
        </div>
        <!-- END OF BODY -->
        
        </body>
        <?php
    }
    if ($varlap == 9) {
        

        
        
        //Laporan Realisasi Kinerja dan Anggaran Triwulan I
        ?>

        <body style="width:1300px;">
        <!-- BEGIN OF BODY -->
        <div class="container" style="font-family:times, serif;width:1300px;">
            
            <div class="row text-center" style="font-weight:bold;">
                <div class="col-sm-12 form-inline">
                    
                    LAPORAN REALISASI KINERJA DAN ANGGARAN TAHUN <?php echo $vardb; ?> TRIWULAN III<BR>
                    <?php echo strtoupper(MyHelpers::fgetonedata($vardb,"topd",$varopd)); ?><BR>
                    PEMERINTAH DAERAH PROVINSI JAWA BARAT<BR>
                </div>
            </div>
            <div class="row" style="height:30px;"></div>
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
                        <th class="text-center" style="width:100px;">Realisasi T3</th>
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
                    $counting = 0;
                    $tprogram = 0;
                    $tindikator = 0;
                    $sqlstra = "select * from tprogram where id_instansi='$varopd'";
                    $resulta = $connection->createCommand($sqlstra)->queryAll();
                    $jumlahprogram = count($resulta);
                    ?>
                    <tbody>
                    <?php
                    ////require_once 'inc/penilaian.php';
                    $nomor_urut = 0;
                    foreach ($resulta as $rowa ) {
                        
                        $nomor_program = $rowa['nomor_program'];
                        $nomor_indikator = $rowa['nomor_indikator'];
                        $nomor_sasaran = $rowa['nomor_sasaran'];
                        $nomor_tujuan = $rowa['nomor_tujuan'];
                        $nomor_misi = $rowa['nomor_misi'];
                        $nama_program = $rowa['program'];
                        $pagu = $rowa['pagu_anggaran'];
                        $rpagu = $rowa['realisasi_keuangan'];
                        $nomor_urut++;
                        $sqlstrb = "select * from tindikator where id_instansi='$varopd' and nomor_sasaran=$nomor_sasaran ";
                        $sqlstrb .= "and nomor_tujuan=$nomor_tujuan and nomor_misi=$nomor_misi and nomor_indikator=$nomor_indikator";
                        $rowb = $connection->createCommand($sqlstrb)->queryRow();
                        $nama_indikator = $rowb['indikator'];
                        $target_indikator = $rowb['target'];
                        $realisasi_indikator = $rowb['realisasi_triwulan3'];
                        ?>
                        <tr>
                            <td align="center"><?php echo $nomor_urut; ?></td>
                            <?php
                            $sqlstrc = "select * from tsasaran where id_instansi='$varopd' and nomor_sasaran=$nomor_sasaran ";
                            $sqlstrc .= "and nomor_tujuan=$nomor_tujuan and nomor_misi=$nomor_misi ";
                            $rowc =$connection->createCommand($sqlstrc)->queryRow();
                            $nama_sasaran = $rowc['sasaran'];
                            ?>
                            <td align="justify"><?php echo $nama_sasaran; ?></td>
                            <td align="justify"><?php echo $nama_indikator; ?></td>
                            <td align="center"><?php echo number_format($target_indikator, 0, ',', '.'); ?></td>
                            <td align="center"><?php echo number_format($realisasi_indikator, 0, ',', '.'); ?></td>
                            <?php
                            if ($target_indikator != 0) {
                                $ireal = $realisasi_indikator * 100 / $target_indikator;
                                $warna = MyHelpers::nilaiByValue($ireal,1,$vardb); //nilai($ireal);
                            } else {
                                $ireal = 0;
                                $warna = MyHelpers::nilaiByValue($ireal,1,$vardb); //nilai($ireal);
                            }
                            $tindikator = $tindikator + $ireal;
                            ?>
                            <td align="center"
                                bgcolor="<?php echo $warna; ?>"><?php echo number_format($ireal, 2, ',', '.') . "%"; ?></td>
                            <td align="justify"><?php echo $nama_program; ?></td>
                            <td align="right"><?php echo number_format($pagu, 2, ',', '.'); ?></td>
                            <td align="right"><?php echo number_format($rpagu, 2, ',', '.'); ?></td>
                            <?php
                            if ($pagu != 0) {
                                $preal = $rpagu * 100 / $pagu;
                                $warna = MyHelpers::nilaiByValue($preal,null,$vardb);
                            } else {
                                $preal = 0;
                                $warna = MyHelpers::nilaiByValue($preal,null,$vardb);
                            }
                            $tprogram = $tprogram + $preal;
                            ?>
                            <td align="center"
                                bgcolor="<?php echo $warna; ?>"><?php echo number_format($preal, 2, ',', '.') . "%"; ?></td>
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
                        $warna = MyHelpers::nilaiByValue($tindikator,1,$vardb); //nilai($tindikator);
                        ?>
                        <td align="center"
                            bgcolor="<?php echo $warna; ?>"><?php echo number_format($tindikator, 2, ',', '.') . "%"; ?></td>
                        <td colspan="3" align="right">RATA-RATA :</td><?php
                        if ($jumlahprogram != 0) {
                            $tprogram = $tprogram / $jumlahprogram;
                        } else {
                            $tprogram = 0;
                        }
                        $warna =  MyHelpers::nilaiByValue($tprogram,1,$vardb); //nilai($tprogram);
                        ?>
                        <td align="center"
                            bgcolor="<?php echo $warna; ?>"><?php echo number_format($tprogram, 2, ',', '.') . "%"; ?></td>
                    </tr>
                    </tbody>
                </table>
                <BR><BR>
                <table>
                    <tr>
                        <?php MyHelpers::keteranganNilai(1,$vardb);?>
                    </tr>
                </table>
            </div>
            <div class="row" style="height:50px;"></div>
        </div>
        <!-- END OF BODY -->
        
        </body>
        <?php
    }
    if ($varlap == 10) {
        

        
        
        //Laporan Realisasi Kinerja dan Anggaran Triwulan I
        ?>

        <body style="width:1300px;">
        <!-- BEGIN OF BODY -->
        <div class="container" style="font-family:times, serif;width:1300px;">
            
            <div class="row text-center" style="font-weight:bold;">
                <div class="col-sm-12 form-inline">
                    
                    LAPORAN REALISASI KINERJA DAN ANGGARAN TAHUN <?php echo $vardb; ?> TRIWULAN IV<BR>
                    <?php echo strtoupper(MyHelpers::fgetonedata($vardb,"topd",$varopd)); ?><BR>
                    PEMERINTAH DAERAH PROVINSI JAWA BARAT<BR>
                </div>
            </div>
            <div class="row" style="height:30px;"></div>
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
                        <th class="text-center" style="width:100px;">Realisasi T4</th>
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
                    $counting = 0;
                    $tprogram = 0;
                    $tindikator = 0;
                    $sqlstra = "select * from tprogram where id_instansi='$varopd'";
                    $resulta = $connection->createCommand($sqlstra)->queryAll();
                    $jumlahprogram = count($resulta);
                    ?>
                    <tbody>
                    <?php
                    ////require_once 'inc/penilaian.php';
                    $nomor_urut = 0;
                    foreach ($resulta as $rowa ) {
                        
                        $nomor_program = $rowa['nomor_program'];
                        $nomor_indikator = $rowa['nomor_indikator'];
                        $nomor_sasaran = $rowa['nomor_sasaran'];
                        $nomor_tujuan = $rowa['nomor_tujuan'];
                        $nomor_misi = $rowa['nomor_misi'];
                        $nama_program = $rowa['program'];
                        $pagu = $rowa['pagu_anggaran'];
                        $rpagu = $rowa['realisasi_keuangan'];
                        $nomor_urut++;
                        $sqlstrb = "select * from tindikator where id_instansi='$varopd' and nomor_sasaran=$nomor_sasaran ";
                        $sqlstrb .= "and nomor_tujuan=$nomor_tujuan and nomor_misi=$nomor_misi and nomor_indikator=$nomor_indikator";
                        $rowb = $connection->createCommand($sqlstrb)->queryRow();
                        $nama_indikator = $rowb['indikator'];
                        $target_indikator = $rowb['target'];
                        $realisasi_indikator = $rowb['realisasi_triwulan4'];
                        ?>
                        <tr>
                            <td align="center"><?php echo $nomor_urut; ?></td>
                            <?php
                            $sqlstrc = "select * from tsasaran where id_instansi='$varopd' and nomor_sasaran=$nomor_sasaran ";
                            $sqlstrc .= "and nomor_tujuan=$nomor_tujuan and nomor_misi=$nomor_misi ";
                            $rowc = $connection->createCommand($sqlstrc)->queryRow();
                            $nama_sasaran = $rowc['sasaran'];
                            ?>
                            <td align="justify"><?php echo $nama_sasaran; ?></td>
                            <td align="justify"><?php echo $nama_indikator; ?></td>
                            <td align="center"><?php echo number_format($target_indikator, 0, ',', '.'); ?></td>
                            <td align="center"><?php echo number_format($realisasi_indikator, 0, ',', '.'); ?></td>
                            <?php
                            if ($target_indikator != 0) {
                                $ireal = $realisasi_indikator * 100 / $target_indikator;
                                $warna = MyHelpers::nilaiByValue($ireal,1,$vardb); // nilai($ireal);
                            } else {
                                $ireal = 0;
                                $warna = MyHelpers::nilaiByValue($ireal,1,$vardb); //nilai($ireal);
                            }
                            $tindikator = $tindikator + $ireal;
                            ?>
                            <td align="center"
                                bgcolor="<?php echo $warna; ?>"><?php echo number_format($ireal, 2, ',', '.') . "%"; ?></td>
                            <td align="justify"><?php echo $nama_program; ?></td>
                            <td align="right"><?php echo number_format($pagu, 2, ',', '.'); ?></td>
                            <td align="right"><?php echo number_format($rpagu, 2, ',', '.'); ?></td>
                            <?php
                            if ($pagu != 0) {
                                $preal = $rpagu * 100 / $pagu;
                                $warna = MyHelpers::nilaiByValue($preal,null,$vardb);
                            } else {
                                $preal = 0;
                                $warna = MyHelpers::nilaiByValue($preal,null,$vardb);
                            }
                            $tprogram = $tprogram + $preal;
                            ?>
                            <td align="center"
                                bgcolor="<?php echo $warna; ?>"><?php echo number_format($preal, 2, ',', '.') . "%"; ?></td>
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
                        $warna = MyHelpers::nilaiByValue($tindikator,1,$vardb); // nilai($tindikator);
                        ?>
                        <td align="center"
                            bgcolor="<?php echo $warna; ?>"><?php echo number_format($tindikator, 2, ',', '.') . "%"; ?></td>
                        <td colspan="3" align="right">RATA-RATA :</td><?php
                        if ($jumlahprogram != 0) {
                            $tprogram = $tprogram / $jumlahprogram;
                        } else {
                            $tprogram = 0;
                        }
                        $warna = MyHelpers::nilaiByValue($tprogram,1,$vardb); //nilai($tprogram);
                        ?>
                        <td align="center"
                            bgcolor="<?php echo $warna; ?>"><?php echo number_format($tprogram, 2, ',', '.') . "%"; ?></td>
                    </tr>
                    </tbody>
                </table>
                <BR><BR>
                <table>
                    <tr>
                        <?php MyHelpers::keteranganNilai(1,$vardb);?>
                    </tr>
                </table>
            </div>
            <div class="row" style="height:50px;"></div>
        </div>
        <!-- END OF BODY -->
        
        </body>
        <?php
    }
    if ($varlap == 11) {
        

        
        
        //Laporan ke 3
        ?>

        <body style="width:1300px;">
        <!-- BEGIN OF BODY -->
        <div class="container" style="font-family:times, serif;width:1300px;">
            
            <div class="row text-center" style="font-weight:bold;">
                <div class="col-sm-12 form-inline">
                    
                    LAPORAN ANALISA EFISIENSI PENGGUNAAN SUMBER DAYA TAHUN <?php echo $vardb; ?>
                    <BR><?php echo strtoupper(MyHelpers::fgetonedata($vardb,"topd",$varopd)); ?><BR>
                    PEMERINTAH DAERAH PROVINSI JAWA BARAT<BR>
                </div>
            </div>
            <div class="row" style="height:30px;"></div>
            <div class="row" style="margin: 0 auto;">
                <table class="table table-bordered table-hover table-responsive table-condensed">
                    <thead style="background-color:#C5C5EC;font-weight:bold;">
                    <tr>
                        <th class="text-center" style="width:50px;">No.</th>
                        <th class="text-center" style="width:300px;">Sasaran</th>
                        <th class="text-center" style="width:300px;">Indikator</th>
                        <th class="text-center" style="width:100px;">% Capaian Kinerja</th>
                        <th class="text-center" style="width:100px;">% Penyerapan Anggaran</th>
                        <th class="text-center" style="width:100px;">Tingkat Efisiensi</th>
                    </tr>
                    <tr>
                        <th class="text-center">1</th>
                        <th class="text-center">2</th>
                        <th class="text-center">3</th>
                        <th class="text-center">4</th>
                        <th class="text-center">5</th>
                        <th class="text-center">6</th>
                    </tr>
                    </thead>
                    <?php
                    $counting = 0;
                    $tprogram = 0;
                    $tindikator = 0;
                    $sqlstra = "select * from tprogram where id_instansi='$varopd'";
                    $resulta = $connection->createCommand($sqlstra)->queryAll();
                    $jumlahprogram = count($resulta);
                    ?>
                    <tbody>
                    <?php
                    ////require_once 'inc/penilaian.php';
                    $nomor_urut = 0;
                    foreach ($resulta as $rowa){
                    
                    $nomor_program = $rowa['nomor_program'];
                    $nomor_indikator = $rowa['nomor_indikator'];
                    $nomor_sasaran = $rowa['nomor_sasaran'];
                    $nomor_tujuan = $rowa['nomor_tujuan'];
                    $nomor_misi = $rowa['nomor_misi'];
                    $nama_program = $rowa['program'];
                    $pagu = $rowa['pagu_anggaran'];
                    $rpagu = $rowa['realisasi_keuangan'];
                    $nomor_urut++;
                    $sqlstrb = "select * from tindikator where id_instansi='$varopd' and nomor_sasaran=$nomor_sasaran ";
                    $sqlstrb .= "and nomor_tujuan=$nomor_tujuan and nomor_misi=$nomor_misi and nomor_indikator=$nomor_indikator";
                    $rowb = $connection->createCommand($sqlstrb)->queryRow();
                    $nama_indikator = $rowb['indikator'];
                    $target_indikator = $rowb['target'];
                    $realisasi_indikator = $rowb['realisasi'];

                    $sqlstrc = "select * from tsasaran where id_instansi='$varopd' and nomor_sasaran=$nomor_sasaran ";
                    $sqlstrc .= "and nomor_tujuan=$nomor_tujuan and nomor_misi=$nomor_misi ";
                    $rowc = $connection->createCommand($sqlstrc)->queryRow();
                    $nama_sasaran = $rowc['sasaran'];

                    if ($target_indikator != 0) {
                        $capaiankinerja = $realisasi_indikator * 100 / $target_indikator;
                    } else {
                        $capaiankinerja = 0;
                    }
                    if ($capaiankinerja >= 100){
                    $warna1 = MyHelpers::nilaiByValue($capaiankinerja,null,$vardb); //nilai($capaiankinerja);

                    if ($pagu != 0) {
                        $preal = $rpagu * 100 / $pagu;
                        $warna2 = MyHelpers::nilaiByValue($preal,null,$vardb);
                    } else {
                        $preal = 0;
                        $warna2 = MyHelpers::nilaiByValue($preal,null,$vardb);
                    }
                    $tprogram = $tprogram + $preal;
                    ?>
                    <tr>
                        <td align="center"><?php echo $nomor_urut; ?></td>
                        <td align="justify"><?php echo $nama_sasaran; ?></td>
                        <td align="justify"><?php echo $nama_indikator; ?></td>
                        <td align="center"
                            bgcolor="<?php echo $warna1; ?>"><?php echo number_format($capaiankinerja, 2, ',', '.'); ?></td>
                        <td align="center" bgcolor="<?php echo $warna2; ?>"><?php echo number_format($preal, 2, ',', '.'); ?></td>
                        <?php
                        if ($pagu != 0) {
                            $preal = $rpagu * 100 / $pagu;
                            if ($preal >= 100) {
                                $preal = 100;
                            } else {
                                $preal = 100 - $preal;
                            }
                        } else {
                            $preal = 0;
                        }
                        ?>
                        <td align="center"><?php echo number_format($preal, 2, ',', '.') . "%"; ?></td>
                    <tr>
                        <?php
                        }
                        }
                        ?>
                    </tbody>
                </table>
                <BR><BR>
                <table>
                    <tr>
                        <?php MyHelpers::keteranganNilai(1,$vardb);?>
                    </tr>
                </table>
            </div>
            <div class="row" style="height:50px;"></div>
        </div>
        <!-- END OF BODY -->
        
        </body>
        <?php
    }
    if ($varlap == 12) {
        

        
        
        //Laporan ke 4
        ?>

        <body style="width:1600px;">
        <!-- BEGIN OF BODY -->
        <div class="container" style="font-family:times, serif;width:1600px;">
            
            <div class="row text-center" style="font-weight:bold;">
                <div class="col-sm-12 form-inline">
                    
                    LAPORAN PENGUKURAN KINERJA KEGIATAN/AKTIVITAS TAHUN <?php echo $vardb; ?>
                    <BR><?php echo strtoupper(MyHelpers::fgetonedata($vardb,"topd",$varopd)); ?><BR>
                    PEMERINTAH DAERAH PROVINSI JAWA BARAT<BR>
                </div>
            </div>
            <div class="row" style="height:30px;"></div>
            <div class="row" style="margin: 0 auto;">
                <table class="table table-bordered table-hover table-responsive table-condensed">
                    <thead style="background-color:#C5C5EC;font-weight:bold;">
                    <tr>
                        <th rowspan="3" class="text-center" style="vertical-align:middle;width:50px;">No.</th>
                        <th rowspan="3" class="text-center" style="vertical-align:middle;width:350px;">
                            Kegiatan/Aktivitas
                        </th>
                        <th rowspan="3" class="text-center" style="vertical-align:middle;width:350px;">Indikator
                            Kinerja
                        </th>
                        <th colspan="2" class="text-center">Target</th>
                        <th colspan="3" class="text-center">Realisasi</th>
                    </tr>
                    <tr>
                        <th rowspan="2" class="text-center" style="vertical-align:middle;width:80px;">Fisik (%)</th>
                        <th rowspan="2" class="text-center" style="vertical-align:middle;width:120px;">Keuangan (Rp)
                        </th>
                        <th rowspan="2" class="text-center" style="vertical-align:middle;width:80px;">Fisik (%)</th>
                        <th colspan="2" class="text-center">Keuangan</th>
                    </tr>
                    <tr>
                        <th class="text-center" style="width:120px;">(Rp)</th>
                        <th class="text-center" style="width:80px;">(%)</th>
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
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    //include_once 'inc/fgetindikator.php';
                    //include_once 'inc/penilaian.php';
                    $penomoran_kegiatan = 0;
                    $sqlstr1 = "select * from tkegiatan where id_instansi='$varopd'";
                    $result1 =$connection->createCommand($sqlstr1)->queryAll();
                    foreach ($result1 as $row1) {
                        $nomor_kegiatan = $row1['nomor_kegiatan'];
                        $nama_kegiatan = $row1['kegiatan'];
                        $nomor_indikator = $row1['nomor_indikator'];
                        $nomor_misi = $row1['nomor_misi'];
                        $nomor_tujuan = $row1['nomor_tujuan'];
                        $nomor_sasaran = $row1['nomor_sasaran'];
                        $nomor_program = $row1['nomor_program'];
                        $target_fisik_kegiatan = $row1['target_fisik'];
                        $target_keuangan_kegiatan = $row1['target_keuangan'];
                        $realisasi_fisik_kegiatan = $row1['realisasi_fisik'];
                        $realisasi_keuangan_kegiatan = $row1['realisasi_keuangan'];
                        $penomoran_kegiatan++;
                        ?>
                        <tr>
                            <td class="text-center" style="vertical-align:top;"><?php echo $penomoran_kegiatan; ?></td>
                            <td class="text-justify"><?php echo $nama_kegiatan; ?></td>
                            <td class="text-justify"><?php echo MyHelpers::fgetindikator($vardb,$nomor_indikator, $nomor_sasaran, $nomor_tujuan, $nomor_misi, $varopd); ?></td>
                            <td class="text-center"
                                style="vertical-align:top;"><?php echo number_format($target_fisik_kegiatan, 2, ',', '.') . "%"; ?></td>
                            <td class="text-right"
                                style="vertical-align:top;"><?php echo number_format($target_keuangan_kegiatan, 2, ',', '.'); ?></td>
                            <td class="text-center"
                                style="vertical-align:top;"><?php echo number_format($realisasi_fisik_kegiatan, 2, ',', '.') . "%"; ?></td>
                            <td class="text-right"
                                style="vertical-align:top;"><?php echo number_format($realisasi_keuangan_kegiatan, 2, ',', '.'); ?></td>
                            <?php
                            if ($target_keuangan_kegiatan != 0) {
                                $persentasekeuangan = $realisasi_keuangan_kegiatan * 100 / $target_keuangan_kegiatan;
                            } else {
                                $persentasekeuangan = 0;
                            }
                            $warna = MyHelpers::nilaiByValue($persentasekeuangan,1,$vardb); //nilai($persentasekeuangan);
                            ?>
                            <td class="text-center" bgcolor="<?php echo $warna; ?>"
                                style="vertical-align:top;"><?php echo number_format($persentasekeuangan, 2, ',', '.') . "%"; ?></td>
                        </tr>
                        <?php
                        $penomoran_aktivitas = 0;
                        $sqlstr2 = "select * from taktivitas where id_instansi='$varopd' and nomor_kegiatan=$nomor_kegiatan ";
                        $sqlstr2 .= "and nomor_misi=$nomor_misi and nomor_tujuan=$nomor_tujuan ";
                        $sqlstr2 .= "and nomor_sasaran=$nomor_sasaran and nomor_indikator=$nomor_indikator";
                        $result2 = $connection->createCommand($sqlstr2)->queryAll();
                        foreach ($result2 as $row2) {
                            $nomor_aktivitas = $row2['nomor_aktivitas'];
                            $nama_aktivitas = $row2['aktivitas'];
                            $penomoran_aktivitas++;
                            $target_fisik_aktivitas = $row2['target_fisik'];
                            $target_keuangan_aktivitas = $row2['target_keuangan'];
                            $realisasi_fisik_aktivitas = $row2['realisasi_fisik'];
                            $realisasi_keuangan_aktivitas = $row2['realisasi_keuangan'];
                            //$nomor_aktivitas=$row2[];
                            //$nomor_aktivitas=$row2[];
                            //$nomor_aktivitas=$row2[];
                            //$nomor_aktivitas=$row2[];
                            //$nomor_aktivitas=$row2[];
                            ?>
                            <tr>
                                <td class="text-center"
                                    style="vertical-align:top;"><?php echo $penomoran_kegiatan . "." . $penomoran_aktivitas; ?></td>
                                <td class="text-justify"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $nama_aktivitas; ?></td>
                                <td class="text-justify"><?php echo MyHelpers::fgetindikator($vardb,$nomor_indikator, $nomor_sasaran, $nomor_tujuan, $nomor_misi, $varopd); ?></td>
                                <td class="text-center"
                                    style="vertical-align:top;"><?php echo number_format($target_fisik_aktivitas, 2, ',', '.') . "%"; ?></td>
                                <td class="text-right"
                                    style="vertical-align:top;"><?php echo number_format($target_keuangan_aktivitas, 2, ',', '.'); ?></td>
                                <td class="text-center"
                                    style="vertical-align:top;"><?php echo number_format($realisasi_fisik_aktivitas, 2, ',', '.') . "%"; ?></td>
                                <td class="text-right"
                                    style="vertical-align:top;"><?php echo number_format($realisasi_keuangan_aktivitas, 2, ',', '.'); ?></td>
                                <?php
                                if ($target_keuangan_aktivitas != 0) {
                                    $persentasekeuangan = $realisasi_keuangan_aktivitas * 100 / $target_keuangan_aktivitas;
                                } else {
                                    $persentasekeuangan = 0;
                                }
                                $warna = MyHelpers::nilaiByValue($persentasekeuangan,1,$vardb); //nilai($persentasekeuangan);
                                ?>
                                <td class="text-center" bgcolor="<?php echo $warna; ?>"
                                    style="vertical-align:top;"><?php echo number_format($persentasekeuangan, 2, ',', '.') . "%"; ?></td>
                            </tr>
                            <?php
                        }

                    }
                    ?>
                    <?php


                    ?>

                    </tbody>
                </table>
                <BR><BR>
                <table>
                    <tr>
                        <?php MyHelpers::keteranganNilai(1,$vardb);?>
                    </tr>
                </table>
            </div>
            <div class="row" style="height:50px;"></div>
            <!-- END OF BODY -->
            
        </div>
        </body>
        <?php
    }
    if ($varlap == 13) {
        

        
        
        //Laporan ke 4
        ?>

        <body style="width:1600px;">
        <!-- BEGIN OF BODY -->
        <div class="container" style="font-family:times, serif;width:1600px;">
            
            <div class="row text-center" style="font-weight:bold;">
                <div class="col-sm-12 form-inline">
                    
                    LAPORAN PENGUKURAN KINERJA KEGIATAN/AKTIVITAS TAHUN <?php echo $vardb; ?> TRIWULAN
                    I<BR><?php echo strtoupper(MyHelpers::fgetonedata($vardb,"topd",$varopd)); ?><BR>
                    PEMERINTAH DAERAH PROVINSI JAWA BARAT<BR>
                </div>
            </div>
            <div class="row" style="height:30px;"></div>
            <div class="row" style="margin: 0 auto;">
                <table class="table table-bordered table-hover table-responsive table-condensed">
                    <thead style="background-color:#C5C5EC;font-weight:bold;">
                    <tr>
                        <th rowspan="3" class="text-center" style="vertical-align:middle;width:50px;">No.</th>
                        <th rowspan="3" class="text-center" style="vertical-align:middle;width:350px;">
                            Kegiatan/Aktivitas
                        </th>
                        <th rowspan="3" class="text-center" style="vertical-align:middle;width:350px;">Indikator
                            Kinerja
                        </th>
                        <th colspan="2" class="text-center">Target T1</th>
                        <th colspan="3" class="text-center">Realisasi T1</th>
                    </tr>
                    <tr>
                        <th rowspan="2" class="text-center" style="vertical-align:middle;width:80px;">Fisik (%)</th>
                        <th rowspan="2" class="text-center" style="vertical-align:middle;width:120px;">Keuangan (Rp)
                        </th>
                        <th rowspan="2" class="text-center" style="vertical-align:middle;width:80px;">Fisik (%)</th>
                        <th colspan="2" class="text-center">Keuangan T1</th>
                    </tr>
                    <tr>
                        <th class="text-center" style="width:120px;">(Rp)</th>
                        <th class="text-center" style="width:80px;">(%)</th>
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
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    //include_once 'inc/fgetindikator.php';
                    //include_once 'inc/penilaian.php';
                    $penomoran_kegiatan = 0;
                    $sqlstr1 = "select * from tkegiatan where id_instansi='$varopd'";
                    $result1 = $connection->createCommand($sqlstr1)->queryAll();
                    foreach ($result1 as $row1 ) {
                        $nomor_kegiatan = $row1['nomor_kegiatan'];
                        $nama_kegiatan = $row1['kegiatan'];
                        $nomor_indikator = $row1['nomor_indikator'];
                        $nomor_misi = $row1['nomor_misi'];
                        $nomor_tujuan = $row1['nomor_tujuan'];
                        $nomor_sasaran = $row1['nomor_sasaran'];
                        $nomor_program = $row1['nomor_program'];
                        $target_fisik_kegiatan = $row1['target_fisik_triwulan1'];
                        $target_keuangan_kegiatan = $row1['target_keuangan_triwulan1'];
                        $realisasi_fisik_kegiatan = $row1['realisasi_fisik_triwulan1'];
                        $realisasi_keuangan_kegiatan = $row1['realisasi_keuangan_triwulan1'];
                        $penomoran_kegiatan++;
                        ?>
                        <tr>
                            <td class="text-center" style="vertical-align:top;"><?php echo $penomoran_kegiatan; ?></td>
                            <td class="text-justify"><?php echo $nama_kegiatan; ?></td>
                            <td class="text-justify"><?php echo MyHelpers::fgetindikator($vardb,$nomor_indikator, $nomor_sasaran, $nomor_tujuan, $nomor_misi, $varopd); ?></td>
                            <td class="text-center"
                                style="vertical-align:top;"><?php echo number_format($target_fisik_kegiatan, 2, ',', '.') . "%"; ?></td>
                            <td class="text-right"
                                style="vertical-align:top;"><?php echo number_format($target_keuangan_kegiatan, 2, ',', '.'); ?></td>
                            <td class="text-center"
                                style="vertical-align:top;"><?php echo number_format($realisasi_fisik_kegiatan, 2, ',', '.') . "%"; ?></td>
                            <td class="text-right"
                                style="vertical-align:top;"><?php echo number_format($realisasi_keuangan_kegiatan, 2, ',', '.'); ?></td>
                            <?php
                            if ($target_keuangan_kegiatan != 0) {
                                $persentasekeuangan = $realisasi_keuangan_kegiatan * 100 / $target_keuangan_kegiatan;
                            } else {
                                $persentasekeuangan = 0;
                            }
                            $warna =  MyHelpers::nilaiByValue($persentasekeuangan,1,$vardb); //nilai($persentasekeuangan);
                            ?>
                            <td class="text-center" bgcolor="<?php echo $warna; ?>"
                                style="vertical-align:top;"><?php echo number_format($persentasekeuangan, 2, ',', '.') . "%"; ?></td>
                        </tr>
                        <?php
                        $penomoran_aktivitas = 0;
                        $sqlstr2 = "select * from taktivitas where id_instansi='$varopd' and nomor_kegiatan=$nomor_kegiatan ";
                        $sqlstr2 .= "and nomor_misi=$nomor_misi and nomor_tujuan=$nomor_tujuan ";
                        $sqlstr2 .= "and nomor_sasaran=$nomor_sasaran and nomor_indikator=$nomor_indikator";
                        $result2 = $connection->createCommand($sqlstr2)->queryAll();
                        foreach ($result2 as $row2 ) {
                            $nomor_aktivitas = $row2['nomor_aktivitas'];
                            $nama_aktivitas = $row2['aktivitas'];
                            $penomoran_aktivitas++;
                            $target_fisik_aktivitas = $row2['target_fisik_triwulan1'];
                            $target_keuangan_aktivitas = $row2['target_keuangan_triwulan1'];
                            $realisasi_fisik_aktivitas = $row2['realisasi_fisik_triwulan1'];
                            $realisasi_keuangan_aktivitas = $row2['realisasi_keuangan_triwulan1'];
                            //$nomor_aktivitas=$row2[];
                            //$nomor_aktivitas=$row2[];
                            //$nomor_aktivitas=$row2[];
                            //$nomor_aktivitas=$row2[];
                            //$nomor_aktivitas=$row2[];
                            ?>
                            <tr>
                                <td class="text-center"
                                    style="vertical-align:top;"><?php echo $penomoran_kegiatan . "." . $penomoran_aktivitas; ?></td>
                                <td class="text-justify"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $nama_aktivitas; ?></td>
                                <td class="text-justify"><?php echo MyHelpers::fgetindikator($vardb,$nomor_indikator, $nomor_sasaran, $nomor_tujuan, $nomor_misi, $varopd); ?></td>
                                <td class="text-center"
                                    style="vertical-align:top;"><?php echo number_format($target_fisik_aktivitas, 2, ',', '.') . "%"; ?></td>
                                <td class="text-right"
                                    style="vertical-align:top;"><?php echo number_format($target_keuangan_aktivitas, 2, ',', '.'); ?></td>
                                <td class="text-center"
                                    style="vertical-align:top;"><?php echo number_format($realisasi_fisik_aktivitas, 2, ',', '.') . "%"; ?></td>
                                <td class="text-right"
                                    style="vertical-align:top;"><?php echo number_format($realisasi_keuangan_aktivitas, 2, ',', '.'); ?></td>
                                <?php
                                if ($target_keuangan_aktivitas != 0) {
                                    $persentasekeuangan = $realisasi_keuangan_aktivitas * 100 / $target_keuangan_aktivitas;
                                } else {
                                    $persentasekeuangan = 0;
                                }
                                $warna =  MyHelpers::nilaiByValue($persentasekeuangan,1,$vardb); //nilai($persentasekeuangan);
                                ?>
                                <td class="text-center" bgcolor="<?php echo $warna; ?>"
                                    style="vertical-align:top;"><?php echo number_format($persentasekeuangan, 2, ',', '.') . "%"; ?></td>
                            </tr>
                            <?php
                        }

                    }
                    ?>
                    <?php


                    ?>

                    </tbody>
                </table>
                <BR><BR>
                <table>
                    <tr>
                        <?php MyHelpers::keteranganNilai(1,$vardb);?>
                    </tr>
                </table>
            </div>
            <div class="row" style="height:50px;"></div>
            <!-- END OF BODY -->
            
        </div>
        </body>
        <?php
    }
    if ($varlap == 14) {
        

        
        
        //Laporan ke 4
        ?>

        <body style="width:1600px;">
        <!-- BEGIN OF BODY -->
        <div class="container" style="font-family:times, serif;width:1600px;">
            
            <div class="row text-center" style="font-weight:bold;">
                <div class="col-sm-12 form-inline">
                    
                    LAPORAN PENGUKURAN KINERJA KEGIATAN/AKTIVITAS TAHUN <?php echo $vardb; ?> TRIWULAN
                    II<BR><?php echo strtoupper(MyHelpers::fgetonedata($vardb,"topd",$varopd)); ?><BR>
                    PEMERINTAH DAERAH PROVINSI JAWA BARAT<BR>
                </div>
            </div>
            <div class="row" style="height:30px;"></div>
            <div class="row" style="margin: 0 auto;">
                <table class="table table-bordered table-hover table-responsive table-condensed">
                    <thead style="background-color:#C5C5EC;font-weight:bold;">
                    <tr>
                        <th rowspan="3" class="text-center" style="vertical-align:middle;width:50px;">No.</th>
                        <th rowspan="3" class="text-center" style="vertical-align:middle;width:350px;">
                            Kegiatan/Aktivitas
                        </th>
                        <th rowspan="3" class="text-center" style="vertical-align:middle;width:350px;">Indikator
                            Kinerja
                        </th>
                        <th colspan="2" class="text-center">Target T2</th>
                        <th colspan="3" class="text-center">Realisasi T2</th>
                    </tr>
                    <tr>
                        <th rowspan="2" class="text-center" style="vertical-align:middle;width:80px;">Fisik (%)</th>
                        <th rowspan="2" class="text-center" style="vertical-align:middle;width:120px;">Keuangan (Rp)
                        </th>
                        <th rowspan="2" class="text-center" style="vertical-align:middle;width:80px;">Fisik (%)</th>
                        <th colspan="2" class="text-center">Keuangan T2</th>
                    </tr>
                    <tr>
                        <th class="text-center" style="width:120px;">(Rp)</th>
                        <th class="text-center" style="width:80px;">(%)</th>
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
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    //include_once 'inc/fgetindikator.php';
                    //include_once 'inc/penilaian.php';
                    $penomoran_kegiatan = 0;
                    $sqlstr1 = "select * from tkegiatan where id_instansi='$varopd'";
                    $result1 = $connection->createCommand($sqlstr1)->queryAll();
                    foreach ($result1 as $row1 ) {
                        $nomor_kegiatan = $row1['nomor_kegiatan'];
                        $nama_kegiatan = $row1['kegiatan'];
                        $nomor_indikator = $row1['nomor_indikator'];
                        $nomor_misi = $row1['nomor_misi'];
                        $nomor_tujuan = $row1['nomor_tujuan'];
                        $nomor_sasaran = $row1['nomor_sasaran'];
                        $nomor_program = $row1['nomor_program'];
                        $target_fisik_kegiatan = $row1['target_fisik_triwulan2'];
                        $target_keuangan_kegiatan = $row1['target_keuangan_triwulan2'];
                        $realisasi_fisik_kegiatan = $row1['realisasi_fisik_triwulan2'];
                        $realisasi_keuangan_kegiatan = $row1['realisasi_keuangan_triwulan2'];
                        $penomoran_kegiatan++;
                        ?>
                        <tr>
                            <td class="text-center" style="vertical-align:top;"><?php echo $penomoran_kegiatan; ?></td>
                            <td class="text-justify"><?php echo $nama_kegiatan; ?></td>
                            <td class="text-justify"><?php echo MyHelpers::fgetindikator($vardb,$nomor_indikator, $nomor_sasaran, $nomor_tujuan, $nomor_misi, $varopd); ?></td>
                            <td class="text-center"
                                style="vertical-align:top;"><?php echo number_format($target_fisik_kegiatan, 2, ',', '.') . "%"; ?></td>
                            <td class="text-right"
                                style="vertical-align:top;"><?php echo number_format($target_keuangan_kegiatan, 2, ',', '.'); ?></td>
                            <td class="text-center"
                                style="vertical-align:top;"><?php echo number_format($realisasi_fisik_kegiatan, 2, ',', '.') . "%"; ?></td>
                            <td class="text-right"
                                style="vertical-align:top;"><?php echo number_format($realisasi_keuangan_kegiatan, 2, ',', '.'); ?></td>
                            <?php
                            if ($target_keuangan_kegiatan != 0) {
                                $persentasekeuangan = $realisasi_keuangan_kegiatan * 100 / $target_keuangan_kegiatan;
                            } else {
                                $persentasekeuangan = 0;
                            }
                            $warna =  MyHelpers::nilaiByValue($persentasekeuangan,1,$vardb); //nilai($persentasekeuangan);
                            ?>
                            <td class="text-center" bgcolor="<?php echo $warna; ?>"
                                style="vertical-align:top;"><?php echo number_format($persentasekeuangan, 2, ',', '.') . "%"; ?></td>
                        </tr>
                        <?php
                        $penomoran_aktivitas = 0;
                        $sqlstr2 = "select * from taktivitas where id_instansi='$varopd' and nomor_kegiatan=$nomor_kegiatan ";
                        $sqlstr2 .= "and nomor_misi=$nomor_misi and nomor_tujuan=$nomor_tujuan ";
                        $sqlstr2 .= "and nomor_sasaran=$nomor_sasaran and nomor_indikator=$nomor_indikator";
                        $result2 = $connection->createCommand($sqlstr2)->queryAll();
                        foreach ($result2 as $row2 ) {
                            $nomor_aktivitas = $row2['nomor_aktivitas'];
                            $nama_aktivitas = $row2['aktivitas'];
                            $penomoran_aktivitas++;
                            $target_fisik_aktivitas = $row2['target_fisik_triwulan2'];
                            $target_keuangan_aktivitas = $row2['target_keuangan_triwulan2'];
                            $realisasi_fisik_aktivitas = $row2['realisasi_fisik_triwulan2'];
                            $realisasi_keuangan_aktivitas = $row2['realisasi_keuangan_triwulan2'];
                            ?>
                            <tr>
                                <td class="text-center"
                                    style="vertical-align:top;"><?php echo $penomoran_kegiatan . "." . $penomoran_aktivitas; ?></td>
                                <td class="text-justify"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $nama_aktivitas; ?></td>
                                <td class="text-justify"><?php echo MyHelpers::fgetindikator($vardb,$nomor_indikator, $nomor_sasaran, $nomor_tujuan, $nomor_misi, $varopd); ?></td>
                                <td class="text-center"
                                    style="vertical-align:top;"><?php echo number_format($target_fisik_aktivitas, 2, ',', '.') . "%"; ?></td>
                                <td class="text-right"
                                    style="vertical-align:top;"><?php echo number_format($target_keuangan_aktivitas, 2, ',', '.'); ?></td>
                                <td class="text-center"
                                    style="vertical-align:top;"><?php echo number_format($realisasi_fisik_aktivitas, 2, ',', '.') . "%"; ?></td>
                                <td class="text-right"
                                    style="vertical-align:top;"><?php echo number_format($realisasi_keuangan_aktivitas, 2, ',', '.'); ?></td>
                                <?php
                                if ($target_keuangan_aktivitas != 0) {
                                    $persentasekeuangan = $realisasi_keuangan_aktivitas * 100 / $target_keuangan_aktivitas;
                                } else {
                                    $persentasekeuangan = 0;
                                }
                                $warna =  MyHelpers::nilaiByValue($persentasekeuangan,1,$vardb); //nilai($persentasekeuangan);
                                ?>
                                <td class="text-center" bgcolor="<?php echo $warna; ?>"
                                    style="vertical-align:top;"><?php echo number_format($persentasekeuangan, 2, ',', '.') . "%"; ?></td>
                            </tr>
                            <?php
                        }

                    }
                    ?>
                    <?php


                    ?>

                    </tbody>
                </table>
                <BR><BR>
                <table>
                    <tr>
                        <?php MyHelpers::keteranganNilai(1,$vardb);?>
                    </tr>
                </table>
            </div>
            <div class="row" style="height:50px;"></div>
            <!-- END OF BODY -->

        </div>
        </body>
        <?php
    }
    if ($varlap == 15) {
        

        
        
        //Laporan ke 4
        ?>

        <body style="width:1600px;">
        <!-- BEGIN OF BODY -->
        <div class="container" style="font-family:times, serif;width:1600px;">
            
            <div class="row text-center" style="font-weight:bold;">
                <div class="col-sm-12 form-inline">
                    
                    LAPORAN PENGUKURAN KINERJA KEGIATAN/AKTIVITAS TAHUN <?php echo $vardb; ?> TRIWULAN
                    III<BR><?php echo strtoupper(MyHelpers::fgetonedata($vardb,"topd",$varopd)); ?><BR>
                    PEMERINTAH DAERAH PROVINSI JAWA BARAT<BR>
                </div>
            </div>
            <div class="row" style="height:30px;"></div>
            <div class="row" style="margin: 0 auto;">
                <table class="table table-bordered table-hover table-responsive table-condensed">
                    <thead style="background-color:#C5C5EC;font-weight:bold;">
                    <tr>
                        <th rowspan="3" class="text-center" style="vertical-align:middle;width:50px;">No.</th>
                        <th rowspan="3" class="text-center" style="vertical-align:middle;width:350px;">
                            Kegiatan/Aktivitas
                        </th>
                        <th rowspan="3" class="text-center" style="vertical-align:middle;width:350px;">Indikator
                            Kinerja
                        </th>
                        <th colspan="2" class="text-center">Target T3</th>
                        <th colspan="3" class="text-center">Realisasi T3</th>
                    </tr>
                    <tr>
                        <th rowspan="2" class="text-center" style="vertical-align:middle;width:80px;">Fisik (%)</th>
                        <th rowspan="2" class="text-center" style="vertical-align:middle;width:120px;">Keuangan (Rp)
                        </th>
                        <th rowspan="2" class="text-center" style="vertical-align:middle;width:80px;">Fisik (%)</th>
                        <th colspan="2" class="text-center">Keuangan T3</th>
                    </tr>
                    <tr>
                        <th class="text-center" style="width:120px;">(Rp)</th>
                        <th class="text-center" style="width:80px;">(%)</th>
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
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    //include_once 'inc/fgetindikator.php';
                    //include_once 'inc/penilaian.php';
                    $penomoran_kegiatan = 0;
                    $sqlstr1 = "select * from tkegiatan where id_instansi='$varopd'";
                    $result1 = $connection->createCommand($sqlstr1)->queryAll();
                    foreach ($result1 as $row1 ) {
                        $nomor_kegiatan = $row1['nomor_kegiatan'];
                        $nama_kegiatan = $row1['kegiatan'];
                        $nomor_indikator = $row1['nomor_indikator'];
                        $nomor_misi = $row1['nomor_misi'];
                        $nomor_tujuan = $row1['nomor_tujuan'];
                        $nomor_sasaran = $row1['nomor_sasaran'];
                        $nomor_program = $row1['nomor_program'];
                        $target_fisik_kegiatan = $row1['target_fisik_triwulan3'];
                        $target_keuangan_kegiatan = $row1['target_keuangan_triwulan3'];
                        $realisasi_fisik_kegiatan = $row1['realisasi_fisik_triwulan3'];
                        $realisasi_keuangan_kegiatan = $row1['realisasi_keuangan_triwulan3'];
                        $penomoran_kegiatan++;
                        ?>
                        <tr>
                            <td class="text-center" style="vertical-align:top;"><?php echo $penomoran_kegiatan; ?></td>
                            <td class="text-justify"><?php echo $nama_kegiatan; ?></td>
                            <td class="text-justify"><?php echo MyHelpers::fgetindikator($vardb,$nomor_indikator, $nomor_sasaran, $nomor_tujuan, $nomor_misi, $varopd); ?></td>
                            <td class="text-center"
                                style="vertical-align:top;"><?php echo number_format($target_fisik_kegiatan, 2, ',', '.') . "%"; ?></td>
                            <td class="text-right"
                                style="vertical-align:top;"><?php echo number_format($target_keuangan_kegiatan, 2, ',', '.'); ?></td>
                            <td class="text-center"
                                style="vertical-align:top;"><?php echo number_format($realisasi_fisik_kegiatan, 2, ',', '.') . "%"; ?></td>
                            <td class="text-right"
                                style="vertical-align:top;"><?php echo number_format($realisasi_keuangan_kegiatan, 2, ',', '.'); ?></td>
                            <?php
                            if ($target_keuangan_kegiatan != 0) {
                                $persentasekeuangan = $realisasi_keuangan_kegiatan * 100 / $target_keuangan_kegiatan;
                            } else {
                                $persentasekeuangan = 0;
                            }
                            $warna =  MyHelpers::nilaiByValue($persentasekeuangan,1,$vardb); //nilai($persentasekeuangan);
                            ?>
                            <td class="text-center" bgcolor="<?php echo $warna; ?>"
                                style="vertical-align:top;"><?php echo number_format($persentasekeuangan, 2, ',', '.') . "%"; ?></td>
                        </tr>
                        <?php
                        $penomoran_aktivitas = 0;
                        $sqlstr2 = "select * from taktivitas where id_instansi='$varopd' and nomor_kegiatan=$nomor_kegiatan ";
                        $sqlstr2 .= "and nomor_misi=$nomor_misi and nomor_tujuan=$nomor_tujuan ";
                        $sqlstr2 .= "and nomor_sasaran=$nomor_sasaran and nomor_indikator=$nomor_indikator";
                        $result2 =  $connection->createCommand($sqlstr2)->queryAll();
                        foreach ($result2 as $row2 ) {
                            $nomor_aktivitas = $row2['nomor_aktivitas'];
                            $nama_aktivitas = $row2['aktivitas'];
                            $penomoran_aktivitas++;
                            $target_fisik_aktivitas = $row2['target_fisik_triwulan3'];
                            $target_keuangan_aktivitas = $row2['target_keuangan_triwulan3'];
                            $realisasi_fisik_aktivitas = $row2['realisasi_fisik_triwulan3'];
                            $realisasi_keuangan_aktivitas = $row2['realisasi_keuangan_triwulan3'];
                            ?>
                            <tr>
                                <td class="text-center"
                                    style="vertical-align:top;"><?php echo $penomoran_kegiatan . "." . $penomoran_aktivitas; ?></td>
                                <td class="text-justify"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $nama_aktivitas; ?></td>
                                <td class="text-justify"><?php echo MyHelpers::fgetindikator($vardb,$nomor_indikator, $nomor_sasaran, $nomor_tujuan, $nomor_misi, $varopd); ?></td>
                                <td class="text-center"
                                    style="vertical-align:top;"><?php echo number_format($target_fisik_aktivitas, 2, ',', '.') . "%"; ?></td>
                                <td class="text-right"
                                    style="vertical-align:top;"><?php echo number_format($target_keuangan_aktivitas, 2, ',', '.'); ?></td>
                                <td class="text-center"
                                    style="vertical-align:top;"><?php echo number_format($realisasi_fisik_aktivitas, 2, ',', '.') . "%"; ?></td>
                                <td class="text-right"
                                    style="vertical-align:top;"><?php echo number_format($realisasi_keuangan_aktivitas, 2, ',', '.'); ?></td>
                                <?php
                                if ($target_keuangan_aktivitas != 0) {
                                    $persentasekeuangan = $realisasi_keuangan_aktivitas * 100 / $target_keuangan_aktivitas;
                                } else {
                                    $persentasekeuangan = 0;
                                }
                                $warna =  MyHelpers::nilaiByValue($persentasekeuangan,1,$vardb); //nilai($persentasekeuangan);
                                ?>
                                <td class="text-center" bgcolor="<?php echo $warna; ?>"
                                    style="vertical-align:top;"><?php echo number_format($persentasekeuangan, 2, ',', '.') . "%"; ?></td>
                            </tr>
                            <?php
                        }

                    }
                    ?>
                    <?php


                    ?>

                    </tbody>
                </table>
                <BR><BR>
                <table>
                    <tr>
                        <?php MyHelpers::keteranganNilai(1,$vardb);?>
                    </tr>
                </table>
            </div>
            <div class="row" style="height:50px;"></div>
            <!-- END OF BODY -->

        </div>
        </body>
        <?php
    }
    if ($varlap == 16) {

        //Laporan ke 4
        ?>

        <body style="width:1600px;">
        <!-- BEGIN OF BODY -->
        <div class="container" style="font-family:times, serif;width:1600px;">
            
            <div class="row text-center" style="font-weight:bold;">
                <div class="col-sm-12 form-inline">
                    
                    LAPORAN PENGUKURAN KINERJA KEGIATAN/AKTIVITAS TAHUN <?php echo $vardb; ?> TRIWULAN
                    IV<BR><?php echo strtoupper(MyHelpers::fgetonedata($vardb,"topd",$varopd)); ?><BR>
                    PEMERINTAH DAERAH PROVINSI JAWA BARAT<BR>
                </div>
            </div>
            <div class="row" style="height:30px;"></div>
            <div class="row" style="margin: 0 auto;">
                <table class="table table-bordered table-hover table-responsive table-condensed">
                    <thead style="background-color:#C5C5EC;font-weight:bold;">
                    <tr>
                        <th rowspan="3" class="text-center" style="vertical-align:middle;width:50px;">No.</th>
                        <th rowspan="3" class="text-center" style="vertical-align:middle;width:350px;">
                            Kegiatan/Aktivitas
                        </th>
                        <th rowspan="3" class="text-center" style="vertical-align:middle;width:350px;">Indikator
                            Kinerja
                        </th>
                        <th colspan="2" class="text-center">Target T4</th>
                        <th colspan="3" class="text-center">Realisasi T4</th>
                    </tr>
                    <tr>
                        <th rowspan="2" class="text-center" style="vertical-align:middle;width:80px;">Fisik (%)</th>
                        <th rowspan="2" class="text-center" style="vertical-align:middle;width:120px;">Keuangan (Rp)
                        </th>
                        <th rowspan="2" class="text-center" style="vertical-align:middle;width:80px;">Fisik (%)</th>
                        <th colspan="2" class="text-center">Keuangan T4</th>
                    </tr>
                    <tr>
                        <th class="text-center" style="width:120px;">(Rp)</th>
                        <th class="text-center" style="width:80px;">(%)</th>
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
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    //include_once 'inc/fgetindikator.php';
                    //include_once 'inc/penilaian.php';
                    $penomoran_kegiatan = 0;
                    $sqlstr1 = "select * from tkegiatan where id_instansi='$varopd'";
                    $result1 = $connection->createCommand($sqlstr1)->queryAll();
                    foreach ($result1 as $row1 ) {
                        $nomor_kegiatan = $row1['nomor_kegiatan'];
                        $nama_kegiatan = $row1['kegiatan'];
                        $nomor_indikator = $row1['nomor_indikator'];
                        $nomor_misi = $row1['nomor_misi'];
                        $nomor_tujuan = $row1['nomor_tujuan'];
                        $nomor_sasaran = $row1['nomor_sasaran'];
                        $nomor_program = $row1['nomor_program'];
                        $target_fisik_kegiatan = $row1['target_fisik_triwulan4'];
                        $target_keuangan_kegiatan = $row1['target_keuangan_triwulan4'];
                        $realisasi_fisik_kegiatan = $row1['realisasi_fisik_triwulan4'];
                        $realisasi_keuangan_kegiatan = $row1['realisasi_keuangan_triwulan4'];
                        $penomoran_kegiatan++;
                        ?>
                        <tr>
                            <td class="text-center" style="vertical-align:top;"><?php echo $penomoran_kegiatan; ?></td>
                            <td class="text-justify"><?php echo $nama_kegiatan; ?></td>
                            <td class="text-justify"><?php echo MyHelpers::fgetindikator($vardb,$nomor_indikator, $nomor_sasaran, $nomor_tujuan, $nomor_misi, $varopd); ?></td>
                            <td class="text-center"
                                style="vertical-align:top;"><?php echo number_format($target_fisik_kegiatan, 2, ',', '.') . "%"; ?></td>
                            <td class="text-right"
                                style="vertical-align:top;"><?php echo number_format($target_keuangan_kegiatan, 2, ',', '.'); ?></td>
                            <td class="text-center"
                                style="vertical-align:top;"><?php echo number_format($realisasi_fisik_kegiatan, 2, ',', '.') . "%"; ?></td>
                            <td class="text-right"
                                style="vertical-align:top;"><?php echo number_format($realisasi_keuangan_kegiatan, 2, ',', '.'); ?></td>
                            <?php
                            if ($target_keuangan_kegiatan != 0) {
                                $persentasekeuangan = $realisasi_keuangan_kegiatan * 100 / $target_keuangan_kegiatan;
                            } else {
                                $persentasekeuangan = 0;
                            }
                            $warna =  MyHelpers::nilaiByValue($persentasekeuangan,1,$vardb); //nilai($persentasekeuangan);
                            ?>
                            <td class="text-center" bgcolor="<?php echo $warna; ?>"
                                style="vertical-align:top;"><?php echo number_format($persentasekeuangan, 2, ',', '.') . "%"; ?></td>
                        </tr>
                        <?php
                        $penomoran_aktivitas = 0;
                        $sqlstr2 = "select * from taktivitas where id_instansi='$varopd' and nomor_kegiatan=$nomor_kegiatan ";
                        $sqlstr2 .= "and nomor_misi=$nomor_misi and nomor_tujuan=$nomor_tujuan ";
                        $sqlstr2 .= "and nomor_sasaran=$nomor_sasaran and nomor_indikator=$nomor_indikator";
                        $result2 =  $connection->createCommand($sqlstr2)->queryAll();
                        foreach ($result2 as $row2 ) {
                            $nomor_aktivitas = $row2['nomor_aktivitas'];
                            $nama_aktivitas = $row2['aktivitas'];
                            $penomoran_aktivitas++;
                            $target_fisik_aktivitas = $row2['target_fisik_triwulan4'];
                            $target_keuangan_aktivitas = $row2['target_keuangan_triwulan4'];
                            $realisasi_fisik_aktivitas = $row2['realisasi_fisik_triwulan4'];
                            $realisasi_keuangan_aktivitas = $row2['realisasi_keuangan_triwulan4'];
                            ?>
                            <tr>
                                <td class="text-center"
                                    style="vertical-align:top;"><?php echo $penomoran_kegiatan . "." . $penomoran_aktivitas; ?></td>
                                <td class="text-justify"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $nama_aktivitas; ?></td>
                                <td class="text-justify"><?php echo MyHelpers::fgetindikator($vardb,$nomor_indikator, $nomor_sasaran, $nomor_tujuan, $nomor_misi, $varopd); ?></td>
                                <td class="text-center"
                                    style="vertical-align:top;"><?php echo number_format($target_fisik_aktivitas, 2, ',', '.') . "%"; ?></td>
                                <td class="text-right"
                                    style="vertical-align:top;"><?php echo number_format($target_keuangan_aktivitas, 2, ',', '.'); ?></td>
                                <td class="text-center"
                                    style="vertical-align:top;"><?php echo number_format($realisasi_fisik_aktivitas, 2, ',', '.') . "%"; ?></td>
                                <td class="text-right"
                                    style="vertical-align:top;"><?php echo number_format($realisasi_keuangan_aktivitas, 2, ',', '.'); ?></td>
                                <?php
                                if ($target_keuangan_aktivitas != 0) {
                                    $persentasekeuangan = $realisasi_keuangan_aktivitas * 100 / $target_keuangan_aktivitas;
                                } else {
                                    $persentasekeuangan = 0;
                                }
                                $warna =  MyHelpers::nilaiByValue($persentasekeuangan,1,$vardb); //nilai($persentasekeuangan);
                                ?>
                                <td class="text-center" bgcolor="<?php echo $warna; ?>"
                                    style="vertical-align:top;"><?php echo number_format($persentasekeuangan, 2, ',', '.') . "%"; ?></td>
                            </tr>
                            <?php
                        }

                    }
                    ?>
                    <?php


                    ?>

                    </tbody>
                </table>
                <BR><BR>
                <table>
                    <tr>
                        <?php MyHelpers::keteranganNilai(1,$vardb);?>
                    </tr>
                </table>
            </div>
            <div class="row" style="height:50px;"></div>
            <!-- END OF BODY -->
        </div>
        </body>
        <?php
    }
    if ($varlap == 17) {
        
        //Laporan ke 5
        ?>

        <body style="width:1600px;">
        <!-- BEGIN OF BODY -->
        <div class="container" style="font-family:times, serif;width:1600px;">
            
            <div class="row text-center" style="font-weight:bold;">
                <div class="col-sm-12 form-inline">
                    
                    Laporan Pengukuran Kinerja Indikator/Program/Kegiatan/Aktivitas Tahun <?php echo $vardb; ?>
                    <BR><?php echo strtoupper(MyHelpers::fgetonedata($vardb,"topd",$varopd)); ?><BR>
                    PEMERINTAH DAERAH PROVINSI JAWA BARAT<BR>
                </div>
            </div>
            <div class="row" style="height:30px;"></div>
            <div class="row" style="margin: 0 auto;">
                <table class="table table-bordered table-hover table-responsive table-condensed">
                    <thead style="background-color:#C5C5EC;font-weight:bold;">
                    <tr>
                        <th rowspan="2" class="text-center" style="vertical-align:middle;width:80px;">No.</th>
                        <th rowspan="2" class="text-center" style="vertical-align:middle;width:500px;">Sasaran</th>
                        <th rowspan="2" class="text-center" style="vertical-align:middle;width:500px;">Indikator
                            Kinerja
                        </th>
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
                    //include_once 'inc/fgetindikator.php';
                    //include_once 'inc/fgetsasaran.php';
                    //include_once 'inc/fgetkegiatan.php';
                    //include_once 'inc/fgetprogram.php';
                    //include_once 'inc/penilaian.php';
                    $penomoran_aktivitas = 0;
                    $sqlstr1 = "select * from taktivitas where id_instansi='$varopd'";
                    $result1 = $connection->createCommand($sqlstr1)->queryAll();
                    foreach ($result1 as $row1 ) {
                        $nomor_aktivitas = $row1['nomor_aktivitas'];
                        $nama_aktivitas = $row1['aktivitas'];
                        $nomor_kegiatan = $row1['nomor_kegiatan'];
                        $nomor_indikator = $row1['nomor_indikator'];
                        $nomor_misi = $row1['nomor_misi'];
                        $nomor_tujuan = $row1['nomor_tujuan'];
                        $nomor_sasaran = $row1['nomor_sasaran'];
                        $nomor_program = $row1['nomor_program'];
                        $target_keuangan_aktivitas = $row1['target_keuangan'];
                        if ($target_keuangan_aktivitas != 0) {
                            $realisasi_keu_tri1 = $row1['realisasi_keuangan_triwulan1'] * 100 / $row1['target_keuangan'];
                            $realisasi_keu_tri2 = $row1['realisasi_keuangan_triwulan2'] * 100 / $row1['target_keuangan'];
                            $realisasi_keu_tri3 = $row1['realisasi_keuangan_triwulan3'] * 100 / $row1['target_keuangan'];
                            $realisasi_keu_tri4 = $row1['realisasi_keuangan_triwulan4'] * 100 / $row1['target_keuangan'];
                        } else {
                            $realisasi_keu_tri1 = 0;
                            $realisasi_keu_tri2 = 0;
                            $realisasi_keu_tri3 = 0;
                            $realisasi_keu_tri4 = 0;
                        }
                        $penomoran_aktivitas++;
                        $nama_kegiatan = MyHelpers::fgetkegiatan($vardb,$nomor_kegiatan, $nomor_program, $nomor_indikator, $nomor_sasaran, $nomor_tujuan, $nomor_misi, $varopd);
                        $nama_program = MyHelpers::fgetprogram($vardb,$nomor_program, $nomor_indikator, $nomor_sasaran, $nomor_tujuan, $nomor_misi, $varopd);
                        $nama_indikator = MyHelpers::fgetindikator($vardb,$nomor_indikator, $nomor_sasaran, $nomor_tujuan, $nomor_misi, $varopd);
                        $sqlstr2 = "select * from tindikator where id_instansi='$varopd' ";
                        $sqlstr2 .= "and nomor_indikator=$nomor_indikator and nomor_sasaran=$nomor_sasaran ";
                        $sqlstr2 .= "and nomor_tujuan=$nomor_tujuan and nomor_misi=$nomor_misi ";
                        $row2 =  $connection->createCommand($sqlstr2)->queryRow();
                        $target_indikator = $row2['target'];
                        if ($target_indikator != 0) {
                            $realisasi_tri1 = $row2['realisasi_triwulan1'] * 100 / $target_indikator;
                            $realisasi_tri2 = $row2['realisasi_triwulan2'] * 100 / $target_indikator;
                            $realisasi_tri3 = $row2['realisasi_triwulan3'] * 100 / $target_indikator;
                            $realisasi_tri4 = $row2['realisasi_triwulan4'] * 100 / $target_indikator;
                        } else {
                            $realisasi_tri1 = 0;
                            $realisasi_tri2 = 0;
                            $realisasi_tri3 = 0;
                            $realisasi_tri4 = 0;
                        }
                        $nama_sasaran = MyHelpers::fgetsasaran($vardb,$nomor_sasaran, $nomor_tujuan, $nomor_misi, $varopd);


                        ?>
                        <tr>
                            <td class="text-center" style="vertical-align:top;"></td>
                            <td class="text-justify"><?php echo $nama_sasaran; ?></td>
                            <td class="text-justify"><?php echo $nama_indikator; ?></td>
                            <td class="text-center"
                                style="vertical-align:top;"><?php echo number_format($realisasi_tri1, 2, ',', '.'); ?></td>
                            <td class="text-center"
                                style="vertical-align:top;"><?php echo number_format($realisasi_tri2, 2, ',', '.'); ?></td>
                            <td class="text-center"
                                style="vertical-align:top;"><?php echo number_format($realisasi_tri3, 2, ',', '.'); ?></td>
                            <td class="text-center"
                                style="vertical-align:top;"><?php echo number_format($realisasi_tri4, 2, ',', '.'); ?></td>
                            <td class="text-justify"><?php echo $nama_program; ?></td>
                            <td class="text-justify"><?php echo $nama_kegiatan; ?></td>
                            <td class="text-justify"><?php echo $nama_aktivitas; ?></td>
                            <td class="text-center"
                                style="vertical-align:top;"><?php echo number_format($realisasi_keu_tri1, 2, ',', '.'); ?></td>
                            <td class="text-center"
                                style="vertical-align:top;"><?php echo number_format($realisasi_keu_tri2, 2, ',', '.'); ?></td>
                            <td class="text-center"
                                style="vertical-align:top;"><?php echo number_format($realisasi_keu_tri3, 2, ',', '.'); ?></td>
                            <td class="text-center"
                                style="vertical-align:top;"><?php echo number_format($realisasi_keu_tri4, 2, ',', '.'); ?></td>
                        </tr>
                        <?php

                    }
                    ?>
                    </tbody>
                </table>
                <BR><BR>
                <table>
                    <tr>
                        <?php MyHelpers::keteranganNilai(1,$vardb);?>
                    </tr>
                </table>
            </div>
            <div class="row" style="height:50px;"></div>
            <!-- END OF BODY -->
            
        </div>
        </body>
        <?php
    }
    if ($varlap == 18) {
        

        
        
        //Laporan ke 6
        ?>

        <body style="width:2200px;">
        <!-- BEGIN OF BODY -->
        <div class="container" style="font-family:times, serif;width:2200px;">
            
            <div class="row text-center" style="font-weight:bold;">
                <div class="col-sm-12 form-inline">
                    
                    LAPORAN RENCANA AKSI TAHUN <?php echo $vardb; ?><BR><?php echo strtoupper(MyHelpers::fgetonedata($vardb,"topd",$varopd)); ?><BR>
                    PEMERINTAH DAERAH PROVINSI JAWA BARAT<BR>
                </div>
            </div>
            <div class="row" style="height:30px;"></div>
            <div class="row" style="margin: 0 auto;">
                <table class="table table-bordered table-hover table-responsive table-condensed">
                    <thead style="background-color:#C5C5EC;font-weight:bold;">
                    <tr>
                        <th rowspan="2" class="text-center" style="vertical-align:middle;width:80px;">No.</th>
                        <th rowspan="2" class="text-center" style="vertical-align:middle;width:500px;">Sasaran</th>
                        <th rowspan="2" class="text-center" style="vertical-align:middle;width:500px;">Indikator
                            Kinerja
                        </th>
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
                    //include_once 'inc/fgetindikator.php';
                    //include_once 'inc/fgetsasaran.php';
                    //include_once 'inc/fgetkegiatan.php';
                    //include_once 'inc/fgetprogram.php';
                    //include_once 'inc/penilaian.php';
                    $penomoran_aktivitas = 0;
                    $sqlstr1 = "select * from taktivitas where id_instansi='$varopd'";
                    $result1 = $connection->createCommand($sqlstr1)->queryAll();
                    foreach ($result1 as $row1 ) {
                        $nomor_aktivitas = $row1['nomor_aktivitas'];
                        $nama_aktivitas = $row1['aktivitas'];
                        $nomor_kegiatan = $row1['nomor_kegiatan'];
                        $nomor_indikator = $row1['nomor_indikator'];
                        $nomor_misi = $row1['nomor_misi'];
                        $nomor_tujuan = $row1['nomor_tujuan'];
                        $nomor_sasaran = $row1['nomor_sasaran'];
                        $nomor_program = $row1['nomor_program'];

                        $target_keu_tri1 = $row1['target_keuangan_triwulan1'];
                        $target_keu_tri2 = $row1['target_keuangan_triwulan2'];
                        $target_keu_tri3 = $row1['target_keuangan_triwulan3'];
                        $target_keu_tri4 = $row1['target_keuangan_triwulan4'];

                        $penomoran_aktivitas++;
                        $nama_kegiatan = MyHelpers::fgetkegiatan($vardb,$nomor_kegiatan, $nomor_program, $nomor_indikator, $nomor_sasaran, $nomor_tujuan, $nomor_misi, $varopd);
                        $nama_program = MyHelpers::fgetprogram($vardb,$nomor_program, $nomor_indikator, $nomor_sasaran, $nomor_tujuan, $nomor_misi, $varopd);
                        $nama_indikator = MyHelpers::fgetindikator($vardb,$nomor_indikator, $nomor_sasaran, $nomor_tujuan, $nomor_misi, $varopd);
                        $sqlstr2 = "select * from tindikator where id_instansi='$varopd' ";
                        $sqlstr2 .= "and nomor_indikator=$nomor_indikator and nomor_sasaran=$nomor_sasaran ";
                        $sqlstr2 .= "and nomor_tujuan=$nomor_tujuan and nomor_misi=$nomor_misi ";
                        $row2 = $connection->createCommand($sqlstr2)->queryRow();
                        $target_tri1 = $row2['target_triwulan1'];
                        $target_tri2 = $row2['target_triwulan2'];
                        $target_tri3 = $row2['target_triwulan3'];
                        $target_tri4 = $row2['target_triwulan4'];

                        $nama_sasaran = MyHelpers::fgetsasaran($vardb,$nomor_sasaran, $nomor_tujuan, $nomor_misi, $varopd);


                        ?>
                        <tr>
                            <td class="text-center" style="vertical-align:top;"></td>
                            <td class="text-justify"><?php echo $nama_sasaran; ?></td>
                            <td class="text-justify"><?php echo $nama_indikator; ?></td>
                            <td class="text-center"
                                style="vertical-align:top;"><?php echo number_format($target_tri1, 2, ',', '.'); ?></td>
                            <td class="text-center"
                                style="vertical-align:top;"><?php echo number_format($target_tri2, 2, ',', '.'); ?></td>
                            <td class="text-center"
                                style="vertical-align:top;"><?php echo number_format($target_tri3, 2, ',', '.'); ?></td>
                            <td class="text-center"
                                style="vertical-align:top;"><?php echo number_format($target_tri4, 2, ',', '.'); ?></td>
                            <td class="text-justify"><?php echo $nama_program; ?></td>
                            <td class="text-justify"><?php echo $nama_kegiatan; ?></td>
                            <td class="text-justify"><?php echo $nama_aktivitas; ?></td>
                            <td class="text-right"
                                style="vertical-align:top;"><?php echo number_format($target_keu_tri1, 2, ',', '.'); ?></td>
                            <td class="text-right"
                                style="vertical-align:top;"><?php echo number_format($target_keu_tri2, 2, ',', '.'); ?></td>
                            <td class="text-right"
                                style="vertical-align:top;"><?php echo number_format($target_keu_tri3, 2, ',', '.'); ?></td>
                            <td class="text-right"
                                style="vertical-align:top;"><?php echo number_format($target_keu_tri4, 2, ',', '.'); ?></td>
                        </tr>
                        <?php

                    }
                    ?>
                    </tbody>
                </table>
                <BR><BR>
                <table>
                    <tr>
                        <?php MyHelpers::keteranganNilai(1,$vardb);?>
                    </tr>
                </table>
            </div>
            <div class="row" style="height:50px;"></div>
            <!-- END OF BODY -->
            
        </div>
        </body>

        <?php
    }
    if ($varlap == 19) {
        

        
        
        //Laporan ke 6
        ?>

        <body style="width:100%;">
        <!-- BEGIN OF BODY -->
        <div class="container" style="font-family:times, serif;width:100%;">
            
            <div class="row text-center" style="font-weight:bold;">
                <div class="col-sm-12 form-inline">
                    
                    LAPORAN RENCANA STRATEGIS TAHUN <?php echo $vardb; ?><BR><?php echo strtoupper(MyHelpers::fgetonedata($vardb,"topd", $varopd)); ?><BR>
                    PEMERINTAH DAERAH PROVINSI JAWA BARAT<BR>
                </div>
            </div>
            <div class="row" style="height:30px;"></div>
            <div class="row" style="margin: 0 auto;">
                <table class="table table-bordered table-hover table-responsive table-condensed">
                    <thead style="background-color:#C5C5EC;font-weight:bold;">
                    <tr>
                        <th class="text-center" style="vertical-align:middle;width:10%;">No.</th>
                        <th class="text-center" style="vertical-align:middle;width:70%;">Keterangan</th>
                        <th class="text-center" style="vertical-align:middle;width:20%;">Dokumen</th>
                    </tr>
                    <tr>
                        <th class="text-center">1</th>
                        <th class="text-center">2</th>
                        <th class="text-center">3</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $nomor= 1;
                    $sqlstr1 = "select * from tdatarenstra where id_instansi='$varopd'";
                    $result1 = $connection->createCommand($sqlstr1)->queryAll();
                    foreach ($result1 as $row1 ) {
                        $ketdata = $row1['keterangan_renstra'];
                        $file = $row1['data_file_renstra'];
                        ?>
                        <tr>
                            <td class="text-center" style="vertical-align:top;"><?php echo $nomor; ?></td>
                            <td class="text-justify"><?php echo $ketdata; ?></td>
                            <td class="text-justify"><a href="<?php echo "datarenstra/".$file;?>" target="_blank">Download</a></td>
                        </tr>
                        <?php
                        $nomor++;
                    }
                    ?>
                    </tbody>
                </table>

            </div>
            <div class="row" style="height:50px;"></div>
            <!-- END OF BODY -->
            
        </div>
        </body>

        <?php
    }
    if ($varlap == 20) {
        

        
        
        //Laporan ke 6
        ?>

        <body style="width:100%;">
        <!-- BEGIN OF BODY -->
        <div class="container" style="font-family:times, serif;width:100%;">
            
            <div class="row text-center" style="font-weight:bold;">
                <div class="col-sm-12 form-inline">
                    
                    LAPORAN RENCANA KERJA TAHUN <?php echo $vardb; ?><BR><?php echo strtoupper(fgetonedata("topd", $varopd)); ?><BR>
                    PEMERINTAH DAERAH PROVINSI JAWA BARAT<BR>
                </div>
            </div>
            <div class="row" style="height:30px;"></div>
            <div class="row" style="margin: 0 auto;">
                <table class="table table-bordered table-hover table-responsive table-condensed">
                    <thead style="background-color:#C5C5EC;font-weight:bold;">
                    <tr>
                        <th class="text-center" style="vertical-align:middle;width:10%;">No.</th>
                        <th class="text-center" style="vertical-align:middle;width:70%;">Keterangan</th>
                        <th class="text-center" style="vertical-align:middle;width:20%;">Dokumen</th>
                    </tr>
                    <tr>
                        <th class="text-center">1</th>
                        <th class="text-center">2</th>
                        <th class="text-center">3</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $nomor= 1;
                    $sqlstr1 = "select * from tdatarenja where id_instansi='$varopd'";
                    $result1 = $connection->createCommand($sqlstr1)->queryAll();
                    foreach ($result1 as $row1 ) {
                        $ketdata = $row1['keterangan_renja'];
                        $file = $row1['data_file_renja'];
                        ?>
                        <tr>
                            <td class="text-center" style="vertical-align:top;"><?php echo $nomor; ?></td>
                            <td class="text-justify"><?php echo $ketdata; ?></td>
                            <td class="text-justify"><a href="<?php echo "datarenja/".$file;?>" target="_blank">Download</a></td>
                        </tr>
                        <?php
                        $nomor++;
                    }
                    ?>
                    </tbody>
                </table>

            </div>
            <div class="row" style="height:50px;"></div>
            <!-- END OF BODY -->
            
        </div>
        </body>

        <?php
    }
    if ($varlap == 21) {
        

        
        
        //Laporan ke 6
        ?>

        <body style="width:100%;">
        <!-- BEGIN OF BODY -->
        <div class="container" style="font-family:times, serif;width:100%;">
            
            <div class="row text-center" style="font-weight:bold;">
                <div class="col-sm-12 form-inline">
                    
                    LKIP Tahun <?php echo $vardb; ?><BR><?php echo strtoupper(fgetonedata("topd", $varopd)); ?><BR>
                    PEMERINTAH DAERAH PROVINSI JAWA BARAT<BR>
                </div>
            </div>
            <div class="row" style="height:30px;"></div>
            <div class="row" style="margin: 0 auto;">
                <table class="table table-bordered table-hover table-responsive table-condensed">
                    <thead style="background-color:#C5C5EC;font-weight:bold;">
                    <tr>
                        <th class="text-center" style="vertical-align:middle;width:10%;">No.</th>
                        <th class="text-center" style="vertical-align:middle;width:70%;">Keterangan</th>
                        <th class="text-center" style="vertical-align:middle;width:20%;">Dokumen</th>
                    </tr>
                    <tr>
                        <th class="text-center">1</th>
                        <th class="text-center">2</th>
                        <th class="text-center">3</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $nomor= 1;
                    $sqlstr1 = "select * from tdatalakip where id_instansi='$varopd'";
                    $result1 = $connection->createCommand($sqlstr1)->queryAll();
                    foreach ($result1 as $row1 ) {
                        $ketdata = $row1['keterangan_lakip'];
                        $file = $row1['data_file_lakip'];
                        ?>
                        <tr>
                            <td class="text-center" style="vertical-align:top;"><?php echo $nomor; ?></td>
                            <td class="text-justify"><?php echo $ketdata; ?></td>
                            <td class="text-justify"><a href="<?php echo "datalakip/".$file;?>" target="_blank">Download</a></td>
                        </tr>
                        <?php
                        $nomor++;
                    }
                    ?>
                    </tbody>
                </table>

            </div>
            <div class="row" style="height:50px;"></div>
            <!-- END OF BODY -->
            
        </div>
        </body>

        <?php
    }
        $connection->active=false;

        /**
         * File Name: laporan.php
         */
?>
</html>
