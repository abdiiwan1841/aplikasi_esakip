<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class Hapusdataform extends CFormModel
{
	public $id_instansi;
	public $tabel;
    public $tahun;


	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('tahun, id_instansi, tabel', 'required'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'tahun'=>'Tahun Anggaran',
            'id_instansi'=>'OPD',
            'tabel'=>'Kriteria Data',
		);
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{

		/*if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			$this->_identity->authenticate();

		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24*6 : 0; // 6 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else*/
		return false;
	}
}
