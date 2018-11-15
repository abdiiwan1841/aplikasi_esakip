<?php

/**
 * This is the model class for table "indikatorprov".
 *
 * The followings are the available columns in table 'indikatorprov':
 * @property integer $indikatorid
 * @property integer $nomor_misi
 * @property integer $nomor_sasaran
 * @property integer $nomor_indikator
 * @property string $indikator
 * @property double $target_keu
 * @property double $realisasi_keu
 * @property string $formulasi
 * @property string $sumber_data
 */
class Indikatorprov extends RActiveRecord
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
		return 'indikatorprov';
	}

    public function primaryKey(){
        return ('indikatorid');
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('indikator, id_instansi', 'required'),
			array('id_instansi', 'length', 'max'=>7),
			array('nomor_misi, nomor_sasaran, nomor_indikator, id_instansi', 'numerical', 'integerOnly'=>true),
			array('target_keu, realisasi_keu', 'numerical'),
			array('sumber_data', 'length', 'max'=>100),
			array('formulasi', 'safe'),

			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('indikatorid, nomor_misi, nomor_sasaran,id_instansi,nomor_indikator, indikator, target_keu, realisasi_keu, formulasi, sumber_data', 'safe', 'on'=>'search'),
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

    function getFullName()
    {
        return $this->indikatorid.'. '.$this->indikator;
    }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'indikatorid' => 'ID',
			'nomor_misi' => 'Nomor Misi',
			'nomor_sasaran' => 'Nomor Sasaran',
			'nomor_indikator' => 'Nomor Indikator',
			'indikator' => 'Indikator Daerah',
			'target_keu' => 'Target Keu',
			'realisasi_keu' => 'Realisasi Keu',
			'formulasi' => 'Formulasi',
			'sumber_data' => 'Sumber Data',
			'programid' => 'Program',
			'kegiatanid' => 'Kegiatan',
			'id_instansi' => 'OPD',
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

		$criteria->compare('indikatorid',$this->indikatorid);
		$criteria->compare('nomor_misi',$this->nomor_misi);
		$criteria->compare('nomor_sasaran',$this->nomor_sasaran);
		$criteria->compare('nomor_indikator',$this->nomor_indikator);
		$criteria->compare('indikator',$this->indikator,true);
		$criteria->compare('target_keu',$this->target_keu);
		$criteria->compare('realisasi_keu',$this->realisasi_keu);
		$criteria->compare('formulasi',$this->formulasi,true);
		$criteria->compare('sumber_data',$this->sumber_data,true);

		if (Yii::app()->user->isAdmin())
            $criteria->compare('id_instansi', $this->id_instansi, true);
        else $criteria->compare('id_instansi', Yii::app()->user->getOpd(), true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Indikatorprov the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
