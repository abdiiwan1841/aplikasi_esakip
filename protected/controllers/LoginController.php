<?php

class LoginController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CaptchaExtendedAction',
                'mode'=>CaptchaExtendedAction::MODE_MATH,
                'density'=>1,
                'fillSections'=>5,
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
        $model=new LoginForm;

        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if(isset($_POST['LoginForm']))
        {
            $model->scenario = 'withCaptcha';
            $model->attributes=$_POST['LoginForm'];

            Yii::app()->session['TahunAktif'] = $_POST['LoginForm']['tahun'];
            $model->attributes=$_POST['LoginForm'];
            
            // validate user input and redirect to the previous page if valid
            if($model->validate() && $model->login()) 
            {
                $this->redirect("home");
            }
            
        }

        Yii::app()->controller->renderPartial('index',array('model'=>$model));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
        Yii::app()->controller->renderPartial('index',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

    public function actionChgPwd()
    {

        $model=new Users;

        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='chgpass-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if(isset($_POST['Users']))
        {
            $data=$_POST['Users'];
            $model=Users::model()->find('usrxid=:usrxid',
                array(':usrxid'=>(integer) Yii::app()->user->id)
            );

            if ($data["passwordOld"] != $model->usrpwd1 )
            {
                Yii::app()->user->setFlash('pesan', "Kata kunci salah!");
            } 
            else 
            {
                $updt = Users::model()->updateByPk(Yii::app()->user->id, array(
                    'usrpwd1' => $data["passwordSave"],
                    'udt' => new CDbExpression('NOW()'),
                ));

                if ($updt) 
                {
                    Yii::app()->user->logout();
                    $this->redirect(Yii::app()->baseUrl."/login");
                }
            }

        }

        $this->layout = "backend";
        $this->render('form-chg-pwd',array('model'=>$model));
    }
}