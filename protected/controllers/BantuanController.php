<?php

class BantuanController extends Controller
{
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionKontak()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
        $this->layout = "backend";
        $model=new Changelogdata('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Bantuan'])) {
            $model->attributes=$_GET['Bantuan'];
        }

        $this->render('kontak',array(
            'model'=>$model,
        ));
	}

    public function actionManual()
    {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->layout = "backend";
        $this->render('manual');
    }
    public function actionPerubahan()
    {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->layout = "backend";
        $this->render('perubahan');
    }
    public function actionFaq()
    {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->layout = "backend";
        $this->render('faq');
    }

}