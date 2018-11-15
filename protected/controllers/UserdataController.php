<?php
/**
 * Author: Abdi-Iwan
 * Date: 9/7/2017 12:52 AM
 * Build For : Gabungan-BIT
 */

class UserdataController extends Controller
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
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('index','view','create','update','admin','delete'),
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
        $model=new Pengguna;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Pengguna'])) {
            $model->attributes=$_POST['Pengguna'];
            if ($model->save()) {
                //$this->redirect(array('view','id'=>$model->id_instansi));
                $this->redirect(array("userdata/index"));
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

        if (isset($_POST['Pengguna'])) {
            $model->attributes=$_POST['Pengguna'];
            if ($model->save()) {
                //$this->redirect(array('view','id'=>$model->id_instansi));
                $this->redirect(array("userdata/index"));
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
            $this->loadModel($id)->delete();

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
        /*$dataProvider=new CActiveDataProvider('Pengguna');
        $this->render('index',array(
            'dataProvider'=>$dataProvider,
        ));*/

            $model = new Pengguna('search');
            $model->unsetAttributes();  // clear any default values
            if (isset($_GET['Pengguna'])) {
                $model->attributes = $_GET['Pengguna'];
            }


        $this->render('index',array(
            'model'=>$model
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model=new Pengguna('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Pengguna'])) {
            $model->attributes=$_GET['Pengguna'];
        }

        $this->render('admin',array(
            'model'=>$model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Pengguna the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model=Pengguna::model()->findByPk($id);
        if ($model===null) {
            throw new CHttpException(404,'The requested page does not exist.');
        }
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Pengguna $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax']==='Pengguna-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
/**
 * File Name: UserdataController.php
 */