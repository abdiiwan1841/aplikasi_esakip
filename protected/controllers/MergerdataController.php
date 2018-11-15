<?php

class MergerdataController extends Controller
{

    public function beforeAction()
    {
        if (Yii::app()->user->isGuest )
            $this->redirect(Yii::app()->createUrl('login'));

        return true;
    }
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
        $this->layout = "backend";

        $model = new Copiform;
        if(isset($_POST['ajax']) && $_POST['ajax']==='copi-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if(isset($_POST['Copiform']))
        {
            $sk4 = Yii::app()->user->getOpd();
            $sk2 = Yii::app()->user->getName();

            $model->attributes=$_POST['Copiform'];
            // validate user input and redirect to the previous page if valid
            if($model->validate() ) {
                //$this->redirect(Yii::app()->user->returnUrl);
                $ta = $model->tahun;
                $opd = $model->id_instansi;
                $tbl = $model->tabel;

                $sqlq="";
                /*switch ($tbl){
                    case "tvisi":
                        $dsn = "mysql:host=".Yii::app()->params['dbhost'].";dbname=db".$ta;
                        $connection=new CDbConnection($dsn,Yii::app()->params['dbuser'],Yii::app()->params['dbpwd']);
                        $connection->active=true;
                        $sqlq="id_instansi='$opd' ";
                        $qry = "SELECT * FROM $tbl  where $sqlq order by 1 ASC";
                        $resultAsal= $connection->createCommand($qry)->queryAll();
                        foreach ($resultAsal as $rr1){

                            $a1=$rr1['visi'];
                            $dt=date("Y-m-d H:i:s");

                            $sqlstr="INSERT INTO tvisi(id_instansi,visi,cdt,cuser) VALUES ";
                            $sqlstr .="('$sk4','$a1','$dt','$sk2')";
                            $dsn2 = "mysql:host=".Yii::app()->params['dbhost'].";dbname=db".Yii::app()->user->getTahun();
                            $connection2=new CDbConnection($dsn2,Yii::app()->params['dbuser'],Yii::app()->params['dbpwd']);
                            $connection2->active=true;
                            $connection2->createCommand($sqlstr)->query();
                            $connection2->active=false;
                        }
                        $connection->active=false;
                        break;
                    case "tmisi":

                        $dsn = "mysql:host=".Yii::app()->params['dbhost'].";dbname=db".$ta;
                        $connection=new CDbConnection($dsn,Yii::app()->params['dbuser'],Yii::app()->params['dbpwd']);
                        $connection->active=true;
                        $sqlq="idinstansi='$opd' ";
                        $qry = "SELECT * FROM $tbl  where $sqlq order by 1 ASC";
                        $resultAsal= $connection->createCommand($qry)->queryAll();
                        foreach ($resultAsal as $rr1){

                            $dsn2 = "mysql:host=".Yii::app()->params['dbhost'].";dbname=db".Yii::app()->user->getTahun();
                            $connection2=new CDbConnection($dsn2,Yii::app()->params['dbuser'],Yii::app()->params['dbpwd']);
                            $connection2->active=true;

                            $sqlstr="select * from tmisi where idinstansi='$sk4'";
                            $result=$connection2->createCommand($sqlstr)->queryAll();
                            if(count($result)>1){
                                $sqlstr="select ifnull(MAX(nomisi),0) as Paling from tmisi where idinstansi='$sk4'";
                                $row=$connection2->createCommand($sqlstr)->queryScalar();
                                $nomor=$row+1;
                            }
                            else
                            {
                                $nomor=1;
                            }

                            $a1=$rr1['misi'];
                            $dt=date("Y-m-d H:i:s");
                            $sqlstr="INSERT INTO tmisi(nomisi,idinstansi,misi,cdt,cuser,uuser) VALUES ";
                            $sqlstr .="($nomor,'$sk4','$a1','$dt','$sk2','$sk2')";

                            $connection2->createCommand($sqlstr)->query();
                            $connection2->active=false;
                        }
                        $connection->active=false;
                        break;
                    case "ttujuan":
                        //$a1=clean($_POST['idmisitujuan"']);

                        $dsn = "mysql:host=".Yii::app()->params['dbhost'].";dbname=db".$ta;
                        $connection=new CDbConnection($dsn,Yii::app()->params['dbuser'],Yii::app()->params['dbpwd']);
                        $connection->active=true;

                        $sqlq="id_instansi='$opd'";
                        $qry = "SELECT * FROM $tbl  where $sqlq order by 1 ASC";
                        $resultAsal= $connection->createCommand($qry)->queryAll();
                        foreach ($resultAsal as $rr1){

                            $dsn2 = "mysql:host=".Yii::app()->params['dbhost'].";dbname=db".Yii::app()->user->getTahun();
                            $connection2=new CDbConnection($dsn2,Yii::app()->params['dbuser'],Yii::app()->params['dbpwd']);
                            $connection2->active=true;

                            $sqlstr="select * from ttujuan where id_instansi='$sk4'";
                            //$result=mysql_query($sqlstr) or die(mysql_error()."<BR>Query::".$sqlstr);
                            $result=$connection2->createCommand($sqlstr)->queryAll();
                            if(count($result)==0){
                                $nomor=1;
                            }
                            else
                            {
                                $sqlstr="select * from ttujuan where id_instansi='$sk4' and nomor_misi=$a1";
                                $result=mysql_query($sqlstr) or die(mysql_error()."<BR>Query::".$sqlstr);
                                if(mysql_num_rows($result)==0){
                                    $nomor=1;
                                }
                                else
                                {
                                    $sqlstr="select MAX(nomor_tujuan) as Paling from ttujuan where id_instansi='$sk4' and nomor_misi=$a1";
                                    $result=mysql_query($sqlstr) or die(mysql_error()."<BR>Query::".$sqlstr);
                                    $row=  mysql_fetch_assoc($result);
                                    $nomor=$row['Paling']+1;
                                }
                            }

                            $a2=clean($rr1['tujuan']);
                            //$dt=date("Y-m-d H:i:s");
                            $sqlstr="INSERT INTO ttujuan(nomor_misi,id_instansi,nomor_tujuan,tujuan) VALUES ";
                            $sqlstr .="($a1,'$sk4',$nomor,'$a2')";
                            mysql_query($sqlstr) or die(mysql_error());
                        }
                        break;
                    case "tsasaran":
                        $a1=clean($_POST['idmisisasaran"']);
                        $a2=clean($_POST['idtujuansasaran"']);

                        mysql_select_db($dbasal);
                        $sqlq="id_instansi='$opd' and sasaranid IN (".format_array($checklist).")";
                        $qry = "SELECT * FROM $tbl  where $sqlq order by 1 ASC";
                        $resultAsal=mysql_query($qry) or die(mysql_error());
                        while($rr1=mysql_fetch_array($resultAsal)){

                            mysql_select_db($sk6);

                            $sqlstr="select * from tsasaran where id_instansi='$sk4'";
                            $result=mysql_query($sqlstr) or die(mysql_error()."<BR>Query::".$sqlstr);
                            if(mysql_num_rows($result)==0){
                                $nomor=1;
                            }
                            else
                            {
                                $sqlstr="select * from tsasaran where id_instansi='$sk4' and nomor_misi=$a1";
                                $result=mysql_query($sqlstr) or die(mysql_error()."<BR>Query::".$sqlstr);
                                if(mysql_num_rows($result)==0){
                                    $nomor=1;
                                }
                                else
                                {
                                    $sqlstr="select * from tsasaran where id_instansi='$sk4' and nomor_misi=$a1 and nomor_tujuan=$a2";
                                    $result=mysql_query($sqlstr) or die(mysql_error()."<BR>Query::".$sqlstr);
                                    if(mysql_num_rows($result)==0){
                                        $nomor=1;
                                    }
                                    else
                                    {
                                        $sqlstr="select MAX(nomor_sasaran) as Paling from tsasaran where id_instansi='$sk4' and nomor_misi=$a1 and nomor_tujuan=$a2";
                                        $result=mysql_query($sqlstr) or die(mysql_error()."<BR>Query::".$sqlstr);
                                        $row=  mysql_fetch_assoc($result);
                                        $nomor=$row['Paling']+1;
                                    }
                                }
                            }

                            $a3=clean($rr1['sasaran']);
                            $a4=clean($rr1['sasaran_strategis']);
                            $a5=clean($rr1['capaian_sasaran']);
                            $dt=date("Y-m-d H:i:s");
                            $sqlstr="INSERT INTO tsasaran(nomor_misi,id_instansi,nomor_tujuan,nomor_sasaran,sasaran,sasaran_strategis,capaian_sasaran) VALUES ";
                            $sqlstr .="($a1,'$sk4',$a2,$nomor,'$a3',$a4,$a5)";
                            mysql_query($sqlstr) or die(mysql_error());
                        }
                        break;
                    case "tindikator":
                        $a1=clean($_POST['idmisiindikator"']);
                        $a2=clean($_POST['idtujuanindikator"']);
                        $a3=clean($_POST['pilihsasaran']);

                        mysql_select_db($dbasal);
                        $sqlq="id_instansi='$opd' and indikatorid IN (".format_array($checklist).")";
                        $qry = "SELECT * FROM $tbl  where $sqlq order by 1 ASC";
                        $resultAsal=mysql_query($qry) or die(mysql_error());
                        while($rr1=mysql_fetch_array($resultAsal)){

                            mysql_select_db($sk6);

                            $sqlstr="select * from tindikator where id_instansi='$sk4'";
                            $result=mysql_query($sqlstr) or die(mysql_error()."<BR>Query::".$sqlstr);
                            if(mysql_num_rows($result)==0){
                                $nomor=1;
                            }
                            else
                            {
                                $sqlstr="select * from tindikator where id_instansi='$sk4' and nomor_misi=$a1";
                                $result=mysql_query($sqlstr) or die(mysql_error()."<BR>Query::".$sqlstr);
                                if(mysql_num_rows($result)==0){
                                    $nomor=1;
                                }
                                else
                                {
                                    $sqlstr="select * from tindikator where id_instansi='$sk4' and nomor_misi=$a1 and nomor_tujuan=$a2";
                                    $result=mysql_query($sqlstr) or die(mysql_error()."<BR>Query::".$sqlstr);
                                    if(mysql_num_rows($result)==0){
                                        $nomor=1;
                                    }
                                    else
                                    {
                                        $sqlstr="select * from tindikator where id_instansi='$sk4' and nomor_misi=$a1 and nomor_tujuan=$a2 and nomor_sasaran=$a3";
                                        $result=mysql_query($sqlstr) or die(mysql_error()."<BR>Query::".$sqlstr);
                                        if(mysql_num_rows($result)==0){
                                            $nomor=1;
                                        }
                                        else {
                                            $sqlstr="select MAX(nomor_indikator) as Paling from tindikator where id_instansi='$sk4' and nomor_misi=$a1 and nomor_tujuan=$a2 and nomor_sasaran=$a3";
                                            $result=mysql_query($sqlstr) or die(mysql_error()."<BR>Query::".$sqlstr);
                                            $row=mysql_fetch_assoc($result);
                                            $nomor=$row['Paling']+1;
                                        }
                                    }
                                }
                            }




                            $a4=clean($rr1['indikator']);
                            $a5=clean($rr1['satuan']);
                            $a6=clean($rr1['indikator_kinerja_utama']);
                            $a7=clean($rr1['target_rpjm1']);
                            $a8=clean($rr1['target_rpjm2']);
                            $a9=clean($rr1['target_rpjm3']);
                            $a10=clean($rr1['target_rpjm4']);
                            $a11=clean($rr1['target_rpjm5']);

                            $a12=clean($rr1['target']);
                            $a13=clean($rr1['target_tahun_sebelumnya']);
                            $a14=clean($rr1['realisasi']);
                            $a15=clean($rr1['realisasi_tahun_sebelumnya']);

                            $a16=clean($rr1['keterangan']);
                            $a17=clean($rr1['keterangan']);
                            $a33=clean($rr1['tipe_formula']);


                            $a18=clean($rr1['target_triwulan1']);
                            $a19=clean($rr1['target_triwulan2']);
                            $a20=clean($rr1['target_triwulan3']);
                            $a21=clean($rr1['target_triwulan4']);
                            $a22=clean($rr1['realisasi_triwulan1']);
                            $a23=clean($rr1['realisasi_triwulan2']);
                            $a24=clean($rr1['realisasi_triwulan3']);
                            $a25=clean($rr1['realisasi_triwulan4']);
                            $a26=clean($rr1['keterangan_triwulan1']);
                            $a27=clean($rr1['keterangan_triwulan2']);
                            $a28=clean($rr1['keterangan_triwulan3']);
                            $a29=clean($rr1['keterangan_triwulan4']);

                            $a30=clean($rr1['penjelasan_formulasi']);
                            $a31=clean($rr1['sumber_data']);
                            $a32=clean($rr1['indikator_pk']);
                            $a34=clean($rr1['target_akhir_renstra']);

                            $dt=date("Y-m-d H:i:s");

                            $sqlstr  ="INSERT INTO tindikator(";
                            $sqlstr .="id_instansi,nomor_misi,nomor_tujuan,nomor_sasaran,";
                            $sqlstr .="nomor_indikator,indikator,satuan,indikator_kinerja_utama,";
                            $sqlstr .="target_rpjm1,target_rpjm2,target_rpjm3,target_rpjm4,target_rpjm5,";
                            $sqlstr .="target_tahun_sebelumnya,realisasi_tahun_sebelumnya,target,realisasi,";
                            $sqlstr .="keterangan,analisis,tipe_formula,target_akhir_renstra,";
                            $sqlstr .="target_triwulan1,target_triwulan2,target_triwulan3,target_triwulan4,";
                            $sqlstr .="realisasi_triwulan1,realisasi_triwulan2,realisasi_triwulan3,realisasi_triwulan4,";
                            $sqlstr .="keterangan_triwulan1,keterangan_triwulan2,keterangan_triwulan3,keterangan_triwulan4,";
                            $sqlstr .="penjelasan_formulasi,sumber_data,indikator_pk";
                            $sqlstr .=") VALUES(";
                            $sqlstr .="'$sk4',$a1,$a2,$a3,";
                            $sqlstr .="$nomor,'$a4','$a5',$a6,";
                            $sqlstr .="$a7,$a8,$a9,$a10,$a11,";
                            $sqlstr .="$a13,$a15,$a12,$a14,";
                            $sqlstr .="'$a16','$a17',$a33,$a34,";
                            $sqlstr .="$a18,$a19,$a20,$a21,";
                            $sqlstr .="$a22,$a23,$a24,$a25,";
                            $sqlstr .="'$a26','$a27','$a28','$a29',";
                            $sqlstr .="'$a30','$a31',$a32";
                            $sqlstr .=")";
                            mysql_query($sqlstr) or die(mysql_error());
                        }
                        break;
                    default: break;
                }*/

                Yii::app()->user->setFlash('pesan', "Data sudah di gabungkan!");
                $this->redirect(array('index'));
            }
        }

        Yii::app()->controller->render('index',array('model'=>$model));

       // $this->render('index');
	}


}