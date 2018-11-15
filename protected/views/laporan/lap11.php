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
            LAPORAN PENGUKURAN KINERJA TAHUN <?php echo Yii::app()->user->getTahun(); ?> TRIWULAN <?php echo $triwulan?><BR>
            <?php echo strtoupper(Yii::app()->user->getNamaOpd()); ?><BR>
            PEMERINTAH DAERAH PROVINSI JAWA BARAT<BR>
        </div>
    </div>
    <div class="row" style="margin: 0 auto;">
        <div class="row" style="margin: 0 auto;">
            <table class="table table-bordered table-hover table-responsive table-condensed">
                <thead style="background-color:#C5C5EC;font-weight:bold;">
                <tr >
                    <th class="text-center" rowspan="2" style="width:50px;">No.</th>
                    <th class="text-center" rowspan="2" style="width:350px;">Sasaran</th>
                    <th class="text-center" rowspan="2">Indikator</th>
                    <th class="text-center" rowspan="2" style="width:80px;">Capaian Thn Lalu</th>
                    <th class="text-center" colspan="3">Target</th>
                    <th class="text-center" rowspan="2" style="width:80px;">Target Akhir Renstra</th>
                    <th class="text-center" rowspan="2" style="width:120px;">Capaian Thn <?php echo Yii::app()->user->getTahun(); ?> terhadap Target Akhir
                        Renstra
                    </th>
                </tr>
                <tr>
                    <th class="text-center" style="width:80px;">Target</th>
                    <th class="text-center" style="width:80px;">Realisasi TW <?php echo $triwulan?></th>
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
                $thn = Yii::app()->user->getTahun();
                $sk4 = Yii::app()->user->getOpd();
                $counting = 0;
                $tprogram = 0;
                $tprogram1 = 0;


                $criteria = new CDbCriteria();
                $criteria->addCondition("id_instansi=:idx");
                $criteria->params = array(':idx' => $sk4);
                $mdlIndikator = Indikator::model()->findAll($criteria);
                $jumlahindikator = count($mdlIndikator);
                ?>
                <tbody>
                <?php
                $nomor_urut = 0;
                $tipe_formula=1;

                foreach ($mdlIndikator as $row) {
                    $nomor_indikator = $row->nomor_indikator;
                    $nomor_sasaran = $row->nomor_sasaran;
                    $nomor_tujuan = $row->nomor_tujuan;
                    $nomor_misi = $row->nomor_misi;
                    $nama_indikator = $row->indikator;
                    $tipe_formula = $row->tipe_formula;
                    $capaianlalu = $row->realisasi_tahun_sebelumnya;
                    $target = $row->target;
                    $realisasi = $row['realisasi_triwulan'.$triwulan];
                    $targetrenstra = $row->target_akhir_renstra;

                    $nomor_urut++;

                    $criteria2 = new CDbCriteria();
                    $criteria2->addCondition("id_instansi=:idx and nomor_sasaran=:nomor_sasaran");
                    $criteria2->params = array(':idx' => $sk4,':nomor_sasaran'=>$nomor_sasaran);
                    $rowc = Sasaran::model()->find($criteria2);

                    $nama_sasaran = $rowc['sasaran'];
                    ?>
                    <tr >
                        <td valign="top" align="center"><?= $nomor_urut; ?></td>
                        <td valign="top" align="justify"><?= $nama_sasaran; ?></td>
                        <td valign="top" align="justify"><?= $nama_indikator; ?></td>
                        <td valign="top" align="center"><?php echo number_format($capaianlalu, 2, ',', '.'); ?></td>
                        <td valign="top" align="center"><?php echo number_format($target, 2, ',', '.'); ?></td>
                        <td valign="top" align="center"><?php echo number_format($realisasi, 2, ',', '.'); ?></td>
                        <?php
                        if ($target != 0) {
                            $preal = $realisasi * 100 / $target;
                            $warna = MyHelpers::nilaidb($preal, $tipe_formula,$thn);
                        } else {
                            $preal = 0;
                            $warna = MyHelpers::nilaidb($preal, $tipe_formula,$thn);
                        }
                        $tprogram = $tprogram + $preal;
                        ?>
                        <td valign="top" align="center" bgcolor="<?= $warna; ?>"><?= number_format($preal, 2, ',', '.'); ?></td>
                        <td valign="top" align="center"><?= number_format($targetrenstra, 2, ',', '.'); ?></td>
                        <?php
                        if ($targetrenstra != 0) {
                            $preal = $realisasi * 100 / $targetrenstra;
                            $warna = MyHelpers::nilaidb($preal, $tipe_formula,$thn);
                        } else {
                            $preal = 0;
                            $warna = MyHelpers::nilaidb($preal, $tipe_formula,$thn);
                        }
                        $tprogram1 = $tprogram1 + $preal;
                        ?>
                        <td valign="top" align="center" bgcolor="<?= $warna; ?>"><?= number_format($preal, 2, ',', '.'); ?></td>
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

                    $warna =  MyHelpers::nilaidb($tprogram, $tipe_formula,$thn); ?>
                    <td align="center" bgcolor="<?= $warna; ?>"><?= number_format($tprogram, 2, ',', '.') . "%"; ?></td>
                    <td></td>
                    <?php
                    if ($jumlahindikator != 0) {
                        $tprogram1 = $tprogram1 / $jumlahindikator;
                    } else {
                        $tprogram1 = 0;
                    }


                    $warna = MyHelpers::nilaidb($tprogram1, $tipe_formula,$thn); ?>
                    <td align="center" bgcolor="<?= $warna; ?>"><?= number_format($tprogram1, 2, ',', '.'); ?></td>
                </tr>
                </tbody>
            </table>
            <table>
                <tr>
                    <?php MyHelpers::keterangan_nilai($tipe_formula,$thn) ?>
                </tr>
            </table>
        </div>

    </div>
    </body>
    </html>
<?php
/**
 * File Name: laporan.php
 */
?>