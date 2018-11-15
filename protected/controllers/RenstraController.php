<?php

class RenstraController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
                'users'=>array('@'),
                'expression'=>'Yii::app()->user->isAllowAddEdit()',
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Datarenstra;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

        $path = Yii::app()->basePath . '/../static/datarenstra';
        if (!is_dir($path)) {
            mkdir($path);
        }

		if (isset($_POST['Datarenstra'])) {
			$model->attributes=$_POST['Datarenstra'];

            if (@!empty($_FILES['Datarenstra']['name']['data_file_renstra'])) {
                $model->data_file_renstra = $_POST['Datarenstra']['data_file_renstra'];
                if ($model->validate(array('data_file_renstra'))) {
                    $model->data_file_renstra = CUploadedFile::getInstance($model, 'data_file_renstra');
                } else {
                    $model->data_file_renstra = '';
                }
                $model->data_file_renstra->saveAs($path . '/' . time() . '_' . str_replace(' ', '_', strtolower($model->data_file_renstra)));
                $model->data_file_renstra = time() . '_' . str_replace(' ', '_', strtolower($model->data_file_renstra));
            }



			if ($model->save()) {
				//$this->redirect(array('view','id'=>$model->renstraid));
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
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
        $path = Yii::app()->basePath . '/../static/datarenstra';
		if (isset($_POST['Datarenstra'])) {
			$model->attributes=$_POST['Datarenstra'];

            if (@!empty($_FILES['Datarenstra']['name']['data_file_renstra'])) {
                $model->data_file_renstra = $_POST['Datarenstra']['data_file_renstra'];
                if ($model->validate(array('data_file_renstra'))) {
                    $model->data_file_renstra = CUploadedFile::getInstance($model, 'data_file_renstra');
                } else {
                    $model->data_file_renstra = '';
                }
                $model->data_file_renstra->saveAs($path . '/' . time() . '_' . str_replace(' ', '_', strtolower($model->data_file_renstra)));
                $model->data_file_renstra = time() . '_' . str_replace(' ', '_', strtolower($model->data_file_renstra));
            }

			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->renstraid));
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

            $mdl = $this->loadModel($id);
            $path = Yii::app()->basePath . '/../static/datarenstra/'.$mdl->data_file_renstra;
            if (file_exists($path)) unlink($path);
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
	 * Lists all models.
	 */
	public function actionIndex()
	{
        $model=new Datarenstra('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Datarenstra'])) {
        $model->attributes=$_GET['Datarenstra'];
        }

        $this->render('index',array(
        'model'=>$model,
        ));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Datarenstra('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Datarenstra'])) {
			$model->attributes=$_GET['Datarenstra'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Datarenstra the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Datarenstra::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Datarenstra $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='datarenstra-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}