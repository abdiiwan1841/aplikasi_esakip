<?php

class HapusdataController extends Controller
{

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
        $this->layout = "backend";

        $model = new Hapusdataform;
        if(isset($_POST['ajax']) && $_POST['ajax']==='hapusdata-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if(isset($_POST['Hapusdataform']))
        {
            $model->attributes=$_POST['Hapusdataform'];
            // validate user input and redirect to the previous page if valid
            if($model->validate() ) {

                $idopd= $model->id_instansi;
                if (isset($model->tabel)) {
                    $optionArray = $model->tabel;
                    for ($i=0; $i<count($optionArray); $i++) {
                        $tbltemp = $optionArray[$i];

                        if ($tbltemp=="tmisi")
                        {
                            $sqlstr="Delete from $tbltemp where idinstansi='$idopd'";
                        } else
                        {
                            $sqlstr="Delete from $tbltemp where id_instansi='$idopd'";
                        }
                        $dsn = "mysql:host=".Yii::app()->params['dbhost'].";dbname=db".$model->tahun;
                        $connection=new CDbConnection($dsn,Yii::app()->params['dbuser'],Yii::app()->params['dbpwd']);
                        $connection->active=true;
                        $connection->createCommand($sqlstr)->query();
                        $connection->active=false;
                    }
                }


                Yii::app()->user->setFlash('pesan', "Data sudah di hapus!");
                $this->redirect(array('index'));
            }
        }
        Yii::app()->controller->render('index',array('model'=>$model));

       // $this->render('index');
	}


}