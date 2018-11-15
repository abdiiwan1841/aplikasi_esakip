<?php

class LaporanController extends Controller
{

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
        $this->layout = "backend";
        $data["title"]="Laporan Pengukuran Kinerja";
        $data["kriteria"]=true;
        $this->render('index',$data);
    }
    
    public function actionIndexPohonKinerja()
	{
        $this->layout = "backend";
        $data["title"]="Upload File Pohon Kinerja";
        $data["kriteria"]=false;
        $data["pilihan"]=3;
        $model=new FilePohonKinerja('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['FilePohonKinerja'])) {
        $model->attributes=$_GET['FilePohonKinerja'];
        }

        $this->render('index_pohon_kinerja', array(
            'model'=>$model,
            'data'=> $data,
            ));
    }

    public function actionIndexCascading()
	{
        $this->layout = "backend";
        $data["title"]="Upload File Cascading";
        $data["kriteria"]=false;
        $data["pilihan"]=3;
        $model=new FileCascading('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['FileCascading'])) {
            $model->attributes=$_GET['FileCascading'];
        }

        $this->render('index_cascading', array(
            'model'=>$model,
            'data'=> $data,
            ));
    }
    
    public function actionViewDataFilePohonKinerja($id)
	{
        $this->layout = "backend";
		$this->render('view_file_pohon_kinerja',array(
			'model'=>$this->loadModelFilePohonKinerja($id),
		));
    }
    
    public function actionViewDataFileCascading($id)
	{
        $this->layout = "backend";
		$this->render('view_file_cascading',array(
			'model'=>$this->loadModelFileCascading($id),
		));
	}

    public function actionLap1()
    {
        $this->layout = "backend";
        $data["title"]="Laporan Pengukuran Kinerja";
        $data["kriteria"]=true;
        $data["pilihan"]=1;
        $this->render('index',$data);
    }

    public function actionLap2()
    {
        $this->layout = "backend";
        $data["kriteria"]=true;
        $data["pilihan"]=2;
        $data["title"]="Laporan Realisasi Kinerja-Anggaran";
        $this->render('index',$data);
    }
    public function actionLap3()
    {
        $this->layout = "backend";
        $data["title"]="Laporan Efisiensi Penggunaan Sumber Daya";
        $data["kriteria"]=false;
        $data["pilihan"]=3;
        $this->render('laporanefisiensi',$data);
    }
    public function actionLap4()
    {
        $this->layout = "backend";
        $data["title"]="Laporan Pengukuran Kinerja Kegiatan/Aktivitas";
        $data["kriteria"]=true;
        $data["pilihan"]=4;
        $this->render('index',$data);
    }
    public function actionLap5()
    {
        $this->layout = "backend";
        $data["title"]="Laporan Ukur Kinerja Indikator/Program/Kegiatan/Aktivitas";
        $data["kriteria"]=false;
        $data["pilihan"]=5;
        $this->render('index',$data);
    }

    public function actionLap6()
    {
        $this->layout = "backend";
        $model=new Opd('summary');
        $this->render('rekapopd',array(
            'model'=>$model,
        ));
    }

    public function actionTest(){
        $data["title"]="Laporan Cascading";
        $this->render('test',$data);
    }
    
    public function actionCascading(){
        $this->layout = "backend";
        $id_user =Yii::app()->user->getaidi();
        $uzer=Users::model()->find('usrxid=:usrxid', array('usrxid' => $id_user));
        $id_role = $uzer['id_role'];
        $model = new Opd;
        if($id_role == 4 || $id_role == 0){
            $data["title"]="Laporan Cascading ALL";
            $data['opd'] = $allArs = Opd::model()->findAll();
            $this->render('castest',array(
                'model' => $model,
                'title' => $data['title'],
            ));
        }else {
            $data["title"]="Laporan Cascading";
            $this->render('cascading',$data);
        }
    }

     public function actionPohonkinerja(){
         $this->layout = "backend";
           $data["title"]="Laporan Pohon Kinerja";
      
         $this->render('pohonkinerja',$data);

    }

    public function actionLap7()
    {
        $this->layout = "backend";
        $this->render('index');
    }

    public function actionShowlaporan()
    {
        // $this->layout = null;
        if ( isset($_GET['opt']) && isset($_GET['tr']) && count($_GET) > 1 ) {
            $data['idLap']=$_GET["opt"];
            $data['trgt']=$_GET["tr"];
            $data['triwulan']=$_GET["f"];
            $trw=($data['triwulan']<>0)? 1 : 0;
            if ($data['trgt']==2) {
                if ($data['idLap']==3 ) {
                    $mPDF1 = Yii::app()->ePdf->mpdf('', 'LEGAL',
                        11, // Sets the default document font size in points (pt)
                        '', // Sets the default font-family for the new document.
                        15, // margin_left. Sets the page margins for the new document.
                        15, // margin_right
                        16, // margin_top
                        16, // margin_bottom
                        9, // margin_header
                        9, // margin_footer
                        'L');
                } else {
                    $mPDF1 = Yii::app()->ePdf->mpdf('', 'A2',
                        11, // Sets the default document font size in points (pt)
                        '', // Sets the default font-family for the new document.
                        15, // margin_left. Sets the page margins for the new document.
                        15, // margin_right
                        16, // margin_top
                        16, // margin_bottom
                        9, // margin_header
                        9, // margin_footer
                        'L');
                }
                # Load a stylesheet
                $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot') . '/static/css/pdf.css');
                $mPDF1->WriteHTML($stylesheet, 1);

                # renderPartial (only 'view' of current controller)
                $mPDF1->WriteHTML($this->renderPartial('lap'.$data['idLap'].$trw, $data, true));

                # Outputs ready PDF
                $mPDF1->Output();

            } else
            {
                $this->renderPartial('lap' . $data['idLap'].$trw, $data);
            }
        } else
        {
            echo "<script>window.close()</script>";
        }

    }

    public function actionexportpdfcascading()
    {
        $this->layout = null;
        $mPDF1 = Yii::app()->ePdf->mpdf('c', 'A4-L');

        $data = '';

        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot') . '/static/css/pdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);

        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($this->renderPartial('laporanpdf_cascading',$data, true));

        # Outputs ready PDF
        $mPDF1->Output();
    }

    public function actionexportexcelcascading()
    {
        $this->layout = null;
        $data['filename'] = 'LaporanExcel_Cascading_'.date('dMy');
        $cek = $this->renderPartial('laporanexcel_cascading', $data, true);
        echo $cek;
    }

    public function actionexportpdfcascading_all($id)
    {
        $this->layout = null;
        $mPDF1 = Yii::app()->ePdf->mpdf('c', 'A4-L');

        $data["id_instansi"] = $id;

        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot') . '/static/css/pdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);

        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($this->renderPartial('laporanpdf_cascading_all',$data, true));

        # Outputs ready PDF
        $mPDF1->Output();
    }

    public function actionexportexcelcascading_all($id)
    {
        $this->layout = null;
        $data["id_instansi"] = $id;
        $data['filename'] = 'LaporanExcel_Cascading_'.date('dMy');
        $cek = $this->renderPartial('laporanexcel_cascading_all', $data, true);
        echo $cek;
    }

    public function actionsimpanfilepohonkinerja()
    {
        $data = '';
        $this->renderPartial('gambar_pohonkinerja',$data,true);
    }

    public function actionUploadFilePohonKinerja()
    {
        $this->layout = "backend";
        $data["title"]="Upload File Pohon Kinerja";
        $data["kriteria"]=false;
        $data["pilihan"]=3;

		$model=new FilePohonKinerja;
        
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        $path = Yii::app()->basePath . '/../static/filepohonkinerja';
        if (!is_dir($path)) {
            mkdir($path);
        }

        if (isset($_POST['FilePohonKinerja'])) {
            $model->attributes=$_POST['FilePohonKinerja'];

            if (@!empty($_FILES['FilePohonKinerja']['name']['file_pk'])) {
                $model->file_pk = $_POST['FilePohonKinerja']['file_pk'];
                if ($model->validate(array('file_pk'))) {
                    $model->file_pk = CUploadedFile::getInstance($model, 'file_pk');
                } else {
                    $model->file_pk = '';
                }
                $final_path = $path . '/' . time() . '_' . str_replace(' ', '_', strtolower($model->file_pk));
                $model->file_pk->saveAs($final_path);
                $model->file_pk = time() . '_' . str_replace(' ', '_', strtolower($model->file_pk));
            }
            
            if ($model->save()) {
                $this->redirect(array('indexPohonKinerja'));
            }
        } 

        $this->render('upload_file_pohonkinerja',array(
            'model'=>$model,
        ));
             
    }

    public function actionUploadFileCascading()
    {
        $this->layout = "backend";
        $data["title"]="Upload File Cascading";
        $data["kriteria"]=false;
        $data["pilihan"]=3;

		$model=new FileCascading;
        
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        $path = Yii::app()->basePath . '/../static/datacascading';
        if (!is_dir($path)) {
            mkdir($path);
        }

        if (isset($_POST['FileCascading'])) {
            $model->attributes=$_POST['FileCascading'];

            if (@!empty($_FILES['FileCascading']['name']['file_cas'])) {
                $model->file_cas = $_POST['FileCascading']['file_cas'];
                if ($model->validate(array('file_cas'))) {
                    $model->file_cas = CUploadedFile::getInstance($model, 'file_cas');
                } else {
                    $model->file_cas = '';
                }
                $final_path = $path . '/' . time() . '_' . str_replace(' ', '_', strtolower($model->file_cas));
                $model->file_cas->saveAs($final_path);
                $model->file_cas = time() . '_' . str_replace(' ', '_', strtolower($model->file_cas));
            }
            
            if ($model->save()) {
                $this->redirect(array('indexCascading'));
            }
        } 

        $this->render('upload_file_cascading',array(
            'model'=>$model,
        ));
             
    }

    public function actionUpdateDataFilePohonKinerja($id)
	{
        $this->layout = "backend";
		$model=$this->loadModelFilePohonKinerja($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
        $path = Yii::app()->basePath . '/../static/filepohonkinerja';
		if (isset($_POST['FilePohonKinerja'])) {
			$model->attributes=$_POST['FilePohonKinerja'];

            if (@!empty($_FILES['FilePohonKinerja']['name']['file_pk'])) {
                $model->file_pk = $_POST['FilePohonKinerja']['file_pk'];
                if ($model->validate(array('file_pk'))) {
                    $model->file_pk = CUploadedFile::getInstance($model, 'file_pk');
                } else {
                    $model->file_pk = '';
                }
                
                
                $model->file_pk->saveAs($path . '/' . time() . '_' . str_replace(' ', '_', strtolower($model->file_pk)));
                $model->file_pk = time() . '_' . str_replace(' ', '_', strtolower($model->file_pk));

                $mdl = $this->loadModelFilePohonKinerja($id);
                $path_spec = Yii::app()->basePath . '/../static/filepohonkinerja/'.$mdl->file_pk;
                if (file_exists($path_spec)) unlink($path_spec);
            }

			if ($model->save()) {
                // $this->redirect(array('viewDataFilePohonKinerja','id'=>$model->id));
                // $this->render('view_file_pohon_kinerja',array(
                //     'model'=>$this->loadModelFilePohonKinerja($model->id),
                // ));
                $this->redirect(array('indexPohonKinerja'));
			}
		}

		$this->render('update_file_pohonkinerja',array(
			'model'=>$model,
		));
    }
    
    public function actionUpdateDataFileCascading($id)
	{
        $this->layout = "backend";
		$model=$this->loadModelFileCascading($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
        $path = Yii::app()->basePath . '/../static/datacascading';
		if (isset($_POST['FileCascading'])) {
			$model->attributes=$_POST['FileCascading'];

            if (@!empty($_FILES['FileCascading']['name']['file_cas'])) {
                $model->file_cas = $_POST['FileCascading']['file_cas'];
                if ($model->validate(array('file_pk'))) {
                    $model->file_cas = CUploadedFile::getInstance($model, 'file_cas');
                } else {
                    $model->file_cas = '';
                }
                
                
                $model->file_cas->saveAs($path . '/' . time() . '_' . str_replace(' ', '_', strtolower($model->file_cas)));
                $model->file_cas = time() . '_' . str_replace(' ', '_', strtolower($model->file_cas));

                $mdl = $this->loadModelFileCascading($id);
                $path_spec = Yii::app()->basePath . '/../static/datacascading/'.$mdl->file_cas;
                if (file_exists($path_spec)) unlink($path_spec);
            }

			if ($model->save()) {
                // $this->redirect(array('viewDataFilePohonKinerja','id'=>$model->id));
                // $this->render('view_file_pohon_kinerja',array(
                //     'model'=>$this->loadModelFilePohonKinerja($model->id),
                // ));
                $this->redirect(array('indexCascading'));
			}
		}

		$this->render('update_file_cascading',array(
			'model'=>$model,
		));
	}

    public function actionViewFilePohonKinerja($id)
	{
		$this->render('view_file_pohon_kinerja',array(
			'model'=>$this->loadModelFilePohonKinerja($id),
		));
	}

    public function actionDeleteFilePohonKinerja($id)
	{   
        if (Yii::app()->request->isPostRequest) {
			// we only allow deletion via POST request
			//$this->loadModel($id)->delete();

            $mdl = $this->loadModelFilePohonKinerja($id);
            $path = Yii::app()->basePath . '/../static/filepohonkinerja/'.$mdl->file_pk;
            if (file_exists($path)) unlink($path);
            $mdl->delete();
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if (!isset($_GET['ajax'])) {
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('indexPohonKinerja'));
			}
		} else {
			throw new CHttpException(400,'Permintaan tidak valid..!!.');
		}
    }

    public function actionDeleteFileCascading($id)
	{   
        if (Yii::app()->request->isPostRequest) {
			// we only allow deletion via POST request
			//$this->loadModel($id)->delete();

            $mdl = $this->loadModelFileCascading($id);
            $path = Yii::app()->basePath . '/../static/datacascading/'.$mdl->file_cas;
            if (file_exists($path)) unlink($path);
            $mdl->delete();
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if (!isset($_GET['ajax'])) {
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('indexCascading'));
			}
		} else {
			throw new CHttpException(400,'Permintaan tidak valid..!!.');
		}
    }
    
    public function loadModelFilePohonKinerja($id)
	{
		$model=FilePohonKinerja::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
    }
    
    public function loadModelFileCascading($id)
	{
		$model=FileCascading::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

}