<?php
$id_instansi =Yii::app()->user->getOpd();
$instansi=Opd::model()->find('id_instansi=:id_instansi', array('id_instansi' => $id_instansi));

mysql_connect('localhost','root','');
mysql_select_db('db2016');
?>

<!-- Top Bar Starts -->
<div class="top-bar clearfix">
    <div class="page-title">
        <h4>
            <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
            <?php echo $title?> 
            <!-- <?php echo strtoupper($instansi["nama_instansi"]);?> -->
        </h4>
    </div>
</div>
<!-- Top Bar Ends -->

<!-- Container fluid Starts -->
<div class="container-fluid">

    <!-- Spacer starts -->
    <div class="spacer-xs">
        <!-- Row Starts -->
        <h4 class="text-center">Laporan Analisa Efisiensi Penggunaan Sumber Daya Tahun <?php echo Yii::app()->user->getTahun(); ?></h4>
        <h4 class="text-center"><?php echo strtoupper($instansi["nama_instansi"]);?></h4>
        <h4 class="text-center">PEMERINTAH DAERAH PROVINSI JAWA BARAT</h4>
        <!-- Row Ends -->
    </div>
    <!-- Spacer ends -->
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
$counting=0;
$tprogram=0;
$tindikator=0;
$sqlstra="select * from tprogram where id_instansi='$id_instansi'";
$resulta=  mysql_query($sqlstra) or die(mysql_error()."::>><BR>".$sqlstra."<BR>");
$jumlahprogram=  mysql_num_rows($resulta);
?> 
            <tbody>
<?php 
require_once '../inc/penilaian.php';
$nomor_urut=0;
for($ia=1;$ia<=$jumlahprogram;$ia++){
    $rowa=mysql_fetch_array($resulta);
    $nomor_program=$rowa['nomor_program'];
    $nomor_indikator=$rowa['nomor_indikator'];
    $nomor_sasaran=$rowa['nomor_sasaran'];
    $nomor_tujuan=$rowa['nomor_tujuan'];
    $nomor_misi=$rowa['nomor_misi'];
    $nama_program=$rowa['program'];
    $pagu=$rowa['pagu_anggaran'];
    $rpagu=$rowa['realisasi_keuangan'];
    $nomor_urut++;
    $sqlstrb="select * from tindikator where id_instansi='$id_instansi' and nomor_sasaran=$nomor_sasaran ";
    $sqlstrb .="and nomor_tujuan=$nomor_tujuan and nomor_misi=$nomor_misi and nomor_indikator=$nomor_indikator";
    $resultb=  mysql_query($sqlstrb) or die(mysql_error()."::>><BR>".$sqlstrb."<BR>");
    $rowb=mysql_fetch_assoc($resultb);
    $nama_indikator=$rowb['indikator'];
    $target_indikator=$rowb['target'];
    $realisasi_indikator=$rowb['realisasi'];
    
    $sqlstrc="select * from tsasaran where id_instansi='$id_instansi' and nomor_sasaran=$nomor_sasaran ";
    $sqlstrc .="and nomor_tujuan=$nomor_tujuan and nomor_misi=$nomor_misi ";
    $resultc=  mysql_query($sqlstrc) or die(mysql_error()."::>><BR>".$sqlstrc."<BR>");
    $rowc=mysql_fetch_assoc($resultc);
    $nama_sasaran=$rowc['sasaran'];

    if ($target_indikator != 0) {
        $capaiankinerja = $realisasi_indikator * 100 / $target_indikator;
    } else {
        $capaiankinerja = 0;
    }
    if ($capaiankinerja >= 100){
    $warna1 = nilai($capaiankinerja);

    if ($pagu != 0) {
        $preal = $rpagu * 100 / $pagu;
        $warna2 = nilai($preal);
    } else {
        $preal = 0;
        $warna2 = nilai($preal);
    }
    $tprogram = $tprogram + $preal;
?>
                <tr>
                    <td align="center"><?=$nomor_urut;?></td>
                    <td align="justify"><?=$nama_sasaran;?></td>
                    <td align="justify"><?=$nama_indikator;?></td>
                    <td align="center" bgcolor="<?= $warna1; ?>"><?=number_format($capaiankinerja,2,',','.');?></td>
                    <td align="center" bgcolor="<?= $warna2; ?>"><?=number_format($preal,2,',','.');?></td>
                    <!-- <td align="center"><?=number_format(20,2,',','.')."%";?></td> -->
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
<?php } 
}?>
            </tbody>
        </table>
        <table>
                    <!-- <tr>
                        <td bgcolor="#17A589" style="width:20px;">SB</td>
                        <td style="width:100px;">Sangat Baik [>=80%]</td>
                        <td bgcolor="#5DADE2" style="width:20px;">B</td>
                        <td style="width:100px;">Baik [60-79,99%]</td>
                        <td bgcolor="#F7DC6F" style="width:20px;">SD</td>
                        <td style="width:100px;">Sedang [50-59,99%]</td>
                        <td bgcolor="#F1948A" style="width:20px;">K</td>
                        <td style="width:100px;">Kurang [0,-49,99%]</td>
                        <td bgcolor="#BFC9CA" style="width:20px;">BD</td>
                        <td style="width:100px;">Data Tidak Lengkap [0%]</td>
                    </tr> -->

                    <tr>
                        <td bgcolor="#119115" style="width:20px;">AA</td>
                        <td style="width:100px;">Sangat Memuaskan [> 90 - 100%]</td>
                        <td bgcolor="#1ad81c" style="width:20px;">A</td>
                        <td style="width:100px;">Memuaskan [> 80 - 90%]</td>
                        <td bgcolor="#5DADE2" style="width:20px;">BB</td>
                        <td style="width:100px;">Sangat Baik [> 70 - 80%]</td>
                        <td bgcolor="#ff8c00" style="width:20px;">B</td>
                        <td style="width:100px;">Baik [> 60 - 70%]</td>
                        <td bgcolor="#fff600" style="width:20px;">CC</td>
                        <td style="width:100px;">Cukup [> 50 - 60%]</td>
                        <td bgcolor="#db0202" style="width:20px;">C</td>
                        <td style="width:100px;">Kurang [> 30 - 50%]</td>
                        <td bgcolor="#BFC9CA" style="width:20px;">D</td>
                        <td style="width:100px;">Sangat Kurang [0 - 30%]</td>
                    </tr>
                </table>
</div>
<!-- Container fluid ends -->

<script>
    $(function () {
        var idPildata="";
        $('#btndisplay').click(function () {
            <?php
            $os = array(1,2,4);
            if (in_array($pilihan,$os)) {
            ?>
                idPildata = "&f="+$("#opt").val();
            <?php
            } else {
            ?>
                idPildata = "&f=0";
            <?php
                }
             ?>
            $('<form action="<?php echo Yii::app()->baseUrl?>/laporan/showlaporan/&opt=<?php echo $pilihan ?>&tr=1'+idPildata+'" method="get" target="_blank" style="display:none"/>'
            ).appendTo("body").submit().remove();
        });

        $('#btnpdf').click(function () {
            <?php
            $os = array(1,2,4);
            if (in_array($pilihan,$os)) {
            ?>
            idPildata = "&f="+$("#opt").val();
            <?php
            } else {
            ?>
            idPildata = "&f=0";
            <?php
            }
            ?>
            $('<form action="<?php echo Yii::app()->baseUrl?>/laporan/showlaporan/&opt=<?php echo $pilihan ?>&tr=2'+idPildata+'" method="get" target="_blank" style="display:none"/>'
            ).appendTo("body").submit().remove();
        });
    });
</script>