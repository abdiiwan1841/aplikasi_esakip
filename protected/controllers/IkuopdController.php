<?php

class IkuopdController extends Controller
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
				'actions'=>array('index','view','show'),
				'users'=>array('@'),
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
		$model=new Ikuopd();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Ikuopd'])) {
			$model->attributes=$_POST['Ikuopd'];
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->sasaranid));
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

		if (isset($_POST['Ikuopd'])) {
			$model->attributes=$_POST['Ikuopd'];
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->sasaranid));
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

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
        $model=new Ikuopd('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Ikuopd'])) {
        $model->attributes=$_GET['Ikuopd'];
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
		$model=new Ikuopd('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Ikuopd'])) {
			$model->attributes=$_GET['Ikuopd'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

    public function actionShow()
    {
        $sk4 = Yii::app()->user->getOpd();

        $criteria = new CDbCriteria();
        $criteria->addCondition("id_instansi=:idx");
        $criteria->params = array(':idx' => $sk4);
        $data['result']="2";
        $data['result']=Sasaran::model()->findAll($criteria);
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

        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot') . '/static/css/pdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);

        # renderPartial (only 'view' of current controller)
        $mPDF1->WriteHTML($this->renderPartial('laporan', $data, true));

        # Outputs ready PDF
        $mPDF1->Output();

        exit();
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
		$model=Ikuopd::model()->findByPk($id);
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
		if (isset($_POST['ajax']) && $_POST['ajax']==='ikuopd-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}