<?php

/**
 * This is the model class for table "xusers".
 *
 * The followings are the available columns in table 'xusers':
 * @property integer $usrxid
 * @property string $userid
 * @property string $usrpwd1
 * @property string $usrpwd2
 * @property string $id_instansi
 * @property integer $id_role
 */
class Pengguna extends RActiveRecord
{
    /**
     * @return Active Connection string
     */
    public function getDbConnection()
    {
        return self::getPeriodeDbConnection();
    }
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'xusers';
	}

    public function primaryKey(){
        return ('usrxid');
    }


	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userid, usrpwd1, id_instansi', 'required'),
			array('id_role', 'numerical', 'integerOnly'=>true),
			array('userid, usrpwd1', 'length', 'max'=>20),
			array('usrpwd2', 'length', 'max'=>50),
			array('id_instansi', 'length', 'max'=>4),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('usrxid, userid, usrpwd1, usrpwd2, id_instansi, id_role', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
            'datainstansi' => array(self::BELONGS_TO, 'Opd', '','foreignKey' => array('id_instansi'=>'id_instansi')),
            'datagrup' => array(self::BELONGS_TO, 'Gruppengguna', '','foreignKey' => array('id_role'=>'id_role')),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'usrxid' => 'ID',
			'userid' => 'User ID',
			'usrpwd1' => 'Kata Kunci',
			'id_instansi' => 'OPD',
			'id_role' => 'Grup',
		);
	}

    public function beforeSave(){
        $this->udt = new CDbExpression('NOW()');
        if ( ! $this->isNewRecord )
        {

        }
        return parent::beforeSave();
    }

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('usrxid',$this->usrxid);
		$criteria->compare('userid',$this->userid,true);
		$criteria->compare('usrpwd1',$this->usrpwd1,true);
		$criteria->compare('usrpwd2',$this->usrpwd2,true);
        if (Yii::app()->user->isAdmin())
            $criteria->compare('id_instansi', $this->id_instansi, true);
        else $criteria->compare('id_instansi', Yii::app()->user->getOpd(), true);

		$criteria->compare('id_role',$this->id_role);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pengguna the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
