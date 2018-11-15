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
class FilePohonKinerja extends RActiveRecord
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
		return 'ref_upload_pohon_kinerja';
	}

    public function primaryKey(){
        return ('id');
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_instansi, keterangan', 'required'),
			array('id', 'numerical', 'integerOnly'=>true),
			array('file_pk', 'length', 'max'=>150),
            array('file_pk', 'file', 'types' => 'jpg, png, pdf, doc, docx, xlsx, xls', 'allowEmpty' => false, 'maxSize' => 1024 * 1024 * 50, 'tooLarge' => 'file lebih dari 50MB. Please upload file yang lebih kecil.'),
            /*array('id_instansi, nomor_misi, nomor_tujuan, nomor_sasaran', 'unique'),*/
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_instansi, file_pk', 'safe', 'on'=>'search'),
			array('file_pk', 'safe', 'on'=>'create'),
			
		);
	}

    // public function beforeSave(){
    //     if ($this->isNewRecord) {
    //         if (empty($this->nomor_sasaran)) {
    //             $criteria = new CDbCriteria;
    //             $criteria->select = 'ifnull(max(nomor_sasaran),0) AS nomor_sasaran';
    //             $criteria->addColumnCondition(array('id_instansi' => $this->id_instansi,
    //                 'nomor_misi' => $this->nomor_misi,
    //                 'nomor_tujuan'=>$this->nomor_tujuan ));
    //             $row = $this->find($criteria);
    //             $somevariable = $row['nomor_sasaran'] + 1;

    //             $this->nomor_sasaran = $somevariable;
    //         } else {
    //             $criteria = new CDbCriteria;
    //             $criteria->addColumnCondition(array('id_instansi' => $this->id_instansi,
    //                 'nomor_misi' => $this->nomor_misi,
    //                 'nomor_tujuan' => $this->nomor_tujuan,
    //                 'nomor_sasaran' => $this->nomor_sasaran));
    //             $row = $this->find($criteria);
    //             if ($row != null) {
    //                 $criteria2 = new CDbCriteria;
    //                 $criteria2->select = 'ifnull(max(nomor_sasaran),0) AS nomor_sasaran';
    //                 $criteria2->addColumnCondition(array('id_instansi' => $this->id_instansi,
    //                     'nomor_misi' => $this->nomor_misi,'nomor_tujuan'=>$this->nomor_tujuan));
    //                 $row2 = $this->find($criteria2);
    //                 $somevariable = $row2['nomor_sasaran'] + 1;
    //                 $this->nomor_sasaran = $somevariable;
    //             }
    //         }
    //     }

    //     if (empty($this->nomor_indikator)) {
    //         $this->nomor_indikator = 0;
    //     }

    //     $this->cdt = new CDbExpression('NOW()');

    //     return parent::beforeSave();
    // }

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

    function getFullName()
    {
        return $this->file_pk.'. '.$this->nama_instansi;
    }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_instansi' => 'ID Instansi',
			'datainstansi.nama_instansi' => 'Nama Instansi',
			'file_pk' => 'File Pohon Kinerja',
			'update_time' => 'Waktu Update',
			'keterangan' => 'Keterangan',
		);
	}

	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
        if (Yii::app()->user->isAdmin())
            $criteria->compare('id_instansi', $this->id_instansi, true);
        else $criteria->compare('id_instansi', Yii::app()->user->getOpd(), true);

		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('file_pk',$this->file_pk,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
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
	// public function search()
	// {
	// 	// @todo Please modify the following code to remove attributes that should not be searched.

	// 	$criteria=new CDbCriteria;

	// 	$criteria->compare('id',$this->id,true);
    //     if (Yii::app()->user->isAdmin())
    //         $criteria->compare('id_instansi', $this->id_instansi, true);
    //     else $criteria->compare('id_instansi', Yii::app()->user->getOpd(), true);
	// 	$criteria->compare('id_instansi',$this->id_instansi);
	// 	$criteria->compare('file_pk',$this->file_pk);

	// 	return new CActiveDataProvider($this, array(
	// 		'criteria'=>$criteria,
    //         'sort'=>array(
    //             'defaultOrder'=>'id,id_instansi,file_pk, update_time',
    //             'multiSort'=>true,
    //         ),
	// 	));
	// }


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

	public function upload()
    {
        if ($this->validate()) { 
            foreach ($this->imageFiles as $file) {
                $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }
}
