<!-- Top Bar Starts -->
<?php 
        $visi=Visi::model()->find('id_instansi=:id_instansi', array('id_instansi' => $id_instansi));
        $instansi=Opd::model()->find('id_instansi=:id_instansi', array('id_instansi' => $id_instansi));
        //$pejabat=Pejabat::model()->find('id_instansi=:id_instansi and parent_id=:parent_id', array('id_instansi' => $id_instansi,'parent_id' => 1));
        $misi = Misi::model()->findAll(array("condition"=>"idinstansi='".$id_instansi."'"));
        $misieselonempat = IndikatorEselonEmpat::model()->findAll(array("condition"=>"id_instansi='".$id_instansi."' GROUP BY idpejabat_eselon_empat ASC"));
        $pejabateselontiga = Pejabat::model()->findAll(array("condition"=>"id_instansi='".$id_instansi."' and parent_id=1 "));
        $pejabateselonempat = Pejabat::model()->findAll(array("condition"=>"id_instansi='".$id_instansi."' and parent_id!=1 and parent_id != 0 GROUP BY id "));
        ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Laporan Cascading</title>

        <script type="text/css">
	
            .instansi {
            text-align: center;
            }
        </script>
        </head>
    <body>
        <!-- Container fluid Starts -->
        <div class="container-fluid">

            <!-- Spacer starts -->
            <div class="spacer-xs">
                <!-- Row Starts -->
                <div class="page-title">
                    <h3 class="text-center">
                        <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
                    LAPORAN CASCADING
                    <br>
                    <?php echo strtoupper($instansi["nama_instansi"]);?> 
                    <br>
                    TAHUN <?php echo Yii::app()->user->getTahun(); ?>
                    </h3>
                </div>
                
                <h3 class="text-center">VISI</h3>
                <p class="text-center">"<?php echo $visi["visi"];?>"</p>

                <table class="table table-bordered" width="100%" border="1" cellspacing="0" cellpadding="3">
                <tr>
                <?php 
                $no=1;
                foreach($misi as $misi_row){
                        echo "<td colspan='3'>
                        <h5 class='text-center'>MISI ".$no."</h5>
                        ".$misi_row->misi."</td>";
                        $no++;
                }

                ?>
                <tr><td colspan="18" align="center">  <h3 class="text-center">KEPALA <?php echo strtoupper($instansi["nama_instansi"]);?></h3></td></tr>
                </tr>
            <tr>
                <?php 
                $no=1;
                foreach($misi as $misi_row){

                    $tujuan = Tujuan::model()->find(array("condition"=>"id_instansi='".$id_instansi."' and nomor_misi='".$misi_row->nomisi."'"));

                    echo "<td colspan='3'><h6 class='text-left'>TUJUAN ".$no." : ".@$tujuan->tujuan." </h6></td>";
                    $no++;
                }

                ?>

            </tr>
            <tr>
                <?php 
                $no=1;
                foreach($misi as $misi_row){

                    $tujuan = Tujuan::model()->find(array("condition"=>"id_instansi='".$id_instansi."' and nomor_misi='".$misi_row->nomisi."'"));

                    $sasaran = Sasaran::model()->find(array("condition"=>"id_instansi='".$id_instansi."' and nomor_misi='".$misi_row->nomisi."' and nomor_tujuan='".@$tujuan->nomor_tujuan."'"));

                    echo "<td colspan='3'><h6 class='text-left'>SASARAN ".$no." : ".@$sasaran->sasaran." </h5></td>";
                    $no++;
                }

                ?>

            </tr>
            <tr>
                <?php 
                $no=1;
                foreach($misi as $misi_row){

                    $tujuan = Tujuan::model()->find(array("condition"=>"id_instansi='".$id_instansi."' and nomor_misi='".$misi_row->nomisi."'"));

                    $sasaran = Sasaran::model()->find(array("condition"=>"id_instansi='".$id_instansi."' and nomor_misi='".$misi_row->nomisi."' and nomor_tujuan='".@$tujuan->nomor_tujuan."'"));

                    $indikator = Indikator::model()->find(array("condition"=>"id_instansi='".$id_instansi."' and nomor_misi='".$misi_row->nomisi."' and nomor_tujuan='".@$tujuan->nomor_tujuan."' and nomor_sasaran='".@$sasaran->nomor_sasaran."'"));


                    echo "<td colspan='3'><h6 class='text-left'>".@$indikator->indikator." </h5></td>";
                    $no++;
                }

            ?>

            </tr>
            <tr><td colspan="18" style="background-color:grey;"><h3 class="text-center"></h3></tr>
            <tr>
                <?php 
                $no=1;
                foreach($pejabateselontiga as $pejabateselontiga_row){

                    // $tujuan = Tujuan::model()->find(array("condition"=>"id_instansi='".$id_instansi."' and nomor_misi='".$misi_row->nomisi."'"));

                    // $sasaran = Sasaran::model()->find(array("condition"=>"id_instansi='".$id_instansi."' and nomor_misi='".$misi_row->nomisi."' and nomor_tujuan='".$tujuan->nomor_tujuan."'"));

                    // $pejabat = Pejabat::model()->find(array("condition"=>"id_instansi='".$id_instansi."' "));

                    // $sasaraneselontiga = SasaranEselonTiga::model()->find(array("condition"=>"id_instansi='".$id_instansi."' and nomor_misi='".$misi_row->nomisi."' and nomor_tujuan='".$tujuan->nomor_tujuan."' and nomor_sasaran_eselon_dua='".$sasaran->nomor_sasaran."' and idpejabat='".$pejabat->id."'"));

                    echo "<td colspan='3'><h5 align='center'><b>".strtoupper(@$pejabateselontiga_row->nama_jabatan)."</b></h5></td>";
                    $no++;
                }

                ?>

            </tr>
            <?php 
            $sasaran = SasaranEselonTiga::model()->find(array("condition"=>"id_instansi='".$id_instansi."' and nomor_misi='".$misi_row->nomisi."' and nomor_tujuan='".@$tujuan->nomor_tujuan."'"));
            if(isset($sasaran)){
            ?>
            <!-- <tr><td colspan="<?php echo count($misi);?>">  <h3 class="text-center">KEPALA BIDANG <?php echo strtoupper($instansi["nama_instansi"]);?></h3> -->
            <tr>
                <?php 
                $no=1;
                foreach($misi as $misi_row){

                    $tujuan = Tujuan::model()->find(array("condition"=>"id_instansi='".$id_instansi."' and nomor_misi='".$misi_row->nomisi."'"));

                    $sasaran = SasaranEselonTiga::model()->find(array("condition"=>"id_instansi='".$id_instansi."' and nomor_misi='".$misi_row->nomisi."' and nomor_tujuan='".$tujuan->nomor_tujuan."'"));

                    echo "<td colspan='3'><h6 class='text-left'>SASARAN ".$no." : ".@$sasaran->sasaran." </h5></td>";
                    $no++;
                }

                ?>

            </tr>
            </td></tr>


            
            <tr>
                <?php 
                $no=1;
                foreach($misi as $misi_row){

                    $tujuan = Tujuan::model()->find(array("condition"=>"id_instansi='".$id_instansi."' and nomor_misi='".$misi_row->nomisi."'"));

                    $sasaran = SasaranEselonTiga::model()->find(array("condition"=>"id_instansi='".$id_instansi."' and nomor_misi='".$misi_row->nomisi."' and nomor_tujuan='".$tujuan->nomor_tujuan."'"));

                    $indikator = IndikatorEselonTiga::model()->find(array("condition"=>"id_instansi='".$id_instansi."' and nomor_misi='".$misi_row->nomisi."' and nomor_tujuan='".$tujuan->nomor_tujuan."' and nomor_sasaran_eselon_tiga='".$sasaran->nomor_sasaran."'"));


                    echo "<td colspan='3'><h6 class='text-left'>INDIKATOR ".$no." : ".@$indikator->indikator." </h5></td>";
                    $no++;
                }

                ?>
            </tr>
            <?php }else{}?>

                <?php 
            $sasaran = SasaranEselonEmpat::model()->find(array("condition"=>"id_instansi='".$id_instansi."' and nomor_misi='".$misi_row->nomisi."' and nomor_tujuan='".@$tujuan->nomor_tujuan."'"));
            if(isset($sasaran)){
            ?>
            <!-- <tr><td colspan="<?php echo count($misi);?>">  <h3 class="text-center">KEPALA SUB BIDANG <?php echo strtoupper($instansi["nama_instansi"]);?></h3> -->
        <!-- </td></tr> -->
        <tr><td colspan="18" style="background-color:grey;"><h3 class="text-center"></h3></tr>
            <tr>
                <?php 
                $no=1;
                foreach($pejabateselonempat as $pejabateselonempat_row){

                    // $pejabateselonempat = Pejabat::model()->find(array("condition"=>"id_instansi='".$id_instansi."' and parent_id='".$pejabateselontiga_row->id."' GROUP BY parent_id"));

                    echo "<td><h5 align='center'><b>".strtoupper(@$pejabateselonempat_row->nama_jabatan)."</b></h5></td>";
                    $no++;
                }

                ?>

            </tr>

            <tr>
                <?php 
                $no=1;
                foreach($misieselonempat as $misieselonempat_row){

                    $tujuan = Tujuan::model()->find(array("condition"=>"id_instansi='".$id_instansi."' and nomor_misi='".@$misieselonempat_row->nomor_misi."'"));

                    $sasaran = SasaranEselonEmpat::model()->find(array("condition"=>"id_instansi='".$id_instansi."' and nomor_misi='".@$misieselonempat_row->nomor_misi."' and nomor_tujuan='".@$tujuan->nomor_tujuan."' and idpejabat_eselon_empat='".@$misieselonempat_row->idpejabat_eselon_empat."'"));

                    echo "<td><h6 class='text-left'>SASARAN ".$no." : ".@$sasaran->sasaran." </h5></td>";
                    $no++;
                }

                ?>

            </tr>
            <tr>
                <?php 
                $no=1;
                foreach($misieselonempat as $misieselonempat_row){

                        $tujuan = Tujuan::model()->find(array("condition"=>"id_instansi='".$id_instansi."' and nomor_misi='".@$misieselonempat_row->nomor_misi."'"));

                        $sasaran = SasaranEselonEmpat::model()->find(array("condition"=>"id_instansi='".$id_instansi."' and nomor_misi='".@$misieselonempat_row->nomor_misi."' and nomor_tujuan='".@$tujuan->nomor_tujuan."'"));

                        $indikator = IndikatorEselonEmpat::model()->find(array("condition"=>"id_instansi='".$id_instansi."' and nomor_tujuan='".@$tujuan->nomor_tujuan."' and idpejabat_eselon_empat='".@$misieselonempat_row->idpejabat_eselon_empat."'"));


                    echo "<td><h6 class='text-left'>INDIKATOR ".$no." : ".@$indikator->indikator." </h5></td>";
                    $no++;
                }

                ?>
            </tr>
            <?php }else{}?>

        </table>

        
            

            </div>


        </div>
    </body>
</html>
