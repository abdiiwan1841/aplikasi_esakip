<?php

class HomeController extends Controller
{

    public $jmlVisi=0;
    public $layout = "backend";


    public function beforeAction()
    {
        if (Yii::app()->user->isGuest )
            $this->redirect(Yii::app()->createUrl('login'));

        return true;
    }
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */

	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'

        $idrole=Yii::app()->session['roleid'];
        $criteria = new CDbCriteria();
        $criteria2 = new CDbCriteria();

        if ($idrole<>0) {
            $criteria->addCondition("id_instansi=:idx");
            $criteria->params = array(':idx' => Yii::app()->session['opd']);

            $criteria2->addCondition("idinstansi=:idx");
            $criteria2->params = array(':idx' => Yii::app()->session['opd']);
        }

        $data["jmlVisi"] = Visi::model()->count($criteria);

        $data["jmlMisi"] = Misi::model()->count($criteria2);

        $data["jmlTujuan"] = Tujuan::model()->count($criteria);

        $data["jmlSasaran"] = Sasaran::model()->count($criteria);

        $data["jmlIndikator"] = Indikator::model()->count($criteria);

        $data["jmlProgram"] = Program::model()->count($criteria);

        $data["jmlKegiatan"] = Kegiatan::model()->count($criteria);

        $data["jmlAktivitas"] = Aktivitas::model()->count($criteria);

        $data["jmlUserOpd"] = Users::model()->count($criteria);

        $data["jmlOpd"] = Opd::model()->count();

        $data["jmlUser"] = Users::model()->count();

        $criteriaz = new CDbCriteria();
        $criteriaz->addCondition("id_instansi=:idx and id_role=:idrole");
        $criteriaz->params = array(':idx' => Yii::app()->session['opd'],':idrole' => 1);
        $data["jmlUserAdmin"] = Users::model()->count($criteriaz);


        $this->render('index',$data);
	}


}