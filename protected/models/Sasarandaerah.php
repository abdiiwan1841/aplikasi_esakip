<?php

/**
 * This is the model class for table "tsasarandaerah".
 *
 * The followings are the available columns in table 'tsasarandaerah':
 * @property integer $idsasaran
 * @property integer $no_misi
 * @property integer $no_sasaran
 * @property string $sasaran
 */
class Sasarandaerah extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tsasarandaerah';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('no_misi, no_sasaran', 'numerical', 'integerOnly'=>true),
			array('sasaran', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idsasaran, no_misi, no_sasaran, sasaran', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idsasaran' => 'Idsasaran',
			'no_misi' => 'No Misi',
			'no_sasaran' => 'No Sasaran',
			'sasaran' => 'Sasaran',
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

		$criteria->compare('idsasaran',$this->idsasaran);
		$criteria->compare('no_misi',$this->no_misi);
		$criteria->compare('no_sasaran',$this->no_sasaran);
		$criteria->compare('sasaran',$this->sasaran,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Sasarandaerah the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
