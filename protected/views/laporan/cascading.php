<!-- Top Bar Starts -->
 <?php 
        $id_instansi =Yii::app()->user->getOpd();
        $visi=Visi::model()->find('id_instansi=:id_instansi', array('id_instansi' => $id_instansi));
        $instansi=Opd::model()->find('id_instansi=:id_instansi', array('id_instansi' => $id_instansi));
        //$pejabat=Pejabat::model()->find('id_instansi=:id_instansi and parent_id=:parent_id', array('id_instansi' => $id_instansi,'parent_id' => 1));
        $misi = Misi::model()->findAll(array("condition"=>"idinstansi='".$id_instansi."'"));
        $misieselonempat = IndikatorEselonEmpat::model()->findAll(array("condition"=>"id_instansi='".$id_instansi."' GROUP BY idpejabat_eselon_empat ASC"));
        $pejabateselontiga = Pejabat::model()->findAll(array("condition"=>"id_instansi='".$id_instansi."' and parent_id=1 "));
        $pejabateselonempat = Pejabat::model()->findAll(array("condition"=>"id_instansi='".$id_instansi."' and parent_id!=1 and parent_id != 0 GROUP BY id "));
        print_r($misi);die();
        
        $temp = 3 * count($misi);
        ?>
<div class="top-bar clearfix">
    <div class="page-title">
        <h4>
            <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
            <?php echo $title?> <?php echo strtoupper($instansi["nama_instansi"]);?> <?php echo Yii::app()->user->getTahun(); ?>
        </h4>
    </div>

    <div class="pull-right" id="mini-nav-right">

        <a href="<?php echo Yii::app()->baseUrl; ?>/laporan/indexCascading" class="btn btn-info btn-xs" rel="tooltip"
           data-original-title="Data Sasaran Eselon 4">
            Upload File Cascading
        </a>

        <a href="<?php echo Yii::app()->baseUrl; ?>/laporan/exportpdfcascading" class="btn btn-warning btn-xs" rel="tooltip"
           data-original-title="Export PDF">
           Export PDF
        </a>

        <a href="<?php echo Yii::app()->baseUrl; ?>/laporan/exportexcelcascading" class="btn btn-success btn-xs" rel="tooltip"
           data-original-title="Export Excel">
            Export Excel
        </a>
    </div>
</div>

<div class="form-group">
                <div class="col-sm-offset-0 col-sm-5">
                    <?php echo TbHtml::alert(TbHtml::ALERT_COLOR_DANGER,
                        '<p> Jika struktur cascading yang ditampilkan tidak sesuai, User dapat mengunggah file cascading (struktur file cascading yang telah dibuat manual oleh user) dalam format file (.jpg / .png / .pdf / .doc / .docx / .xlsx / .xls)</p>'); ?>
                </div>
            </div>
<!-- Container fluid Starts -->
<div class="container-fluid">

    <!-- Spacer starts -->
    <div class="spacer-xs">
        <!-- Row Starts -->
         
        <h2 class="text-center">VISI</h2>
        <p class="text-center">"<?php echo $visi["visi"];?>"</p>

        <table class="table table-bordered">
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
        <tr><td colspan="<?php echo $temp; ?>"><h3 class="text-center">KEPALA <?php echo strtoupper($instansi["nama_instansi"]);?></h3>
</td></tr>
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
    <tr><td colspan="<?php echo $temp; ?>" style="background-color: #3c6478;"><h3 class="text-center"></h3></tr>
    <tr>
        <?php 
        $no=1;
        if(isset($pejabateselontiga)){
            foreach($misi as $misi_row){

                $tujuan = Tujuan::model()->find(array("condition"=>"id_instansi='".$id_instansi."' and nomor_misi='".$misi_row->nomisi."'"));

                $sasaran = Sasaran::model()->find(array("condition"=>"id_instansi='".$id_instansi."' and nomor_misi='".$misi_row->nomisi."' and nomor_tujuan='".$tujuan->nomor_tujuan."'"));

                $sasaraneselontiga = SasaranEselonTiga::model()->find(array("condition"=>"id_instansi='".$id_instansi."' and nomor_misi='".$misi_row->nomisi."' and nomor_tujuan='".$tujuan->nomor_tujuan."' and nomor_sasaran_eselon_dua='".$sasaran->nomor_sasaran."'"));

                $pejabat = Pejabat::model()->find(array("condition"=>"id_instansi='".@$id_instansi."' and id = '".@$sasaraneselontiga->idpejabat."' and parent_id = 1 GROUP BY id ASC "));

                if(@$pejabat->nama_jabatan != "")
                {
                    echo "<td colspan='3'><h5 class='text-center'><b>".@$pejabat->nama_jabatan."</b></h5></td>";
                }
                else
                {
                    echo "<td colspan='3'><h5 class='text-center'><b>jabatan eselon 3 belum tersedia</b></h5></td>";
                }
                
                $no++;
            }
        }
        else
        {
            echo "<td colspan='3'><h5 class='text-center'><b>jabatan eselon 3 belum tersedia</b></h5></td>";
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
    $countpejabateselonempat = Pejabat::model()->findAll(array("condition"=>"id_instansi='".$id_instansi."' and parent_id!=1 and parent_id != 0 GROUP BY id ORDER BY parent_id ASC "));
    if(isset($countpejabateselonempat)){
    ?>
    <!-- <tr><td colspan="<?php echo count($misi);?>">  <h3 class="text-center">KEPALA SUB BIDANG <?php echo strtoupper($instansi["nama_instansi"]);?></h3> -->
    <!-- </td></tr> -->
    <tr><td colspan="<?php echo $temp;?>" style="background-color: #3c6478;"><h3 class="text-center"></h3></tr>
    <tr>
        <?php 
        $no=1;
        if(isset($pejabateselonempat)){
            foreach($pejabateselonempat as $pejabateselonempat_row){

                // $pejabateselonempat = Pejabat::model()->find(array("condition"=>"id_instansi='".$id_instansi."' and parent_id='".$pejabateselontiga_row->id."' GROUP BY parent_id"));

                if(@$pejabateselonempat_row->nama_jabatan != "")
                {
                    echo "<td><h5 class='text-center'><b>".@$pejabateselonempat_row->nama_jabatan."</b></h5></td>";
                }
                else
                {
                    echo "<td colspan='3'><h5 class='text-center'><b>jabatan eselon 3 belum tersedia</b></h5></td>";
                }
                
                $no++;
            }
        }else{
            echo "<td colspan='3'><h5 class='text-center'><b>jabatan eselon 4 belum tersedia</b></h5></td>";
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

            // echo "<td><h6 class='text-left'>SASARAN ".$no." : ".@$sasaran->sasaran." </h5></td>";
            if(@$sasaran->sasaran != "")
            {
                echo "<td><h6 class='text-left'>SASARAN ".$no." : ".@$sasaran->sasaran." </h5></td>";
            }
            else
            {
                echo "<td><h6 class='text-left'>SASARAN KOSONG</h5></td>";
            }
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
