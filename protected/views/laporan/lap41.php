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
    <body style="width: 100%">
    <div class="row text-center" style="font-weight:bold;">
        <div class="col-sm-12 form-inline">
            LAPORAN PENGUKURAN KINERJA KEGIATAN/AKTIVITAS TAHUN <?php echo Yii::app()->user->getTahun(); ?> TRIWULAN <?php echo $triwulan?><BR>
            <?php echo strtoupper(Yii::app()->user->getNamaOpd()); ?><BR>
            PEMERINTAH DAERAH PROVINSI JAWA BARAT<BR>
        </div>
    </div>
    <div class="row" style="margin: 0 auto;">
        <table class="table table-bordered table-hover table-responsive table-condensed">
            <thead style="background-color:#C5C5EC;font-weight:bold;">
            <tr>
                <th rowspan="3" class="text-center" style="vertical-align:middle;width:50px;">No.</th>
                <th rowspan="3" class="text-center" style="vertical-align:middle;width:350px;">Kegiatan/Aktivitas</th>
                <th rowspan="3" class="text-center" style="vertical-align:middle;width:350px;">Indikator Kinerja</th>
                <th colspan="2" class="text-center">Target TW <?php echo $triwulan?>?</th>
                <th colspan="3" class="text-center">Realisasi TW <?php echo $triwulan?></th>
            </tr>
            <tr>
                <th rowspan="2" class="text-center" style="vertical-align:middle;width:80px;">Fisik (%)</th>
                <th rowspan="2" class="text-center" style="vertical-align:middle;width:120px;">Keuangan (Rp)</th>
                <th rowspan="2" class="text-center" style="vertical-align:middle;width:80px;">Fisik (%)</th>
                <th colspan="2" class="text-center">Keuangan TW <?php echo $triwulan?></th>
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
            $thn = Yii::app()->user->getTahun();
            $sk4 = Yii::app()->user->getOpd();
            $penomoran_kegiatan = 0;
            $criteria = new CDbCriteria();
            $criteria->addCondition("id_instansi=:idx");
            $criteria->params = array(':idx' => $sk4);
            $mdlKegiatan = Kegiatan::model()->findAll($criteria);
            $jumlahkegiatan =count($mdlKegiatan);
            foreach ($mdlKegiatan as $row1) {
                $nomor_kegiatan = $row1['nomor_kegiatan'];
                $nama_kegiatan = $row1['kegiatan'];
                $nomor_indikator = $row1['nomor_indikator'];
                $nomor_misi = $row1['nomor_misi'];
                $nomor_tujuan = $row1['nomor_tujuan'];
                $nomor_sasaran = $row1['nomor_sasaran'];
                $nomor_program = $row1['nomor_program'];
                $target_fisik_kegiatan=$row1['target_fisik_triwulan'.$triwulan];
                $target_keuangan_kegiatan=$row1['target_keuangan_triwulan'.$triwulan];
                $realisasi_fisik_kegiatan=$row1['realisasi_fisik_triwulan'.$triwulan];
                $realisasi_keuangan_kegiatan=$row1['realisasi_keuangan_triwulan'.$triwulan];
                $penomoran_kegiatan++;

                $criteria1 = new CDbCriteria();
                $criteria1->addCondition("id_instansi=:idx and nomor_sasaran=:nomor_sasaran and nomor_tujuan=$nomor_tujuan and nomor_misi=$nomor_misi and nomor_indikator=$nomor_indikator ");
                $criteria1->params = array(':idx' => $sk4,':nomor_sasaran'=>$nomor_sasaran);
                $rowb = Indikator::model()->find($criteria1);
                $x=$rowb['indikator'];
                ?>
                <tr>
                    <td class="text-center" style="vertical-align:top;"><?php echo $penomoran_kegiatan; ?></td>
                    <td class="text-justify"><?php echo  $nama_kegiatan; ?></td>
                    <td class="text-justify"><?php echo  $x ?></td>
                    <td class="text-center"
                        style="vertical-align:top;"><?php echo  number_format($target_fisik_kegiatan, 2, ',', '.') . "%"; ?></td>
                    <td class="text-right"
                        style="vertical-align:top;"><?php echo  number_format($target_keuangan_kegiatan, 2, ',', '.'); ?></td>
                    <td class="text-center"
                        style="vertical-align:top;"><?php echo  number_format($realisasi_fisik_kegiatan, 2, ',', '.') . "%"; ?></td>
                    <td class="text-right"
                        style="vertical-align:top;"><?php echo  number_format($realisasi_keuangan_kegiatan, 2, ',', '.'); ?></td>
                    <?php
                    if ($target_keuangan_kegiatan != 0) {
                        $persentasekeuangan = $realisasi_keuangan_kegiatan * 100 / $target_keuangan_kegiatan;
                    } else {
                        $persentasekeuangan = 0;
                    }
                    $warna = MyHelpers::nilaidb($persentasekeuangan,null,$thn);
                    ?>
                    <td class="text-center" bgcolor="<?= $warna; ?>"
                        style="vertical-align:top;"><?= number_format($persentasekeuangan, 2, ',', '.') . "%"; ?></td>
                </tr>
                <?php
                $penomoran_aktivitas = 0;


                $criteria1 = new CDbCriteria();
                $criteria1->addCondition("id_instansi=:idx and nomor_sasaran=:nomor_sasaran and nomor_tujuan=$nomor_tujuan and nomor_misi=$nomor_misi and nomor_indikator=$nomor_indikator and nomor_kegiatan=$nomor_kegiatan ");
                $criteria1->params = array(':idx' => $sk4,':nomor_sasaran'=>$nomor_sasaran);
                $row21 = Aktivitas::model()->findAll($criteria1);

                foreach ($row21 as $row2) {

                    $nomor_aktivitas = $row2['nomor_aktivitas'];
                    $nama_aktivitas = $row2['aktivitas'];
                    $penomoran_aktivitas++;


                    $target_fisik_aktivitas=$row2['target_fisik_triwulan'.$triwulan];
                    $target_keuangan_aktivitas=$row2['target_keuangan_triwulan'.$triwulan];
                    $realisasi_fisik_aktivitas=$row2['realisasi_fisik_triwulan'.$triwulan];
                    $realisasi_keuangan_aktivitas=$row2['realisasi_keuangan_triwulan'.$triwulan];

                    $criteria1 = new CDbCriteria();
                    $criteria1->addCondition("id_instansi=:idx and nomor_sasaran=:nomor_sasaran and nomor_tujuan=$nomor_tujuan and nomor_misi=$nomor_misi and nomor_indikator=$nomor_indikator ");
                    $criteria1->params = array(':idx' => $sk4,':nomor_sasaran'=>$nomor_sasaran);
                    $rowb = Indikator::model()->find($criteria1);
                    $x=$rowb['indikator'];

                    ?>
                    <tr>
                        <td class="text-center"
                            style="vertical-align:top;"><?= $penomoran_kegiatan . "." . $penomoran_aktivitas; ?></td>
                        <td class="text-justify"><?= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $nama_aktivitas; ?></td>
                        <td class="text-justify"><?= $x; ?></td>
                        <td class="text-center"
                            style="vertical-align:top;"><?= number_format($target_fisik_aktivitas, 2, ',', '.') . "%"; ?></td>
                        <td class="text-right"
                            style="vertical-align:top;"><?= number_format($target_keuangan_aktivitas, 2, ',', '.'); ?></td>
                        <td class="text-center"
                            style="vertical-align:top;"><?= number_format($realisasi_fisik_aktivitas, 2, ',', '.') . "%"; ?></td>
                        <td class="text-right"
                            style="vertical-align:top;"><?= number_format($realisasi_keuangan_aktivitas, 2, ',', '.'); ?></td>
                        <?php
                        if ($target_keuangan_aktivitas != 0) {
                            $persentasekeuangan = $realisasi_keuangan_aktivitas * 100 / $target_keuangan_aktivitas;
                        } else {
                            $persentasekeuangan = 0;
                        }
                        $warna = MyHelpers::nilaidb($persentasekeuangan,null,$thn);
                        ?>
                        <td class="text-center" bgcolor="<?= $warna; ?>"
                            style="vertical-align:top;"><?= number_format($persentasekeuangan, 2, ',', '.') . "%"; ?></td>
                    </tr>
                    <?php
                }
            }
            ?>
            </tbody>
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