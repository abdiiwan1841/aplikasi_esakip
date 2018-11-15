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
class Pejabat extends RActiveRecord
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
		return 'tpejabat';
	}

    public function primaryKey(){
        return ('id');
    }


	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_instansi, nama_pejabat, nama_jabatan,nip_pejabat,nama_golongan_pejabat,eselon', 'required'),
			array('id_instansi, parent_id', 'numerical', 'integerOnly'=>true),
			array('nama_pejabat, nama_jabatan', 'length', 'max'=>255),
            array('eselon', 'length', 'max'=>4),
            array('nip_pejabat', 'length', 'max'=>30),
			array('id_instansi', 'length', 'max'=>7),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_instansi, nama_pejabat, nama_jabatan,nip_pejabat,nama_golongan_pejabat', 'safe', 'on'=>'search'),
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
			'dataatasan' => array(self::BELONGS_TO, 'Pejabat', '','foreignKey' => array('parent_id'=>'id')),
			'datasasaraneselontiga' => array(self::BELONGS_TO, 'SasaranEselonTiga', '','foreignKey' => array('id'=>'idpejabat')),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
            'nip_pejabat' => 'NIP',
			'nama_pejabat' => 'Nama',
			'nama_jabatan' => 'Jabatan',
            'eselon' => 'Eselon',
			'id_instansi' => 'OPD',
            'nama_golongan_pejabat' => 'Golongan/Ruangan',
            'parent_id' => 'Atasan',
		);
	}

    public function getFullName()
    {
        return $this->nama_pejabat." [ ".$this->nama_jabatan." ]";
    }

    public function beforeSave(){
        //$this->udt = new CDbExpression('NOW()');

        if (empty($this->parent_id)) $this->parent_id = 0;
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

		$criteria->compare('nip_pejabat',$this->nip_pejabat);
		$criteria->compare('nama_pejabat',$this->nama_pejabat,true);
		$criteria->compare('eselon',$this->eselon,true);
        $criteria->compare('nama_jabatan',$this->nama_jabatan,true);
		$criteria->compare('nama_golongan_pejabat',$this->nama_golongan_pejabat,true);
        if (Yii::app()->user->isAdmin())
            $criteria->compare('id_instansi', $this->id_instansi, true);
        else $criteria->compare('id_instansi', Yii::app()->user->getOpd(), true);

		$criteria->compare('parent_id',$this->parent_id);

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
