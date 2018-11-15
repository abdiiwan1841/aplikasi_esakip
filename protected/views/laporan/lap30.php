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
            LAPORAN EFISIENSI PENGGUNAAN SUMBER DAYA TAHUN <?php echo Yii::app()->user->getTahun(); ?><BR>
            <?php echo strtoupper(Yii::app()->user->getNamaOpd()); ?><BR>
            PEMERINTAH DAERAH PROVINSI JAWA BARAT<BR>
        </div>
    </div>
    <div class="row" style="margin: 0 auto;">
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
                foreach ($mdlProgram as $rowa)
                {
                    $nomor_program = $rowa['nomor_program'];
                    $nomor_indikator = $rowa['nomor_indikator'];
                    $nomor_sasaran = $rowa['nomor_sasaran'];
                    $nomor_tujuan = $rowa['nomor_tujuan'];
                    $nomor_misi = $rowa['nomor_misi'];
                    $nama_program = $rowa['program'];
                    $pagu = $rowa['pagu_anggaran'];
                    $rpagu = $rowa['realisasi_keuangan'];
                    $nomor_urut++;


                    $criteria1 = new CDbCriteria();
                    $criteria1->addCondition("id_instansi=:idx and nomor_sasaran=:nomor_sasaran and nomor_tujuan=$nomor_tujuan and nomor_misi=$nomor_misi and nomor_indikator=$nomor_indikator ");
                    $criteria1->params = array(':idx' => $sk4,':nomor_sasaran'=>$nomor_sasaran);
                    $rowb = Indikator::model()->find($criteria1);

                    /*$sqlstrb = "select * from tindikator where id_instansi='$sk4' and nomor_sasaran=$nomor_sasaran ";
                    $sqlstrb .= "and nomor_tujuan=$nomor_tujuan and nomor_misi=$nomor_misi and nomor_indikator=$nomor_indikator";
                    $resultb = mysql_query($sqlstrb) or die(mysql_error() . "::>><BR>" . $sqlstrb . "<BR>");
                    $rowb = mysql_fetch_assoc($resultb);*/


                    $nama_indikator = $rowb['indikator'];
                    $target_indikator = $rowb['target'];
                    $realisasi_indikator = $rowb['realisasi'];


                    $criteria2 = new CDbCriteria();
                    $criteria2->addCondition("id_instansi=:idx and nomor_sasaran=:nomor_sasaran and nomor_tujuan=$nomor_tujuan and nomor_misi=$nomor_misi ");
                    $criteria2->params = array(':idx' => $sk4,':nomor_sasaran'=>$nomor_sasaran);
                    $rowd = Sasaran::model()->find($criteria2);
                    $nama_sasaran= $rowd['sasaran'];

                if ($target_indikator != 0) {
                    $capaiankinerja = $realisasi_indikator * 100 / $target_indikator;
                } else {
                    $capaiankinerja = 0;
                }
                if ($capaiankinerja >= 100){
                    $warna1 =MyHelpers::nilaidb($capaiankinerja,null,$thn);

                if ($pagu != 0) {
                    $preal = $rpagu * 100 / $pagu;
                    $warna2 = MyHelpers::nilaidb($preal,null,$thn);
                } else {
                    $preal = 0;
                    $warna2 =MyHelpers::nilaidb($preal,null,$thn);
                }
                $tprogram = $tprogram + $preal;
                ?>
                <tr>
                    <td align="center"><?= $nomor_urut; ?></td>
                    <td align="justify"><?= $nama_sasaran; ?></td>
                    <td align="justify"><?= $nama_indikator; ?></td>
                    <td align="center" bgcolor="<?= $warna1; ?>"><?= number_format($capaiankinerja, 2, ',', '.'); ?></td>
                    <td align="center" bgcolor="<?= $warna2; ?>"><?= number_format($preal, 2, ',', '.'); ?></td>
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
                    <td align="center"><?= number_format($preal, 2, ',', '.') . "%"; ?></td>
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