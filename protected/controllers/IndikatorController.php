<?php

class IndikatorController extends Controller
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
				'actions'=>array('index','eselonEmpat','view','eselonTiga','viewEselonTiga','viewEselonEmpat'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','createEselonTiga','createEselonEmpat','updateEselonTiga','updateEselonEmpat'),
				'users'=>array('@'),
                'expression'=>'Yii::app()->user->isAllowAddEdit()',
			),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('admin','delete','deleteEselonTiga'),
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
		$model=new Indikator;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Indikator'])) {
			$model->attributes=$_POST['Indikator'];
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->indikatorid));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionCreateEselonTiga()
	{
		$model=new IndikatorEselonTiga;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['IndikatorEselonTiga'])) {
			$model->attributes=$_POST['IndikatorEselonTiga'];
			if ($model->save()) {
				$this->redirect(array('viewEselonTiga','id'=>$model->indikatorid));
			}
		}

		$this->render('create_eselon_tiga',array(
			'model'=>$model,
		));
	}

	public function actionCreateEselonEmpat()
	{
		$model=new IndikatorEselonEmpat;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['IndikatorEselonEmpat'])) {
			$model->attributes=$_POST['IndikatorEselonEmpat'];
			if ($model->save()) {
				$this->redirect(array('viewEselonEmpat','id'=>$model->indikatorid));
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

		if (isset($_POST['Indikator'])) {
			$model->attributes=$_POST['Indikator'];
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->indikatorid));
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

		if (isset($_POST['IndikatorEselonTiga'])) {
			$model->attributes=$_POST['IndikatorEselonTiga'];
			if ($model->save()) {
				$this->redirect(array('viewEselonTiga','id'=>$model->indikatorid));
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

		if (isset($_POST['IndikatorEselonEmpat'])) {
			$model->attributes=$_POST['IndikatorEselonEmpat'];
			if ($model->save()) {
				$this->redirect(array('viewEselonEmpat','id'=>$model->indikatorid));
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
            $dataanak = Program::model()->findAllByAttributes(
                array('nomor_misi'=>$model->nomor_misi,
                    'id_instansi'=>$model->id_instansi,
                    'nomor_tujuan'=>$model->nomor_tujuan,
                    'nomor_sasaran'=>$model->nomor_sasaran,
                    'nomor_indikator'=>$model->nomor_indikator,
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
            $dataanak = Program::model()->findAllByAttributes(
                array('nomor_misi'=>$model->nomor_misi,
                    'id_instansi'=>$model->id_instansi,
                    'nomor_tujuan'=>$model->nomor_tujuan,
                    'nomor_sasaran'=>$model->nomor_sasaran_eselon_tiga,
                    'nomor_indikator'=>$model->nomor_indikator,
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
            $dataanak = Program::model()->findAllByAttributes(
                array('nomor_misi'=>$model->nomor_misi,
                    'id_instansi'=>$model->id_instansi,
                    'nomor_tujuan'=>$model->nomor_tujuan,
                    'nomor_sasaran'=>$model->nomor_sasaran,
                    'nomor_indikator'=>$model->nomor_indikator,
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
        $model=new Indikator('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Indikator'])) {
        $model->attributes=$_GET['Indikator'];
        }

        $this->render('index',array(
        'model'=>$model,
        ));
	}

	public function actionEselonTiga()
	{
        $model=new IndikatorEselonTiga('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Indikator'])) {
        $model->attributes=$_GET['Indikator'];
        }

        $this->render('index_eselon_tiga',array(
        'model'=>$model,
        ));
	}

	public function actionEselonEmpat()
	{
        $model=new IndikatorEselonEmpat('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Indikator'])) {
        $model->attributes=$_GET['Indikator'];
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
		$model=new Indikator('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Indikator'])) {
			$model->attributes=$_GET['Indikator'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Indikator the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Indikator::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	public function loadModelEselonTiga($id)
	{
		$model=IndikatorEselonTiga::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	public function loadModelEselonEmpat($id)
	{
		$model=IndikatorEselonEmpat::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Indikator $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='indikator-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}