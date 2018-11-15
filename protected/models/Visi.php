<?php

/**
 * This is the model class for table "tvisi".
 *
 * The followings are the available columns in table 'tvisi':
 * @property string $id_instansi
 * @property string $visi
 * @property string $cdt
 * @property string $cuser
 */
class Visi extends RActiveRecord {//CActiveRecord {

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
		return 'tvisi';
	}

    public function primaryKey(){
        return ('id_instansi');
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_instansi, visi', 'required'),
			array('id_instansi', 'length', 'max'=>7),
			array('cuser', 'length', 'max'=>20),
			array('cdt', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_instansi, visi, cdt, cuser', 'safe', 'on'=>'search'),
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
            //'id_instansi' => array(self::BELONGS_TO, 'Topd', 'id_instansi'),
            'datainstansi' => array(self::BELONGS_TO, 'Opd', '','foreignKey' => array('id_instansi'=>'id_instansi')),
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_instansi' => 'OPD',
			'visi' => 'Visi',
			'cdt' => 'Recorded',
			'cuser' => 'Oleh',
		);
	}

    public function beforeSave(){
        $this->cdt = new CDbExpression('NOW()');
        $this->cuser = Yii::app()->user->getName();
        return parent::beforeSave();
    }


    /*public function findall(){

        $model3 = Yii::app()->db->createCommand()
            ->select("*")
            ->from("topd")
            ->order("id_instansi")
            ->queryAll();


     return $model3 ;
    }*/

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

        if (Yii::app()->user->isAdmin())
            $criteria->compare('id_instansi', $this->id_instansi, true);
        else $criteria->compare('id_instansi', Yii::app()->user->getOpd(), true);
		$criteria->compare('visi',$this->visi,true);
		$criteria->compare('cdt',$this->cdt,true);
		$criteria->compare('cuser',$this->cuser,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tvisi the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
