<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
    private $_id;
    private $_userid;
    private $_username;
    private $_roleid;
    private $_rolename;
    private $_fullname;
    private $_opd;
    private $_tahun;


    public function authenticate()
	{
		/*$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);*/
        $users= Users::model()->find('LOWER(userid)=?', array(strtolower($this->username)));

        if (empty($users)) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        }
        elseif($users->userid !== $this->username) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        }
		//elseif($users[$this->username]!==$this->password)
        elseif($users->usrpwd1 !==$this->password) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        }
		else {

            $this->errorCode = self::ERROR_NONE;
            $this->_id = $users->usrxid;
            $this->_username = $this->username;
            $this->setState('tahun', Yii::app()->session['TahunAktif']);
            $this->_tahun = $this->tahun;
            $this->_roleid = $users->id_role;
            $this->_opd = $users->id_instansi;
            Yii::app()->session['opd']=$users->id_instansi;
            Yii::app()->session['namaopd']=$users->datainstansi->nama_instansi;
            Yii::app()->session['roleid']=$users->id_role;
            Yii::app()->session['rolename']=$users->grupuser->keterangan;

            $this->_rolename = $users->grupuser->keterangan;
            //print_r($users->grupuser->keterangan);

            //$user->last_login_time=new CDbExpression("NOW()");
            //$user->save();

        }
		return !$this->errorCode;
	}

    public function getName()
    {
        return $this->_username;
    }

    public function getOpd()
    {
        return $this->_opd;
    }

    public function getFullName()
    {
        return $this->_fullname;
    }

    public function getRole()
    {
        return $this->_roleid;
    }

    public function getRoleName()
    {
        return $this->_rolename;
    }

    public function getId()
    {
        return $this->_id;
    }

    public function getUserId()
    {
        return $this->_userid;
    }

    public function getTahun()
    {
        return $this->_tahun;
    }


}