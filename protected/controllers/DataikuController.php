<?php

class DataikuController extends Controller
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
				'actions'=>array('index','view','test','tabel'),
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
		$model=new Dataiku;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

        $path = Yii::app()->basePath . '/../static/dataiku';
        if (!is_dir($path)) {
            mkdir($path);
        }

		if (isset($_POST['Dataiku'])) {
			$model->attributes=$_POST['Dataiku'];

            if (@!empty($_FILES['Dataiku']['name']['data_file_iku'])) {
                $model->data_file_iku = $_POST['Dataiku']['data_file_iku'];
                if ($model->validate(array('data_file_iku'))) {
                    $model->data_file_iku = CUploadedFile::getInstance($model, 'data_file_iku');
                } else {
                    $model->data_file_iku = '';
                }
                $model->data_file_iku->saveAs($path . '/' . time() . '_' . str_replace(' ', '_', strtolower($model->data_file_iku)));
                $model->data_file_iku = time() . '_' . str_replace(' ', '_', strtolower($model->data_file_iku));
            }



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
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Dataiku'])) {
			$model->attributes=$_POST['Dataiku'];
            $path = Yii::app()->basePath . '/../static/dataiku';

            if (@!empty($_FILES['Dataiku']['name']['data_file_iku'])) {
                $model->data_file_iku = $_POST['Dataiku']['data_file_iku'];
                if ($model->validate(array('data_file_iku'))) {
                    $model->data_file_iku = CUploadedFile::getInstance($model, 'data_file_iku');
                } else {
                    $model->data_file_iku = '';
                }
                $model->data_file_iku->saveAs($path . '/' . time() . '_' . str_replace(' ', '_', strtolower($model->data_file_iku)));
                $model->data_file_iku = time() . '_' . str_replace(' ', '_', strtolower($model->data_file_iku));
            }

			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->ikuid));
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
            $path = Yii::app()->basePath . '/../static/dataiku/'.$mdl->data_file_iku;
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

	public function actionTabel(){
		$this->layout = false;
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
            ->where('tkg.id_instansi=:a1 AND tkg.nomor_indikator_provinsi=:a2 AND tkg.nomor_program=:a3 AND tkg.nomor_kegiatan=:a4',array('a1'=>'%'.$opd.'%','a2'=>'%'.$iku.'%',))
            // ->where('tkg.id_instansi=:a1 AND tkg.nomor_indikator_provinsi=:a2 AND tkg.nomor_program=:a3 AND tkg.nomor_kegiatan=:a4',array('a1'=>$opd,'a2'=>$iku,'a3'=>$program,'a4'=>$kegiatan))
            ->limit(5)
			->queryAll();
		echo '<pre>';
		print_r($query);
		echo '</pre>';die();
			
		$datas ['query'] = $query;
        $this->render('tabel',$datas);
	}
	
	public function actionIndex()
	{
        $model=new Dataiku('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Dataiku'])) {
        $model->attributes=$_GET['Dataiku'];
        }

        $this->render('index',array(
        'model'=>$model,
        ));
	}

	public function actionTest(){
		$data["title"]="IKU";
		$model = new Indikatorprov;
        $this->render('test',array(
			'model' => $model,
			'title' => $data['title'],
		));
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
	 * @return Dataiku the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Dataiku::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
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