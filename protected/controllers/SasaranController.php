<?php

class SasaranController extends Controller
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
			'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('index','view','eselonTiga','eselonEmpat','viewEselonTiga','viewEselonEmpat'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','createEselonTiga','createEselonEmpat','updateEselonTiga','updateEselonEmpat'),
				'users'=>array('@'),
                'expression'=>'Yii::app()->user->isAllowAddEdit()',
			),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('admin','delete','deleteEselonTiga','DeleteEselonEmpat'),
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
			'model'=>$this->loadModel($id),
		));
	}

	public function actionViewEselonTiga($id)
	{
		$this->render('view_eselon_tiga',array(
			'model'=>$this->loadModelEselonTiga($id),
		));
	}

	public function actionViewEselonEmpat($id)
	{
		$this->render('view_eselon_empat',array(
			'model'=>$this->loadModelEselonEmpat($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Sasaran;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Sasaran'])) {
			$model->attributes=$_POST['Sasaran'];
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->sasaranid));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreateEselonTiga()
	{
		$model=new SasaranEselonTiga;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['SasaranEselonTiga'])) {
			$model->attributes=$_POST['SasaranEselonTiga'];
			if ($model->save()) {
				$this->redirect(array('viewEselonTiga','id'=>$model->id));
			}
		}

		$this->render('create_eselon_tiga',array(
			'model'=>$model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreateEselonEmpat()
	{
		$model=new SasaranEselonEmpat;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['SasaranEselonEmpat'])) {
			$model->attributes=$_POST['SasaranEselonEmpat'];
			if ($model->save()) {
				$this->redirect(array('viewEselonEmpat','id'=>$model->id));
			}
		}

		$this->render('create_eselon_empat',array(
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
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Sasaran'])) {
			$model->attributes=$_POST['Sasaran'];
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->sasaranid));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionUpdateEselonTiga($id)
	{
		$model=$this->loadModelEselonTiga($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['SasaranEselonTiga'])) {
			$model->attributes=$_POST['SasaranEselonTiga'];
			if ($model->save()) {
				$this->redirect(array('viewEselonTiga','id'=>$model->id));
			}
		}

		$this->render('update_eselon_tiga',array(
			'model'=>$model,
		));
	}

	public function actionUpdateEselonEmpat($id)
	{
		$model=$this->loadModelEselonEmpat($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['SasaranEselonEmpat'])) {
			$model->attributes=$_POST['SasaranEselonEmpat'];
			if ($model->save()) {
				$this->redirect(array('viewEselonEmpat','id'=>$model->id));
			}
		}

		$this->render('update_eselon_empat',array(
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
            $model = $this->loadModel($id);
            $dataanak = Indikator::model()->findAllByAttributes(
                array('nomor_misi'=>$model->nomor_misi,
                    'id_instansi'=>$model->id_instansi,
                    'nomor_tujuan'=>$model->nomor_tujuan,
                    'nomor_sasaran'=>$model->nomor_sasaran,
                )
            );
            if(count($dataanak) > 0) {
                throw new CHttpException(400,'Maaf, Data tidak bisa dihapus..!!');
            }
            else {
                $model->delete();
            }

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if (!isset($_GET['ajax'])) {
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
			}
		} else {
			throw new CHttpException(400,'Permintaan tidak valid..!!.');
		}
	}

	public function actionDeleteEselonTiga($id)
	{
		if (Yii::app()->request->isPostRequest) {
			// we only allow deletion via POST request
            $model = $this->loadModelEselonTiga($id);
            $dataanak = IndikatorEselonTiga::model()->findAllByAttributes(
                array('nomor_misi'=>$model->nomor_misi,
                    'id_instansi'=>$model->id_instansi,
                    'nomor_tujuan'=>$model->nomor_tujuan,
					'nomor_sasaran_eselon_tiga'=>$model->nomor_sasaran,
                )
            );
            if(count($dataanak) > 0) {
                throw new CHttpException(400,'Maaf, Data tidak bisa dihapus..!!');
            }
            else {
                $model->delete();
            }

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if (!isset($_GET['ajax'])) {
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('eselonTiga'));
			}
		} else {
			throw new CHttpException(400,'Permintaan tidak valid..!!.');
		}
	}

	public function actionDeleteEselonEmpat($id)
	{
		if (Yii::app()->request->isPostRequest) {
			// we only allow deletion via POST request
            $model = $this->loadModelEselonEmpat($id);
            $dataanak = IndikatorEselonEmpat::model()->findAllByAttributes(
                array('nomor_misi'=>$model->nomor_misi,
                    'id_instansi'=>$model->id_instansi,
                    'nomor_tujuan'=>$model->nomor_tujuan,
                    'nomor_sasaran'=>$model->nomor_sasaran,
                )
            );
            if(count($dataanak) > 0) {
                throw new CHttpException(400,'Maaf, Data tidak bisa dihapus..!!');
            }
            else {
                $model->delete();
            }

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if (!isset($_GET['ajax'])) {
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('eselonEmpat'));
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
		// echo Yii::app()->user->getOpd();die();
        $model=new Sasaran('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Sasaran'])) {
        $model->attributes=$_GET['Sasaran'];
        }
        $this->render('index',array(
        'model'=>$model,
        ));
	}

	/**
	 * Lists all models (khusus data eselon 3).
	 */
	public function actionEselonTiga()
	{
        $model=new SasaranEselonTiga('search');
        // $model->unsetAttributes();  // clear any default values
        if (isset($_GET['SasaranEselonTiga'])) {
        $model->attributes=$_GET['SasaranEselonTiga'];
        }

        $this->render('index_eselon_tiga',array(
        'model'=>$model,
        ));
	}

	/**
	 * Lists all models (khusus data eselon 4).
	 */
	public function actionEselonEmpat()
	{
        $model=new SasaranEselonEmpat('search');
        // $model->unsetAttributes();  // clear any default values
        if (isset($_GET['SasaranEselonEmpat'])) {
        $model->attributes=$_GET['SasaranEselonEmpat'];
        }

        $this->render('index_eselon_empat',array(
        'model'=>$model,
        ));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Sasaran('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Sasaran'])) {
			$model->attributes=$_GET['Sasaran'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Sasaran the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Sasaran::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	public function loadModelEselonTiga($id)
	{
		$model=SasaranEselonTiga::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	public function loadModelEselonEmpat($id)
	{
		$model=SasaranEselonEmpat::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Sasaran $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='sasaran-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}