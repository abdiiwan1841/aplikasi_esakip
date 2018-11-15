<?php

/**
 * This is the model class for table "tperjanjian".
 *
 * The followings are the available columns in table 'tperjanjian':
 * @property integer $id
 * @property integer $pejabatid
 * @property string $sasaran_strategis
 * @property string $indikator
 * @property string $target
 */
class Perjanjian extends RActiveRecord
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
		return 'tperjanjian';
	}


	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pejabatid', 'required'),
			array('pejabatid', 'numerical', 'integerOnly'=>true),
			array('sasaran_strategis, indikator', 'length', 'max'=>255),
			array('target', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, pejabatid, sasaran_strategis, indikator, target', 'safe', 'on'=>'search'),
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
            'datapejabat' => array(self::BELONGS_TO, 'Pejabat', '','foreignKey' => array('pejabatid'=>'id')),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'pejabatid' => 'Pejabat',
			'sasaran_strategis' => 'Sasaran Strategis',
			'indikator' => 'Indikator',
			'target' => 'Target',
		);
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

		$criteria->compare('id',$this->id);
		$criteria->compare('pejabatid',$this->pejabatid);
		$criteria->compare('sasaran_strategis',$this->sasaran_strategis,true);
		$criteria->compare('indikator',$this->indikator,true);
		$criteria->compare('target',$this->target,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Perjanjian the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
