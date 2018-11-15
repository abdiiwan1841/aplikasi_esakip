<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $usrxid
 * @property string $userid
 * @property string $usrpwd1
 * @property integer $id_instansi
 * @property integer $id_role
 *
 * The followings are the available model relations:
 * @property GrupPengguna[] $nidrole
 */

class Users extends RActiveRecord
{

    public $repeatPassword;
    public $passwordSave;
    public $passwordOld;
    public $usernameLegal;

    const STATUS_ACTIVE=1;

    const PASSWORD_EXPIRY=90;

    /**
     * @return Active Connection string
     */
    public function getDbConnection()
    {
        return self::getPeriodeDbConnection();
    }

    /**
     * Returns the static model of the specified AR class.
     * @return CActiveRecord the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'xusers';
    }
    /**
     * @return array validation rules for model attributes.
     */
    public function beforeValidate()
    {
        $this->usernameLegal = preg_replace( '/[^A-Za-z0-9@_#?!&-]/' , '', $this->username );
        return true;
    }

    public function validatePassword($password)
    {
        return CPasswordHelper::verifyPassword($password,$this->password);
    }
    public function hashPassword($password)
    {
        return CPasswordHelper::hashPassword($password);
    }

   /* protected function beforeSave()
    {
        $keyLog= "AppBITSoft";
        if ( parent::beforeSave() )
        {
            if ( $this->isNewRecord )
            {
                $this->udt = new CDbExpression("NOW()");
                if (!empty($this->passwordSave)&&!empty($this->repeatPassword)&&($this->passwordSave===$this->repeatPassword))
                    $password = $this->passwordSave;
                else
                    $password = rand(9999,999999);
                //$this->password = md5(sha1($keyLog.$password)); //$this->hashPassword( $password );
                $this->password = $this->passwordSave; //$this->hashPassword( $password );
                /*$this->status=0;
                $this->password_expiry_date=new CDbExpression("DATE_ADD(NOW(), INTERVAL ".self::PASSWORD_EXPIRY." DAY) ");

                $this->activate = $this->hashPassword( rand(9999,999999) );

            }
            else if (!empty($this->passwordSave)&&!empty($this->repeatPassword)&&($this->passwordSave===$this->repeatPassword))
                //if it's not a new password, save the password only if it not empty and the two passwords match
            {
                $this->password = $this->passwordSave;
                //$this->password =  md5(sha1($keyLog.$this->passwordSave));//$this->hashPassword( $this->passwordSave );
                //$this->password_expiry_date=new CDbExpression("DATE_ADD(NOW(), INTERVAL ".self::PASSWORD_EXPIRY." DAY) ");
            }

            //$this->last_login_time = new CDbExpression("NOW()");
            return true;
        }
        else
            return false;
    }*/

    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('passwordSave, repeatPassword,passwordOld', 'required'),
            array('userid', 'checkUnique', 'on'=>'insert'),

            array('passwordSave, repeatPassword', 'length', 'min'=>4, 'max'=>40),
            //array('passwordSave','checkStrength','score'=>10),
            array('repeatPassword', 'compare', 'compareAttribute'=>'passwordSave'),

            array('userid, usrpwd1,  id_instansi, id_role', 'required', 'on'=>'insert'),
            array('userid, usrpwd1', 'length', 'max'=>128),
            //array('last_login_time', 'safe','on'=>'validation'),
            array('userid', 'compare', 'compareAttribute'=>'usernameLegal', 'message'=>'User ID tidak sah','on'=>'validation'),

           array('id_role', 'numerical',  'integerOnly'=>true),

        );
    }

    public function relations()
    {
        return array(
            'grupuser' => array(self::BELONGS_TO, 'Gruppengguna', '','foreignKey' => array('id_role'=>'id_role')),
            'datainstansi' => array(self::BELONGS_TO, 'Opd', '','foreignKey' => array('id_instansi'=>'id_instansi')),
        );
    }
    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'usrxid' => 'Id',
            'userid' => 'Username',
            'usrpwd1' => 'Kata Kunci',
            'id_instansi' => 'OPD',
            'passwordSave' => "Kata Kunci Baru",
            "repeatPassword" =>"Ulangi Kata Kunci",
            'passwordOld' =>"Kata kunci lama",
            'id_role' => 'Grup',
        );
    }


    public function primaryKey(){
        return array('usrxid');
    }

    /**
     * Compare Expiry date and today's date
     * @return type - positive number equals valid user
     */
    public function checkExpiryDate() {
        $expDate=DateTime::createFromFormat('Y-m-d H:i:s',$this->password_expiry_date);
        $today=new DateTime("now");
        return ($today->diff($expDate)->format('%a'));
    }
    public function getfullName() {
        $fullName=(!empty($this->firstname))? $this->firstname : '';
        $fullName.=(!empty($this->lastname))?( (!empty($fullName))? " ".$this->lastname : $this->lastname ) : '';
        return $fullName;
    }

    public function checkUnique($attribute,$params) {
        $sql='Select count(*) from xusers where userid=:username';
        //DATE_ADD(:end ,INTERVAL 7 DAY)
        $command = Yii::app()->db->createCommand($sql);
        $username=$this->$attribute;
        $command->bindParam(":username",$username,PDO::PARAM_STR);
        $count=$command->queryScalar();
        if ( $count > 0 )
            $this->addError($attribute,"This Username is not available or Valid");
        else
            return true;

    }
    /** score password strength
     * where score is increased based on
     * - password length
     * - number of unqiue chars
     * - number of special chars
     * - number of numbers
     *
     * A medium score is around 20
     *
     * @param type $attribute
     * @param type $params
     * @return boolean
     */
    function CheckStrength($attribute,$params)
    {
        $password=$this->$attribute;
        if ( strlen( $password ) == 0 )
            return 20;
        else
            $strength = 0;
        /*** get the length of the password ***/
        $length = strlen($password);
        /*** check if password is not all lower case ***/
        if(strtolower($password) != $password)
        {
            $strength += 1;
        }
        /*** check if password is not all upper case ***/
        if(strtoupper($password) == $password)
        {
            $strength += 1;
        }
        /*** check string length is 8 -15 chars ***/
        if($length >= 8 && $length <= 15)
        {
            $strength += 2;
        }
        /*** check if lenth is 16 - 35 chars ***/
        if($length >= 16 && $length <=35)
        {
            $strength += 2;
        }
        /*** check if length greater than 35 chars ***/
        if($length > 35)
        {
            $strength += 3;
        }
        /*** get the numbers in the password ***/
        preg_match_all('/[0-9]/', $password, $numbers);
        $strength += count($numbers[0]);
        /*** check for special chars ***/
        preg_match_all('/[|!@#$%&*\/=?,;.:\-_+~^\\\]/', $password, $specialchars);
        $strength += sizeof($specialchars[0]);
        /*** get the number of unique chars ***/
        $chars = str_split($password);
        $num_unique_chars = sizeof( array_unique($chars) );
        $strength += $num_unique_chars * 2;
        /*** strength is a number 1-100; ***/
        $strength = $strength > 99 ? 99 : $strength;
        //$strength = floor($strength / 10 + 1);
        //fb($strength,"PASSWORD STRENGTH ".$password.": ");
        if ($strength<$params['score'])
            $this->addError($attribute,"Password is too weak - try using CAPITALS, Numbers, AND special characters. Your score was ".$strength." and minimum is ".$params['score']);
        else
            return true;
    }

    public function sendActivation() {
        $name='=?UTF-8?B?'.base64_encode($this->username).'?=';
        $subject='=?UTF-8?B?'.base64_encode('Signup Activation for Diary System').'?=';
        $headers="From: Admin <signup@data-kom.com>\r\n".
            "Reply-To: {signup@diary-system.com}\r\n".
            "MIME-Version: 1.0\r\n".
            "Content-type: text/plain; charset=UTF-8";
        $body="Dear ".$this->username."\r\n";
        $body.="Thank you for signing up to Satu Data Raja Ampat. \r\n \r\n";
        $body.="Please click this <a href='http://raja-ampat.data-kom.com/user/activate?a=$this->activate'>link</a> to activate your account \r\n";
        $body.="or copy and paste the following link into your browser \r\n \r\n";
        $body.="http://raja-ampat.data-kom.com/user/activate?a=".$this->activate." \r\n \r\n";
        $body.="Many thanks";
        $body.="Admin Satu Data Raja Ampat";
        return mail('signup@data-kom.com',$subject,$body,$headers);

    }


}
