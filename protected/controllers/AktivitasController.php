<?php

class AktivitasController extends Controller
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
				'actions'=>array('index','view','laporan','showlaporan'),
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
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionShowLaporan($id=null)
    {
        $criteria = new CDbCriteria();
        $criteria->addCondition("id_instansi=:idx");
        $criteria->params = array(':idx' => Yii::app()->user->getOpd());
        $criteria->order='nomor_misi,nomor_tujuan,nomor_sasaran,nomor_indikator,nomor_program,nomor_kegiatan,nomor_aktivitas';
        $mdlaktivitas = Aktivitas::model()->findAll($criteria);


        if ($id==2) {

            # You can easily override default constructor's params
            $mPDF1 = Yii::app()->ePdf->mpdf('', 'A0',
                        11, // Sets the default document font size in points (pt)
						'', // Sets the default font-family for the new document.
						15, // margin_left. Sets the page margins for the new document.
						15, // margin_right
						16, // margin_top
						16, // margin_bottom
						9, // margin_header
						9, // margin_footer
						'L');
            # Load a stylesheet
            $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot') . '/static/css/pdf.css');
            $mPDF1->WriteHTML($stylesheet, 1);

            # renderPartial (only 'view' of current controller)
            $mPDF1->WriteHTML($this->renderPartial('laporan', array('tblAktivitas'=>$mdlaktivitas,'ispdf'=>1), true));

            # Outputs ready PDF
            $mPDF1->Output();


        }
         else {
             $this->renderPartial('laporan',array(
                     'tblAktivitas'=>$mdlaktivitas,'ispdf'=>0)
             );
         }
    }

    public function actionLaporan()
    {
        $this->render('form');
    }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Aktivitas;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Aktivitas'])) {
			$model->attributes=$_POST['Aktivitas'];
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->aktivitasid));
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

		if (isset($_POST['Aktivitas'])) {
			$model->attributes=$_POST['Aktivitas'];
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->aktivitasid));
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
            $dataanak = Kegiatan::model()->findAllByAttributes(
                array('nomor_misi'=>$model->nomor_misi,
                    'id_instansi'=>$model->id_instansi,
                    'nomor_tujuan'=>$model->nomor_tujuan,
                    'nomor_sasaran'=>$model->nomor_sasaran,
                    'nomor_indikator'=>$model->nomor_indikator,
                    'nomor_program'=>$model->nomor_program,
                    'nomor_kegiatan'=>$model->nomor_kegiatan,
                )
            );
            // if(count($dataanak) > 0) {
            //     throw new CHttpException(400,'Maaf, Data tidak bisa dihapus..!!');
            // }
            // else {
                $model->delete();
            // }

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
        $model=new Aktivitas('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Aktivitas'])) {
        $model->attributes=$_GET['Aktivitas'];
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
		$model=new Aktivitas('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Aktivitas'])) {
			$model->attributes=$_GET['Aktivitas'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Aktivitas the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Aktivitas::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Aktivitas $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='aktivitas-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}