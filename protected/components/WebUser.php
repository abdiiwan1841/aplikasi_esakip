<?php

class WebUser extends CWebUser {
    private $model = null;

    public function getModel()
    {
        if(!isset($this->id)) $this->model = new Users;
        if($this->model === null)
            //$this->model = Users::model()->findByPk($this->id);
            $this->model =  Users::model()->find('usrxid=:userId',array(':userId'=>$this->id));
        return $this->model;
    }

    public function __get($name) {
        try {
            return parent::__get($name);
        } catch (CException $e) {
            $m = $this->getModel();
            if($m->__isset($name))
                return $m->{$name};
            else throw $e;
        }
    }

    public function __set($name, $value) {
        try {
            return parent::__set($name, $value);
        } catch (CException $e) {
            $m = $this->getModel();
            $m->{$name} = $value;
        }
    }

    public function __call($name, $parameters) {
        try {
            return parent::__call($name, $parameters);
        } catch (CException $e) {
            $m = $this->getModel();
            return call_user_func_array(array($m,$name), $parameters);
        }
    }

    public function isAdmin(){
        $user = $this->getModel();
        $res=false;
        if ($user!==null && $user->id_role==0) $res=true;
        return $res;
    }

    public function isAdminOPD(){
        $user = $this->getModel();
        $res=false;
        if ($user!==null && $user->id_role==1) $res=true;
        return $res;
    }

    public function isOperatorOPD(){
        $user = $this->getModel();
        $res=false;
        if ($user!==null && $user->id_role==2) $res=true;
        return $res;
    }

    public function isOPDViewer(){
        $user = $this->getModel();
        $res=false;
        if ($user!==null && $user->id_role==3) $res=true;
        return $res;
    }

    public function isViewer(){
        $user = $this->getModel();
        $res=false;
        if ($user!==null && $user->id_role==4) $res=true;
        return $res;
    }

    public function isAllowDelete(){
        $user = $this->getModel();
        $res=false;
        if ($user!==null && ($user->id_role==0 || $user->id_role==1 )) $res=true;
        return $res;
    }

    public function isAllowAddEdit(){
        $user = $this->getModel();
        $res=false;
        if ($user!==null && ($user->id_role==0 || $user->id_role==1 || $user->id_role==2   )) $res=true;
        return $res;
    }


    public function checkAccess($operation, $params=array())
    {
        if (empty($this->id)) {
            return false;
        }

        $rolesAction = explode(',', $operation);
        $roles = $this->getState("roles");
        //die($operation.' '.$this->getState("roles"));
        if (in_array($roles,$rolesAction) || in_array($roles,$rolesAction))
            return true;

        /*if(is_array($operation)) { // Check if multiple roles are available
            return (array_search($roles,$rolesAction)!==false);
        }*/

        return ($operation === $roles);// allow access if the operation request is the current user's role
    }

    public function getTahun()
    {
        return Yii::app()->session['TahunAktif'];
    }

    public function getOpd()
    {
        return Yii::app()->session['opd'];
    }

    public function getRoleName()
    {
        return Yii::app()->session['rolename'];
    }
    public function getNamaOpd()
    {
        return Yii::app()->session['namaopd'];
    }
    public function getaidi()
    {
        return $this->id;
    }

}