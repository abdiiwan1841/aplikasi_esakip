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
                    <th class="text-center" rowspan="2" style="width:120px;">Capaian Thn <?php echo Yii::app()->user->getTahun(); ?> terhadap Target Akhir
                        Renstra
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
                /*$counting = 0;
                $tprogram = 0;
                $tprogram1 = 0;
                $sqlstra = "select * from tindikator where id_instansi='$sk4'";
                $resulta = mysql_query($sqlstra) or die(mysql_error() . "::>><BR>" . $sqlstra . "<BR>");
                $jumlahindikator = mysql_num_rows($resulta);*/
                ?>
                <tbody>
                <?php
                /*require_once '../inc/penilaian.php';
                $nomor_urut = 0;
                $tipe_formula=1;
                for ($ia = 1; $ia <= $jumlahindikator; $ia++) {
                    $rowa = mysql_fetch_array($resulta);
                    $nomor_indikator = $rowa['nomor_indikator'];
                    $nomor_sasaran = $rowa['nomor_sasaran'];
                    $nomor_tujuan = $rowa['nomor_tujuan'];
                    $nomor_misi = $rowa['nomor_misi'];
                    $nama_indikator = $rowa['indikator'];
                    $tipe_formula = $rowa['tipe_formula'];
                    $capaianlalu = $rowa['realisasi_tahun_sebelumnya'];
                    $target = $rowa['target'];
                    $realisasi = $rowa['realisasi'];
                    $targetrenstra = $rowa['target_akhir_renstra'];
                    $nomor_urut++;
                    $sqlstrc = "select * from tsasaran where id_instansi='$sk4' and nomor_sasaran=$nomor_sasaran ";
                    $sqlstrc .= "and nomor_tujuan=$nomor_tujuan and nomor_misi=$nomor_misi ";
                    $resultc = mysql_query($sqlstrc) or die(mysql_error() . "::>><BR>" . $sqlstrc . "<BR>");
                    $rowc = mysql_fetch_assoc($resultc);
                    $nama_sasaran = $rowc['sasaran'];*/
                    ?>

                    <?php
                //}
                ?>
                <tr>
                    <td colspan="6"></td>
                    <td></td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td colspan="6" align="right">RATA-RATA :</td>
                    <td align="center" bgcolor=""></td>
                    <td align="center" bgcolor=""></td>
                </tr>
                </tbody>
            </table>
            <BR><BR>
            <table>
                <tr>
                    <?php //keterangan_nilai() ?>
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