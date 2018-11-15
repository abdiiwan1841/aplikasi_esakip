<?php

/**
 * This is the model class for table "tistilah".
 *
 * The followings are the available columns in table 'tistilah':
 * @property string $xpid
 * @property string $nmist
 * @property string $ket
 * @property string $cdt
 * @property string $cuser
 */
class Istilah extends MActiveRecord
{
    /**
     * @return Active Connection string
     */
    public function getDbConnection()
    {
        return self::getMasterDbConnection();
    }
    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tistilah';
	}


	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nmist, ket', 'required'),
			array('cuser', 'length', 'max'=>20),
			array('cdt', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('nmist, ket, cdt, cuser', 'safe', 'on'=>'search'),
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
			'xpid' => 'ID',
			'nmist' => 'Istilah',
			'ket' => 'Keterangan',
			'cdt' => 'Recorded',
			'cuser' => 'Oleh',
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

		$criteria->compare('xpid',$this->xpid,true);
		$criteria->compare('nmist',$this->nmist,true);
		$criteria->compare('ket',$this->ket,true);
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
	 * @return Tistilah the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
