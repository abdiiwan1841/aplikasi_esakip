<?php

/**
 * This is the model class for table "tsasaran".
 *
 * The followings are the available columns in table 'tsasaran':
 * @property string $sasaranid
 * @property string $id_instansi
 * @property integer $nomor_misi
 * @property integer $nomor_tujuan
 * @property integer $nomor_sasaran
 * @property string $sasaran
 * @property integer $sasaran_strategis
 * @property string $capaian_sasaran
 * @property string $cdt
 */
class Ikuopd extends RActiveRecord
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
		return 'tsasaran';
	}

    public function primaryKey(){
        return ('sasaranid');
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sasaranid,id_instansi,sasaran,data_pertimbangan, sumber_data', 'required'),
            /*array('id_instansi, nomor_misi, nomor_tujuan, nomor_sasaran', 'unique'),*/
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('data_pertimbangan, sumber_data', 'safe', 'on'=>'search'),
		);
	}

    /*public function beforeSave(){
        if ($this->isNewRecord) {
            if (empty($this->nomor_sasaran)) {
                $criteria = new CDbCriteria;
                $criteria->select = 'ifnull(max(nomor_sasaran),0) AS nomor_sasaran';
                $criteria->addColumnCondition(array('id_instansi' => $this->id_instansi,
                    'nomor_misi' => $this->nomor_misi,
                    'nomor_tujuan'=>$this->nomor_tujuan ));
                $row = $this->find($criteria);
                $somevariable = $row['nomor_sasaran'] + 1;

                $this->nomor_sasaran = $somevariable;
            } else {
                $criteria = new CDbCriteria;
                $criteria->addColumnCondition(array('id_instansi' => $this->id_instansi,
                    'nomor_misi' => $this->nomor_misi,
                    'nomor_tujuan' => $this->nomor_tujuan,
                    'nomor_sasaran' => $this->nomor_sasaran));
                $row = $this->find($criteria);
                if ($row != null) {
                    $criteria2 = new CDbCriteria;
                    $criteria2->select = 'ifnull(max(nomor_sasaran),0) AS nomor_sasaran';
                    $criteria2->addColumnCondition(array('id_instansi' => $this->id_instansi,
                        'nomor_misi' => $this->nomor_misi,'nomor_tujuan'=>$this->nomor_tujuan));
                    $row2 = $this->find($criteria2);
                    $somevariable = $row2['nomor_sasaran'] + 1;
                    $this->nomor_sasaran = $somevariable;
                }
            }
        }

        $this->cdt = new CDbExpression('NOW()');

        return parent::beforeSave();
    }*/

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

    /*function getFullName()
    {
        return $this->nomor_sasaran.'. '.$this->sasaran;
    }*/

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'sasaranid' => 'ID',
			'id_instansi' =>'OPD',
			'data_pertimbangan' => 'Data Pertimbangan',
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

		$criteria->compare('sasaranid',$this->sasaranid,true);
        if (Yii::app()->user->isAdmin())
            $criteria->compare('id_instansi', $this->id_instansi, true);
        else $criteria->compare('id_instansi', Yii::app()->user->getOpd(), true);
		$criteria->compare('data_pertimbangan',$this->nomor_misi);
		$criteria->compare('sumber_data',$this->nomor_tujuan);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=>'id_instansi,nomor_misi,nomor_tujuan,nomor_sasaran',
                'multiSort'=>true,
            ),
		));
	}


	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return sasaran the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
