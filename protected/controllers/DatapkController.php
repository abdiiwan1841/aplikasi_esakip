<?php

class DatapkController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
    public $layout='backend';

    public function beforeAction()
    {
        if (Yii::app()->user->isGuest )
            $this->redirect(Yii::app()->createUrl('login'));

        return true;
    }

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete + deletepagu', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','showpk','viewpagu','showpkdata'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','createpagu','updatepagu'),
                'users'=>array('@'),
                'expression'=>'Yii::app()->user->isAllowAddEdit()',
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','deletepagu'),
                'users'=>array('@'),
                'expression'=>'Yii::app()->user->isAllowDelete()',
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>Perjanjian::model()->findByPk($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Perjanjian();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Perjanjian'])) {
			$model->attributes=$_POST['Perjanjian'];

			if ($model->save()) {
				//$this->redirect(array('view','id'=>$model->ikuid));
                $this->redirect(array('index'));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}



	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=Perjanjian::model()->findByPk($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Perjanjian'])) {

            $model->attributes=$_POST['Perjanjian'];
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if (Yii::app()->request->isPostRequest) {
			// we only allow deletion via POST request
			//$this->loadModel($id)->delete();

            //$mdl = $this->loadModel($id);
            //$mdl->delete();
            $model=Perjanjian::model()->findByPk($id);
            $model->delete();
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if (!isset($_GET['ajax'])) {
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
			}
		} else {
			throw new CHttpException(400,'Permintaan tidak valid..!!.');
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
        $model=new Perjanjian('search');
        $model->unsetAttributes();  // clear any default values

        $model2=new Anggaranpk('search');
        $model2->unsetAttributes();  // clear any default values

        $data["idx"]="";
        if (isset($_GET['xid'])) {
            $data["idx"]=$_GET['xid'];
            $model->pejabatid=$_GET['xid'];
            $model2->pejabatid=$_GET['xid'];
        } else {
            $model->pejabatid=0;
            $model2->pejabatid=0;
        }

        $data["perjanjian"]=$model;
        $data["anggaran"]=$model2;


        $this->render('index',$data);
	}

    public function actionCreatepagu()
    {
        $model=new Anggaranpk();

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Anggaranpk'])) {
            $model->attributes=$_POST['Anggaranpk'];

            if ($model->save()) {
                //$this->redirect(array('view','id'=>$model->ikuid));
                $this->redirect(array('index'));
            }
        }

        $this->render('createpagu',array(
            'model'=>$model,
        ));
    }

    public function actionUpdatepagu($id)
    {
        $model=Anggaranpk::model()->findByPk($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Anggaranpk'])) {
            $model->attributes=$_POST['Anggaranpk'];
            if ($model->save()) {
                $this->redirect(array('viewpagu','id'=>$model->id));
            }
        }

        $this->render('updatepagu',array(
            'model'=>$model,
        ));
    }

    public function actionViewpagu($id)
    {
        $this->render('viewpagu',array(
            'model'=>Anggaranpk::model()->findByPk($id),
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDeletepagu($id)
    {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            //$this->loadModel($id)->delete();

            $mdl = Anggaranpk::model()->findByPk($id);
            $mdl->delete();
            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
            }
        } else {
            throw new CHttpException(400,'Permintaan tidak valid..!!.');
        }
    }



	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Dataiku('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Dataiku'])) {
			$model->attributes=$_GET['Dataiku'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Perjanjian the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Perjanjian::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}


    public function actionShowpk()
    {

        $filetmplate = Yii::getPathOfAlias('webroot').'/static/template/FORMAT_PK_KEPALA_OPD.docx';
        $foldertrgt = Yii::getPathOfAlias('webroot').'/static/datapk/';

        Yii::import('ext.phpword.XPHPWord');
        $phpWord = XPHPWord::createPHPWord();
        $document = $phpWord->loadTemplate($filetmplate);

        $row = DataPemda::model()->find("kode='PEMDA'");
        $namapemda = $row->keterangan;

        $row = DataPemda::model()->find("kode='KPL'");
        $namakplpemda = $row->keterangan;

        $row = DataPemda::model()->find("kode='JBTN'");
        $namajbtnpemda = $row->keterangan;

        $idopd= Yii::app()->user->getOpd();
        $row = Opd::model()->find("id_instansi=$idopd");
        $namaopd= strtoupper($row->nama_instansi);

        $row = Pejabat::model()->find("id_instansi=$idopd and parent_id=0");
        $namakplopd = $row->nama_pejabat;
        $namajbtnopd= $row->nama_jabatan;


        $document->setValue('nama_pemda', $namapemda);
        $document->setValue('nama_kepala_daerah', $namakplpemda);
        $document->setValue('jabatan_kepala_daerah', $namajbtnpemda);

        $document->setValue('opd', $namaopd);
        $document->setValue('tahun', Yii::app()->user->getTahun());

        $document->setValue('nama_kepala_opd', $namakplopd);
        $document->setValue('jabatan_kepala_opd', $namajbtnopd);

        $result = Sasaran::model()->findAll("id_instansi=$idopd");

        $document->cloneRow('rowNumber', count($result));
        $no=1;
        foreach ($result  as $rec)
        {
            $document->setValue('rowNumber#'.$no, $no);
            $document->setValue('rowSasaran#'.$no, htmlspecialchars($rec->sasaran));

            $criteria = new CDbCriteria();
            $criteria->addCondition("id_instansi=:idx and nomor_sasaran=:ids and nomor_misi=:idm and nomor_tujuan=:idt");
            $criteria->params = array(':idx' => $rec->id_instansi,':ids' => $rec->nomor_sasaran,
                                    ':idm' => $rec->nomor_misi,':idt' => $rec->nomor_tujuan);
            $rsl=Indikator::model()->findAll($criteria);
            $ketIndi="";
            $trgIndi="";
            foreach ($rsl  as $reci)
            {
                $ketIndi .= $reci->indikator."\r\n";
                $trgIndi .= $reci->target." ".$reci->satuan."\r\n";
            }

            $document->setValue('rowIndikator#'.$no, htmlspecialchars($ketIndi));
            $document->setValue('rowTarget#'.$no, htmlspecialchars($trgIndi));
            $no++;
        }

        $oDBC = new CDbCriteria();
        $oDBC->join = "INNER JOIN tpejabat a ON t.pejabatid = a.id and a.parent_id=0 and a.id_instansi=$idopd ";
        $result = Anggaranpk::model()->findAll($oDBC);

        $document->cloneRow('rowNo', count($result));
        $no=1;
        foreach ($result  as $rec) {
            $document->setValue('rowNo#' . $no, $no);
            $document->setValue('rowProgram#' . $no, htmlspecialchars($rec->nama_program));
            $document->setValue('rowJml#' . $no, htmlspecialchars($rec->pagu_anggaran));
            $document->setValue('rowKet#' . $no, htmlspecialchars($rec->sumber_dana));
            $no++;
        }


    $filename = time().".docx";
    /*$section = $phpWord->createSection();

    $section->addText('Hell Wordl!');

    header('Content-Type: application/vnd.ms-word');
    header('Content-Disposition: attachment;filename="'.$filename.'.docx"');
    header('Cache-Control: max-age=0');

    $objWriter = PHPWord_IOFactory::createWriter($phpWord, 'Word2007');
    $objWriter->save('php://output');
    unset($this->objWriter);*/
    $document->save($foldertrgt.$filename);
    $fullpath = $foldertrgt.$filename;
    $urlfile =Yii::app()->baseUrl.'static/datapk/'. $filename;
    header('Content-Type: application/vnd.ms-word');
    header('Content-Disposition: attachment;filename="'.$urlfile.'"');
    header('Cache-Control: max-age=0');
    header('Content-Length: ' . filesize($fullpath));
    readfile($fullpath);
    Yii::app()->end();
    exit();
}

    public function actionShowpkdata()
    {

        if ( isset($_GET['i']) && count($_GET) > 1 ) {
            $idpjbt =$_GET['i'];
            $filetmplate = Yii::getPathOfAlias('webroot') . '/static/template/FORMAT_PK_ATASAN_STAFF.docx';
            $foldertrgt = Yii::getPathOfAlias('webroot') . '/static/datapk/';

            Yii::import('ext.phpword.XPHPWord');
            $phpWord = XPHPWord::createPHPWord();
            $document = $phpWord->loadTemplate($filetmplate);

            $row = DataPemda::model()->find("kode='PEMDA'");
            $namapemda = $row->keterangan;

            $idopd = Yii::app()->user->getOpd();
            $row = Opd::model()->find("id_instansi=$idopd");
            $namaopd = strtoupper($row->nama_instansi);

            $row = Pejabat::model()->find("id_instansi=$idopd and id=$idpjbt");
            $namastaff = $row->nama_pejabat;
            $namajbtnstaff = $row->nama_jabatan;
            $idatasan=$row->parent_id;

            $row = Pejabat::model()->find("id_instansi=$idopd and id=$idatasan");
            $namaatasan = $row->nama_pejabat;
            $namajbtnatasan = $row->nama_jabatan;


            $document->setValue('nama_pemda', $namapemda);

            $document->setValue('nama_staff', $namastaff);
            $document->setValue('jabatan_staff', $namajbtnstaff);

            $document->setValue('opd', $namaopd);
            $document->setValue('tahun', Yii::app()->user->getTahun());

            $document->setValue('nama_atasan', $namaatasan);
            $document->setValue('jabatan_atasan', $namajbtnatasan);

            $result = Perjanjian::model()->findAll("pejabatid=$idpjbt");

            $document->cloneRow('rowNumber', count($result));
            $no = 1;
            foreach ($result as $rec) {
                $document->setValue('rowNumber#' . $no, $no);
                $document->setValue('rowSasaran#' . $no, htmlspecialchars($rec->sasaran_strategis));

                $document->setValue('rowIndikator#' . $no, htmlspecialchars($rec->indikator));
                $document->setValue('rowTarget#' . $no, htmlspecialchars($rec->target));
                $no++;
            }

            $oDBC = new CDbCriteria();
            $oDBC->join = "INNER JOIN tpejabat a ON t.pejabatid = a.id and a.id_instansi=$idopd ";
            $oDBC->addCondition("pejabatid=:idx");
            $oDBC->params = array(':idx' => $idpjbt);

            $result = Anggaranpk::model()->findAll($oDBC);

            $document->cloneRow('rowNo', count($result));
            $no=1;
            foreach ($result  as $rec) {
                $document->setValue('rowNo#' . $no, $no);
                $document->setValue('rowProgram#' . $no, htmlspecialchars($rec->nama_program));
                $document->setValue('rowJml#' . $no, htmlspecialchars($rec->pagu_anggaran));
                $document->setValue('rowKet#' . $no, htmlspecialchars($rec->sumber_dana));
                $no++;
            }

            $filename = time() . ".docx";

            $document->save($foldertrgt . $filename);
            $fullpath = $foldertrgt . $filename;
            $urlfile = Yii::app()->baseUrl . 'static/datapk/' . $filename;
            header('Content-Type: application/vnd.ms-word');
            header('Content-Disposition: attachment;filename="' . $urlfile . '"');
            header('Cache-Control: max-age=0');
            header('Content-Length: ' . filesize($fullpath));
            readfile($fullpath);
            Yii::app()->end();
            exit();
        }
    }
	/**
	 * Performs the AJAX validation.
	 * @param Dataiku $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='dataiku-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}