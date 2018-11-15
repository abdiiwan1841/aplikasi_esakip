<?php

class LoaddataController extends Controller
{
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
        $this->redirect('home');
	}

    public function actionLoadOpd()
    {
        $data=OPD::model()->findAll();

        $data=CHtml::listData($data,'id_instansi','nama_instansi');

        echo "<option value=''>--Pilih OPD--</option>";
        foreach($data as $value=>$nama_instansi)
            echo CHtml::tag('option', array('value'=>$value),CHtml::encode($nama_instansi),true);
    }

    public function actionLoadMisi()
    {
        $data=Misi::model()->findAll('idinstansi=:idinstansi',
            array(':idinstansi'=>(string) $_POST['OPD']));

        $data=CHtml::listData($data,'nomisi','misi');

        echo "<option value=''>--Pilih Misi--</option>";
        foreach($data as $value=>$misi)
            echo CHtml::tag('option', array('value'=>$value),CHtml::encode($value.". ".$misi),true);
    }

    public function actionLoadTujuan()
    {
        $data=Tujuan::model()->findAll(
            'id_instansi=:idinstansi and nomor_misi=:nomormisi',
            array(':idinstansi'=>(string) $_POST['OPD'],':nomormisi'=>(int) $_POST['NoMisi'],));

        $data=CHtml::listData($data,'nomor_tujuan','tujuan');

        echo "<option value=''>--Pilih Tujuan--</option>";
        foreach($data as $value=>$tujuan)
            echo CHtml::tag('option', array('value'=>$value),CHtml::encode($value.". ".$tujuan),true);
    }

    public function actionLoadSasaranEselonDua()
    {
        $data=Sasaran::model()->findAll(
            'id_instansi=:idinstansi and nomor_misi=:nomormisi and nomor_tujuan=:NoTujuan',
            array(':idinstansi'=>(string) $_POST['OPD'],':nomormisi'=>(int) $_POST['NoMisi'],':NoTujuan'=>(int) $_POST['NoTujuan'],)
        );

        $data=CHtml::listData($data,'nomor_sasaran','sasaran');

        echo "<option value=''>--Pilih Sasaran--</option>";
        foreach($data as $value=>$sasaran)
            echo CHtml::tag('option', array('value'=>$value),CHtml::encode($value.". ".$sasaran),true);;
    }

    public function actionLoadSasaranEselonTiga()
    {
        $data=SasaranEselonTiga::model()->findAll(
            'id_instansi=:idinstansi and nomor_misi=:nomormisi and nomor_tujuan=:NoTujuan',
            array(':idinstansi'=>(string) $_POST['OPD'],
                  ':nomormisi'=>(int) $_POST['NoMisi'],
                  ':NoTujuan'=>(int) $_POST['NoTujuan'],
            ));

        $data=CHtml::listData($data,'nomor_sasaran','sasaran');

        echo "<option value=''>--Pilih Sasaran--</option>";
        foreach($data as $value=>$sasaran)
            echo CHtml::tag('option', array('value'=>$value),CHtml::encode($value.". ".$sasaran),true);;
    }

    public function actionLoadSasaranEselonEmpat()
    {
        $data=SasaranEselonEmpat::model()->findAll(
            'id_instansi=:idinstansi and nomor_misi=:nomormisi and nomor_tujuan=:NoTujuan',
            array(':idinstansi'=>(string) $_POST['OPD'],
                  ':nomormisi'=>(int) $_POST['NoMisi'],
                  ':NoTujuan'=>(int) $_POST['NoTujuan'],
            ));

        $data=CHtml::listData($data,'nomor_sasaran','sasaran');

        echo "<option value=''>--Pilih Sasaran--</option>";
        foreach($data as $value=>$sasaran)
            echo CHtml::tag('option', array('value'=>$value),CHtml::encode($value.". ".$sasaran),true);;
    }

    public function actionLoadJabatanEselonTiga()
    {
        $data=Pejabat::model()->findAll(
            'id_instansi=:idinstansi and parent_id=:parent_id',
            array(':idinstansi'=>(string) $_POST['OPD'],
                  ':parent_id'=> 1,
            ));

        $data=CHtml::listData($data,'id','nama_jabatan');

        echo "<option value=''>--Pilih Jabatan--</option>";
        foreach($data as $value=>$jabatan)
            echo CHtml::tag('option', array('value'=>$value),CHtml::encode($value.". ".$jabatan),true);;
    }

    public function actionLoadJabatanEselonEmpat()
    {
        $data=Pejabat::model()->findAll(
            'id_instansi=:idinstansi and parent_id=:parent_id',
            array(':idinstansi'=>(string) $_POST['OPD'],
                  ':parent_id'=> (int) $_POST['idpejabat_eselon_tiga'],
            ));

        $data=CHtml::listData($data,'id','nama_jabatan');

        echo "<option value=''>--Pilih Jabatan--</option>";
        foreach($data as $value=>$jabatan)
            echo CHtml::tag('option', array('value'=>$value),CHtml::encode($value.". ".$jabatan),true);;
    }

    public function actionLoadJabatanIndikatorEselonEmpat()
    {
        $data=Pejabat::model()->findAll(
            'id_instansi=:idinstansi and parent_id != :nol and parent_id != :satu',
            array(':idinstansi'=>(string) $_POST['OPD'],
                  ':parent_id'=> (int) $_POST['idpejabat_eselon_empat'],
                  ':nol'=> 0,
                  ':satu'=> 1,
            ));

        $data=CHtml::listData($data,'id','nama_jabatan');

        echo "<option value=''>--Pilih Jabatan--</option>";
        foreach($data as $value=>$jabatan)
            echo CHtml::tag('option', array('value'=>$value),CHtml::encode($value.". ".$jabatan),true);;
    }

    public function actionLoadIndikatorTujuan()
    {
        $data=Indikatortujuan::model()->findAll(
            'id_instansi=:idinstansi and nomor_misi=:nomormisi and nomor_tujuan=:NoTujuan',
            array(':idinstansi'=>(string) $_POST['OPD'],':nomormisi'=>(int) $_POST['NoMisi'],':NoTujuan'=>(int) $_POST['NoTujuan'],));

        $data=CHtml::listData($data,'nomor_indikator','indikator');

        echo "<option value=''>--Pilih Indikator--</option>";
        foreach($data as $value=>$indikator)
            echo CHtml::tag('option', array('value'=>$value),CHtml::encode($value.". ".$indikator),true);

    }

    public function actionLoadIndikatorProgramEselonTiga()
    {
        $data=IndikatorProgramEselonTiga::model()->findAll(
            'id_instansi=:idinstansi and nomor_misi=:nomormisi and nomor_tujuan=:NoTujuan and nomor_sasaran=:NoSasaran and nomor_indikator=:NoIndikator and nomor_program=:NoProgram and idpejabat_eselon_tiga=:idpejabat_eselon_tiga',
            array(':idinstansi'=>(string) $_POST['OPD'],
                  ':nomormisi'=>(int) $_POST['NoMisi'],
                  ':NoTujuan'=>(int) $_POST['NoTujuan'],
                  ':NoSasaran'=>(int) $_POST['NoSasaran'],
                  ':NoIndikator'=>(int) $_POST['NoIndikator'],
                  ':NoProgram'=>(int) $_POST['NoProgram'],
                  ':idpejabat_eselon_tiga'=>(int) $_POST['idpejabat_eselon_tiga'],
                ));

        $data=CHtml::listData($data,'nomor_indikator','indikator');

        echo "<option value=''>--Pilih Indikator--</option>";
        foreach($data as $value=>$indikator)
            echo CHtml::tag('option', array('value'=>$value),CHtml::encode($value.". ".$indikator),true);

    }

    public function actionLoadKegiatanEselonEmpat()
    {
        $data=KegiatanEselonEmpat::model()->findAll(
            'id_instansi=:idinstansi and nomor_misi=:nomormisi and nomor_tujuan=:NoTujuan and nomor_sasaran=:NoSasaran and nomor_indikator=:NoIndikator and nomor_program=:NoProgram and nomor_indikator_program=:NoIndikatorProgram and idpejabat_eselon_tiga=:idpejabat_eselon_tiga and idpejabat_eselon_empat=:idpejabat_eselon_empat',
            array(':idinstansi'=>(string) $_POST['OPD'],
                  ':nomormisi'=>(int) $_POST['NoMisi'],
                  ':NoTujuan'=>(int) $_POST['NoTujuan'],
                  ':NoSasaran'=>(int) $_POST['NoSasaran'],
                  ':NoIndikator'=>(int) $_POST['NoIndikator'],
                  ':NoProgram'=>(int) $_POST['NoProgram'],
                  ':idpejabat_eselon_tiga'=>(int) $_POST['idpejabat_eselon_tiga'],
                  ':NoIndikatorProgram'=>(int) $_POST['NoIndikatorProgram'],
                  ':idpejabat_eselon_empat'=>(int) $_POST['idpejabat_eselon_empat'],
                ));

        $data=CHtml::listData($data,'nomor_kegiatan','kegiatan');

        echo "<option value=''>--Pilih Indikator--</option>";
        foreach($data as $value=>$indikator)
            echo CHtml::tag('option', array('value'=>$value),CHtml::encode($value.". ".$indikator),true);

    }

    public function actionLoadSasaran()
    {
        $data=Sasaran::model()->findAll(
            'id_instansi=:idinstansi and nomor_misi=:nomormisi and nomor_tujuan=:nomortujuan',
            array(':idinstansi'=>(string) $_POST['OPD'],
                    ':nomormisi'=>(int) $_POST['NoMisi'],
                    ':nomortujuan'=>(int) $_POST['NoTujuan'],
                ));

        $data=CHtml::listData($data,'nomor_sasaran','sasaran');

        echo "<option value=''>--Pilih Sasaran--</option>";
        foreach($data as $value=>$sasaran)
            echo CHtml::tag('option', array('value'=>$value),CHtml::encode($value.". ".$sasaran),true);
    }
    

    public function actionLoadIndikator()
    {
        $data=Indikator::model()->findAll(
            'id_instansi=:idinstansi and nomor_misi=:nomormisi and nomor_tujuan=:nomortujuan and nomor_sasaran=:nomorsasaran',
            array(':idinstansi'=>(string) $_POST['OPD'],
                ':nomormisi'=>(int) $_POST['NoMisi'],
                ':nomortujuan'=>(int) $_POST['NoTujuan'],
                ':nomorsasaran'=>(int) $_POST['NoSasaran'],
            ));

        $data=CHtml::listData($data,'nomor_indikator','indikator');

        echo "<option value=''>--Pilih Indikator--</option>";
        foreach($data as $value=>$indikator)
            echo CHtml::tag('option', array('value'=>$value),CHtml::encode($value.". ".$indikator),true);
    }

    public function actionLoadProgram()
    {
        $data=Program::model()->findAll(
            'id_instansi=:idinstansi and nomor_misi=:nomormisi and nomor_tujuan=:nomortujuan and nomor_sasaran=:nomorsasaran and nomor_indikator=:nomorindikator',
            array(':idinstansi'=>(string) $_POST['OPD'],
                ':nomormisi'=>(int) $_POST['NoMisi'],
                ':nomortujuan'=>(int) $_POST['NoTujuan'],
                ':nomorsasaran'=>(int) $_POST['NoSasaran'],
                ':nomorindikator'=>(int) $_POST['NoIndikator'],
            ));

        $data=CHtml::listData($data,'nomor_program','program');

        echo "<option value=''>--Pilih Program--</option>";
        foreach($data as $value=>$program)
            echo CHtml::tag('option', array('value'=>$value),CHtml::encode($value.". ".$program),true);
    }

    public function actionProgram()
    {
        $data=Program::model()->findAll(
            'id_instansi=:idinstansi',
            array(':idinstansi'=>(string) $_POST['OPD'],
            ));

        $data=CHtml::listData($data,'nomor_program','program');

        echo "<option value=''>--Pilih Program--</option>";
        foreach($data as $value=>$program)
            echo CHtml::tag('option', array('value'=>$value),CHtml::encode($value.". ".$program),true);
    }

    public function actionTabel(){
        $iku = $_POST['iku'];
        $opd = $_POST['opd'];
        $program = $_POST['program'];
        $kegiatan = $_POST['kegiatan'];
       
        $query = Yii::app()->db->createCommand()
            ->select('tkg.kegiatan, tkg.pagu_anggaran, to.nama_instansi, ind.indikator, tpr.program')
            ->from('tkegiatan tkg')
            ->join('topd to', 'tkg.id_instansi=to.id_instansi')
            ->join('indikatorprov ind', 'tkg.nomor_indikator_provinsi=ind.indikatorid')
            ->join('tprogram tpr', 'tkg.nomor_program=tpr.nomor_program')
            ->where('tkg.nomor_indikator_provinsi=:a2 and tkg.id_instansi=:a1 and tkg.nomor_program=:a3 and tkg.nomor_kegiatan=:tt',array('a2'=>$iku,'a1'=>$opd,'a3'=>$program,'tt'=>$kegiatan))
            // ->where('tkg.id_instansi=:a1 AND tkg.nomor_indikator_provinsi=:a2 AND tkg.nomor_program=:a3 AND tkg.nomor_kegiatan=:a4',array('a1'=>$opd,'a2'=>$iku,'a3'=>$program,'a4'=>$kegiatan))
            ->limit(5)
            ->queryAll();
        $data ['query'] = $query;
        $this->render('tabel',$data);
    }

    public function actionTabel2(){
        $iku = $_POST['IKU'];
        $opd = $_POST['OPD'];
        $program = $_POST['NoProgram'];
        $kegiatan = $_POST['kegiatan'];

        $test = Yii::app()->db->createCommand()
            ->select('*')
            ->from('tkegiatan tkg')
            ->join('topd to', 'tkg.id_instansi=to.id_instansi')
            ->join('indikatorprov ind', 'tkg.nomor_indikator_provinsi=ind.nomor_indikator')
            ->join('tprogram tpr', 'tkg.nomor_program=tpr.nomor_program')
            // ->where(['and',['tkg.id_instansi'=>$opd],['tkg.nomor_indikator_provinsi'=>$iku],['tkg.nomor_program'=>$program],['tkg.nomor_kegiatan'=>$kegiatan]])
            ->where('tkg.id_instansi=:a1 and tkg.nomor_indikator_provinsi=:a2 and tkg.nomor_program=:a3 and tkg.nomor_kegiatan=:a4',array('a1'=>$opd,'a2'=>$iku,'a3'=>$program,'a4'=>$kegiatan))
            ->queryAll();

            echo '<pre>';
            print_r($test);
            echo '</pre>';die();


		// $data=Kegiatan::model()->findAll(
        //     'id_instansi=:idinstansi and nomor_program=:nomorprogram',
        //     array(':idinstansi'=>(string) $_POST['OPD'],
        //             ':nomorprogram'=>(int) $_POST['NoProgram'],
        //     ));

        // $data=CHtml::listData($data,'nomor_kegiatan','kegiatan');
    }

    public function actionKegiatan()
    {
        $data=Kegiatan::model()->findAll(
            'id_instansi=:idinstansi and nomor_program=:nomorprogram',
            array(':idinstansi'=>(string) $_POST['OPD'],
                    ':nomorprogram'=>(int) $_POST['NoProgram'],
            ));

        $data=CHtml::listData($data,'nomor_kegiatan','kegiatan');

        echo "<option value=''>--Pilih Kegiatan--</option>";
        foreach($data as $value=>$kegiatan)
            echo CHtml::tag('option', array('value'=>$value),CHtml::encode($value.". ".$kegiatan),true);
    }

    public function actionLoadProgramEselonTiga()
    {
        $data=ProgramEselonTiga::model()->findAll(
            'id_instansi=:idinstansi and nomor_misi=:nomormisi and nomor_tujuan=:nomortujuan and nomor_sasaran=:nomorsasaran',
            array(':idinstansi'=>(string) $_POST['OPD'],
                ':nomormisi'=>(int) $_POST['NoMisi'],
                ':nomortujuan'=>(int) $_POST['NoTujuan'],
                ':nomorsasaran'=>(int) $_POST['NoSasaran'],
            ));

        $data=CHtml::listData($data,'nomor_program','program');

        echo "<option value=''>--Pilih Program--</option>";
        foreach($data as $value=>$program)
            echo CHtml::tag('option', array('value'=>$value),CHtml::encode($value.". ".$program),true);
    }

    public function actionLoadKegiatan()
    {
        $data=Kegiatan::model()->findAll(
            'id_instansi=:idinstansi and nomor_misi=:nomormisi and nomor_tujuan=:nomortujuan and 
                    nomor_sasaran=:nomorsasaran and nomor_indikator=:nomorindikator and nomor_program=:nomorprogram',
            array(':idinstansi'=>(string) $_POST['OPD'],
                ':nomormisi'=>(int) $_POST['NoMisi'],
                ':nomortujuan'=>(int) $_POST['NoTujuan'],
                ':nomorsasaran'=>(int) $_POST['NoSasaran'],
                ':nomorindikator'=>(int) $_POST['NoIndikator'],
                ':nomorprogram'=>(int) $_POST['NoProgram'],
            ));

        $data=CHtml::listData($data,'nomor_kegiatan','kegiatan');

        echo "<option value=''>--Pilih Kegiatan--</option>";
        foreach($data as $value=>$kegiatan)
            echo CHtml::tag('option', array('value'=>$value),CHtml::encode($value.". ".$kegiatan),true);
    }

    public function actionGetOpd()
    {

        echo "<option value=''>Pilih OPD / Instansi</option>";
        $dsn = "mysql:host=".Yii::app()->params['dbhost'].";dbname=db".$_POST['thn'];
        $connection=new CDbConnection($dsn,Yii::app()->params['dbuser'],Yii::app()->params['dbpwd']);
        $connection->active=true;
        $qry = "SELECT * FROM topd where aktif=1 order by 1 ASC";
        $resultAsal= $connection->createCommand($qry)->queryAll();
        foreach ($resultAsal as $rr1){
            echo CHtml::tag('option', array('value'=>$rr1["id_instansi"]),CHtml::encode($rr1["nama_instansi"]),true);
        }
        $connection->active=false;
    }

    public function actionLoadPejabat()
    {
        $data=Pejabat::model()->findAll('idinstansi=:idinstansi',
            array(':idinstansi'=>(string) $_POST['OPD']));

        $data=CHtml::listData($data,'id','nama_pejabat');

        echo "<option value=''>--Pilih Atasan--</option>";
        foreach($data as $value=>$nama_pejabat)
            echo CHtml::tag('option', array('value'=>$value),CHtml::encode($value.". ".$nama_pejabat),true);
    }



}