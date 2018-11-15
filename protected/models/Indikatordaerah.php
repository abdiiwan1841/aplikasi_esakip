<?php

/**
 * This is the model class for table "tindikatordaerah".
 *
 * The followings are the available columns in table 'tindikatordaerah':
 * @property integer $indikatorid
 * @property integer $idindikator
 * @property integer $level
 * @property integer $nomor_indikator
 * @property string $indikator
 * @property double $target_keu
 * @property double $realisasi_keu
 * @property string $formulasi
 * @property string $formulasi_asli
 * @property string $sumber_data
 */
class Indikatordaerah extends RActiveRecord
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
		return 'tindikatordaerah';
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
			array('indikator', 'required'),
			array('idindikator, level, nomor_indikator', 'numerical', 'integerOnly'=>true),
			/*array('target_keu, realisasi_keu', 'numerical'),*/
			array('sumber_data', 'length', 'max'=>100),
			array('formulasi, formulasi_asli', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('indikatorid, idindikator, level, misiid,nomor_indikator, indikator, formulasi, formulasi_asli, sumber_data', 'safe', 'on'=>'search'),
		);
	}


    public function beforeSave()
    {
        if ($this->isNewRecord) {
            if (empty($this->nomor_indikator)) {
                $criteria = new CDbCriteria;
                $criteria->select = 'ifnull(max(nomor_indikator),0) AS nomor_indikator';
                $row = $this->find($criteria);
                $somevariable = $row['nomor_indikator'] + 1;

                $this->nomor_indikator = $somevariable;
            } else {
                $criteria = new CDbCriteria;
                $criteria->addColumnCondition(array('nomor_indikator' => $this->nomor_indikator));
                $row = $this->find($criteria);
                if ($row != null) {
                    $criteria2 = new CDbCriteria;
                    $criteria2->select = 'ifnull(max(nomor_indikator),0) AS nomor_indikator';
                    $row2 = $this->find($criteria2);
                    $somevariable = $row2['nomor_indikator'] + 1;
                    $this->nomor_indikator = $somevariable;
                }
            }
        }

        if (empty($this->idindikator)) {
            $this->idindikator=0;
        } else {
            $criteria = new CDbCriteria;
            $criteria->addColumnCondition(array('indikatorid' => $this->idindikator));
            $criteria->select = 'level';
            $row = $this->find($criteria);
            $this->level = $row['level'] + 1;
        }

        if (empty($this->formulasi))
        {
            $this->formulasi=base64_encode($this->formulasi);
        }
        return parent::beforeSave();
    }

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
            'dataindikator' => array(self::BELONGS_TO, 'Indikatordaerah', '','foreignKey' => array('idindikator'=>'indikatorid')),
            'datamisi' => array(self::BELONGS_TO, 'Misidaerah', '','foreignKey' => array('misiid'=>'idmisi')),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'indikatorid' => 'ID',
			'idindikator' => 'Indikator Induk',
			'level' => 'Level',
			'nomor_indikator' => 'Nomor Indikator',
			'indikator' => 'Indikator',
			'misiid' => 'ID Misi',
			/*'target_keu' => 'Target Keuangan',
			'realisasi_keu' => 'Realisasi Keuangan',*/
			'formulasi' => 'Formulasi',
			'formulasi_asli' => 'Formulasi Asli',
			'sumber_data' => 'Sumber Data',
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
		$criteria->compare('idindikator',$this->idindikator);
		$criteria->compare('level',$this->level);
		$criteria->compare('nomor_indikator',$this->nomor_indikator);
		$criteria->compare('indikator',$this->indikator,true);
		/*$criteria->compare('target_keu',$this->target_keu);
		$criteria->compare('realisasi_keu',$this->realisasi_keu);*/
		$criteria->compare('formulasi',$this->formulasi,true);
		/*$criteria->compare('formulasi_asli',$this->formulasi_asli,true);*/
		$criteria->compare('sumber_data',$this->sumber_data,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Indikatordaerah the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
