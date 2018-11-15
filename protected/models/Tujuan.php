<?php

/**
 * This is the model class for table "ttujuan".
 *
 * The followings are the available columns in table 'ttujuan':
 * @property string $tujuanid
 * @property string $id_instansi
 * @property integer $nomor_misi
 * @property integer $nomor_tujuan
 * @property string $tujuan
 */
class Tujuan extends RActiveRecord
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
		return 'ttujuan';
	}

    public function primaryKey(){
        return ('tujuanid');
    }

    /*public function beforeValidate()
    {

        return true;
    }*/

    public function beforeSave(){
        if ($this->isNewRecord) {
            if (empty($this->nomor_tujuan)) {
                $criteria = new CDbCriteria;
                $criteria->select = 'ifnull(max(nomor_tujuan),0) AS nomor_tujuan';
                $criteria->addColumnCondition(array('id_instansi' => $this->id_instansi,
                    'nomor_misi' => $this->nomor_misi));
                $row = $this->find($criteria);
                $somevariable = $row['nomor_tujuan'] + 1;

                $this->nomor_tujuan = $somevariable;
            } else {
                $criteria = new CDbCriteria;
                //$criteria->select='ifnull(max(nomor_tujuan),0) AS maxColumn';
                $criteria->addColumnCondition(array('id_instansi' => $this->id_instansi,
                    'nomor_misi' => $this->nomor_misi,
                    'nomor_tujuan' => $this->nomor_tujuan));
                $row = $this->find($criteria);
                if ($row != null) {
                    $criteria2 = new CDbCriteria;
                    $criteria2->select = 'ifnull(max(nomor_tujuan),0) AS nomor_tujuan';
                    $criteria2->addColumnCondition(array('id_instansi' => $this->id_instansi,
                        'nomor_misi' => $this->nomor_misi));
                    $row2 = $this->find($criteria2);
                    $somevariable = $row2['nomor_tujuan'] + 1;
                    $this->nomor_tujuan = $somevariable;
                }
            }
        }
        return parent::beforeSave();
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_instansi, nomor_misi, tujuan', 'required'),
			array('nomor_misi, nomor_tujuan', 'numerical', 'integerOnly'=>true),
			array('id_instansi', 'length', 'max'=>7),
            /*array('id_instansi, nomor_misi,nomor_tujuan', 'unique', 'on' => 'insert'),*/
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tujuanid, id_instansi, nomor_misi, nomor_tujuan, tujuan', 'safe', 'on'=>'search'),
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
            'datamisi' => array(self::BELONGS_TO, 'Misi', '','foreignKey' => array('id_instansi'=>'idinstansi','nomor_misi'=>'nomisi')),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'tujuanid' => 'ID',
			'id_instansi' => 'OPD',
			'nomor_misi' => 'Misi',
			'nomor_tujuan' => 'No. Tujuan',
			'tujuan' => 'Tujuan',
		);
	}

    function getFullName()
    {
        return $this->nomor_tujuan.'. '.$this->tujuan;
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

		$criteria->compare('tujuanid',$this->tujuanid,true);
        if (Yii::app()->user->isAdmin())
            $criteria->compare('id_instansi', $this->id_instansi, true);
        else $criteria->compare('id_instansi', Yii::app()->user->getOpd(), true);
		$criteria->compare('nomor_misi',$this->nomor_misi);
		$criteria->compare('nomor_tujuan',$this->nomor_tujuan);
		$criteria->compare('tujuan',$this->tujuan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tujuan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
