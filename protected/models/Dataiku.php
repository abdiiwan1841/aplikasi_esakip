<?php

/**
 * This is the model class for table "tdatarenstra".
 *
 * The followings are the available columns in table 'tdatarenstra':
 * @property integer $renstraid
 * @property string $id_instansi
 * @property string $keterangan_renstra
 * @property string $data_file_renstra
 */
class Dataiku extends RActiveRecord
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
		return 'tdataiku';
	}

    public function primaryKey(){
        return ('ikuid');
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('keterangan_iku', 'required'),
			array('id_instansi', 'length', 'max'=>7),
			array('keterangan_iku', 'length', 'max'=>100),
			array('data_file_iku', 'length', 'max'=>150),
            array('data_file_iku', 'file', 'types' => 'jpg, gif, png, pdf, doc, docx, odt, txt, xlsx, xls, csv, zip', 'allowEmpty' => true, 'maxSize' => 1024 * 1024 * 50, 'tooLarge' => 'file lebih dari 50MB. Please upload file yang lebih kecil.'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ikuid, id_instansi, keterangan_iku, data_file_iku', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ikuid' => 'ID',
			'id_instansi' => 'OPD',
			'keterangan_iku' => 'Keterangan',
			'data_file_iku' => 'File',
			'programid' => 'Program',
			'kegiatanid' => 'Kegiatan'
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

		$criteria->compare('ikuid',$this->ikuid);
        if (Yii::app()->user->isAdmin())
            $criteria->compare('id_instansi', $this->id_instansi, true);
        else $criteria->compare('id_instansi', Yii::app()->user->getOpd(), true);

		$criteria->compare('keterangan_iku',$this->keterangan_iku,true);
		$criteria->compare('data_file_iku',$this->data_file_iku,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Dataiku the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
