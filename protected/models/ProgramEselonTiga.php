<?php

/**
 * This is the model class for table "tprogram".
 *
 * The followings are the available columns in table 'tprogram':
 * @property string $programid
 * @property string $id_instansi
 * @property integer $nomor_misi
 * @property integer $nomor_tujuan
 * @property integer $nomor_sasaran
 * @property integer $nomor_indikator
 * @property integer $nomor_program
 * @property string $program
 * @property string $pagu_anggaran
 * @property string $target_keuangan
 * @property string $realisasi_keuangan
 * @property string $target_fisik
 * @property string $realisasi_fisik
 * @property string $keterangan
 */
class ProgramEselonTiga extends RActiveRecord
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
		return 'tprogram_eselon_tiga';
	}

    public function primaryKey(){
        return ('programid');
    }
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_instansi, nomor_misi, nomor_sasaran, nomor_indikator, nomor_program', 'required'),
			array('nomor_misi, nomor_tujuan, nomor_sasaran, nomor_indikator, nomor_program', 'numerical', 'integerOnly'=>true),
			array('id_instansi', 'length', 'max'=>7),
			array('pagu_anggaran, target_keuangan, realisasi_keuangan, target_fisik, realisasi_fisik', 'length', 'max'=>18),
			array('program, keterangan', 'safe'),
            /*array('id_instansi, nomor_misi, nomor_sasaran, nomor_indikator,nomor_program', 'unique'),*/
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('programid, id_instansi, nomor_misi, nomor_tujuan, nomor_sasaran, nomor_indikator, nomor_program, program, pagu_anggaran, target_keuangan, realisasi_keuangan, target_fisik, realisasi_fisik, keterangan', 'safe', 'on'=>'search'),
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
            'datamisi' => array(self::BELONGS_TO, 'Misi', '','foreignKey' => array('id_instansi'=>'idinstansi',
				'nomor_misi'=>'nomisi')),
				
            'datatujuan' => array(self::BELONGS_TO, 'Tujuan', '','foreignKey' => array('id_instansi'=>'id_instansi',
                'nomor_misi'=>'nomor_misi',
				'nomor_tujuan'=>'nomor_tujuan')),
				
            'datasasaran' => array(self::BELONGS_TO, 'Sasaran', '','foreignKey' => array('id_instansi'=>'id_instansi',
                'nomor_misi'=>'nomor_misi',
                'nomor_tujuan'=>'nomor_tujuan',
				'nomor_sasaran'=>'nomor_sasaran')),
				
            'dataindikator' => array(self::BELONGS_TO, 'Indikator', '','foreignKey' => array('id_instansi'=>'id_instansi',
                    'nomor_misi'=>'nomor_misi',
                    'nomor_tujuan'=>'nomor_tujuan',
                    'nomor_sasaran'=>'nomor_sasaran',
                    'nomor_indikator'=>'nomor_indikator')),
            
            'dataprogram' => array(self::BELONGS_TO, 'Program', '','foreignKey' => array('id_instansi'=>'id_instansi',
                    'nomor_misi'=>'nomor_misi',
                    'nomor_tujuan'=>'nomor_tujuan',
                    'nomor_sasaran'=>'nomor_sasaran',
                    'nomor_indikator'=>'nomor_indikator',
                    'nomor_program_eselon_dua'=>'nomor_program')),

			'datapejabateselontiga' => array(self::BELONGS_TO, 'Pejabat', '','foreignKey' => array('idpejabat'=>'id')),	
		);
	}

    function getFullName()
    {
        return $this->nomor_program.'. '.$this->program;
    }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'programid' => 'ID',
			'id_instansi' => 'OPD',
			'nomor_misi' => 'No. Misi',
			'nomor_tujuan' => 'No. Tujuan',
			'nomor_sasaran' => 'Sasaran Eselon Tiga',
			'nomor_indikator' => 'Indikator Eselon Tiga',
			'nomor_program' => 'No. Program',
			'program' => 'Program',
			'pagu_anggaran' => 'Pagu Anggaran',
			'target_keuangan' => 'Target Keuangan',
			'realisasi_keuangan' => 'Realisasi Keuangan',
			'target_fisik' => 'Target Fisik',
			'realisasi_fisik' => 'Realisasi Fisik',
            'keterangan' => 'Keterangan',
            'nomor_program_eselon_dua' => 'Nomor Program Eselon Dua',
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

		$criteria->compare('programid',$this->programid,true);
        if (Yii::app()->user->isAdmin())
            $criteria->compare('id_instansi', $this->id_instansi, true);
        else $criteria->compare('id_instansi', Yii::app()->user->getOpd(), true);
		$criteria->compare('nomor_misi',$this->nomor_misi);
		$criteria->compare('nomor_tujuan',$this->nomor_tujuan);
		$criteria->compare('nomor_sasaran',$this->nomor_sasaran);
		$criteria->compare('nomor_indikator',$this->nomor_indikator);
		$criteria->compare('nomor_program',$this->nomor_program);
		$criteria->compare('program',$this->program,true);
		$criteria->compare('pagu_anggaran',$this->pagu_anggaran,true);
		$criteria->compare('target_keuangan',$this->target_keuangan,true);
		$criteria->compare('realisasi_keuangan',$this->realisasi_keuangan,true);
		$criteria->compare('target_fisik',$this->target_fisik,true);
		$criteria->compare('realisasi_fisik',$this->realisasi_fisik,true);
		$criteria->compare('keterangan',$this->keterangan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Program the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
