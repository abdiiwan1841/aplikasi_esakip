<?php

/**
 * This is the model class for table "tperjanjian_anggaran".
 *
 * The followings are the available columns in table 'tperjanjian_anggaran':
 * @property integer $id
 * @property integer $pejabatid
 * @property string $nama_program
 * @property double $pagu_anggaran
 * @property string $sumber_dana
 */
class Anggaranpk extends RActiveRecord
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
		return 'tperjanjian_anggaran';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pejabatid, nama_program', 'required'),
			array('pejabatid', 'numerical', 'integerOnly'=>true),
			array('pagu_anggaran', 'numerical'),
			array('nama_program', 'length', 'max'=>255),
			array('sumber_dana', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, pejabatid, nama_program, pagu_anggaran, sumber_dana', 'safe', 'on'=>'search'),
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
			'pejabatid' => 'Pejabatid',
			'nama_program' => 'Nama Program',
			'pagu_anggaran' => 'Pagu Anggaran',
			'sumber_dana' => 'Sumber Dana',
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
		$criteria->compare('nama_program',$this->nama_program,true);
		$criteria->compare('pagu_anggaran',$this->pagu_anggaran);
		$criteria->compare('sumber_dana',$this->sumber_dana,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Anggaranpk the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
