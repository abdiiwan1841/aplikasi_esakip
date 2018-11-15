<?php

/**
 * This is the model class for table "tkegiatan".
 *
 * The followings are the available columns in table 'tkegiatan':
 * @property string $kegiatanid
 * @property string $id_instansi
 * @property integer $nomor_misi
 * @property integer $nomor_tujuan
 * @property integer $nomor_sasaran
 * @property integer $nomor_indikator
 * @property integer $nomor_program
 * @property integer $nomor_kegiatan
 * @property string $kegiatan
 * @property string $pagu_anggaran
 * @property string $target_keuangan
 * @property string $realisasi_keuangan
 * @property string $target_fisik
 * @property string $realisasi_fisik
 * @property string $target_keuangan_triwulan1
 * @property string $target_keuangan_triwulan2
 * @property string $target_keuangan_triwulan3
 * @property string $target_keuangan_triwulan4
 * @property string $realisasi_keuangan_triwulan1
 * @property string $realisasi_keuangan_triwulan2
 * @property string $realisasi_keuangan_triwulan3
 * @property string $realisasi_keuangan_triwulan4
 * @property string $target_fisik_triwulan1
 * @property string $target_fisik_triwulan2
 * @property string $target_fisik_triwulan3
 * @property string $target_fisik_triwulan4
 * @property string $realisasi_fisik_triwulan1
 * @property string $realisasi_fisik_triwulan2
 * @property string $realisasi_fisik_triwulan3
 * @property string $realisasi_fisik_triwulan4
 * @property integer $nomor_misi_provinsi
 * @property integer $nomor_sasaran_provinsi
 * @property integer $nomor_indikator_provinsi
 * @property string $ket
 */
class Kegiatan extends RActiveRecord
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
		return 'tkegiatan';
	}

    public function primaryKey(){
        return ('kegiatanid');
    }
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_instansi, nomor_misi, nomor_tujuan, nomor_sasaran, nomor_indikator, nomor_program, nomor_kegiatan', 'required'),
			array('nomor_misi, nomor_tujuan, nomor_sasaran, nomor_indikator, nomor_program, nomor_kegiatan, nomor_misi_provinsi, nomor_sasaran_provinsi, nomor_indikator_provinsi', 'numerical', 'integerOnly'=>true),
			array('id_instansi', 'length', 'max'=>7),
			array('pagu_anggaran, target_keuangan, realisasi_keuangan, target_fisik, realisasi_fisik, target_keuangan_triwulan1, target_keuangan_triwulan2, target_keuangan_triwulan3, target_keuangan_triwulan4, realisasi_keuangan_triwulan1, realisasi_keuangan_triwulan2, realisasi_keuangan_triwulan3, realisasi_keuangan_triwulan4, target_fisik_triwulan1, target_fisik_triwulan2, target_fisik_triwulan3, target_fisik_triwulan4, realisasi_fisik_triwulan1, realisasi_fisik_triwulan2, realisasi_fisik_triwulan3, realisasi_fisik_triwulan4', 'length', 'max'=>18),
			array('kegiatan, ket', 'safe'),
            /*array('id_instansi, nomor_misi, nomor_sasaran, nomor_indikator,nomor_program,nomor_kegiatan', 'unique'),*/
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('kegiatanid, id_instansi, nomor_misi, nomor_tujuan, nomor_sasaran, nomor_indikator, nomor_program, nomor_kegiatan, kegiatan, pagu_anggaran, target_keuangan, realisasi_keuangan, target_fisik, realisasi_fisik, target_keuangan_triwulan1, target_keuangan_triwulan2, target_keuangan_triwulan3, target_keuangan_triwulan4, realisasi_keuangan_triwulan1, realisasi_keuangan_triwulan2, realisasi_keuangan_triwulan3, realisasi_keuangan_triwulan4, target_fisik_triwulan1, target_fisik_triwulan2, target_fisik_triwulan3, target_fisik_triwulan4, realisasi_fisik_triwulan1, realisasi_fisik_triwulan2, realisasi_fisik_triwulan3, realisasi_fisik_triwulan4, nomor_misi_provinsi, nomor_sasaran_provinsi, nomor_indikator_provinsi, ket', 'safe', 'on'=>'search'),
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
                'nomor_program'=>'nomor_program')),
           'dataindikatorprov' => array(self::BELONGS_TO, 'Indikatorprov', '','foreignKey' => array('nomor_indikator_provinsi'=>'indikatorid')),

		);
	}

    function getFullName()
    {
        return $this->nomor_kegiatan.'. '.$this->kegiatan;
    }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'kegiatanid' => 'ID',
			'id_instansi' => 'OPD',
			'nomor_misi' => 'No. Misi',
			'nomor_tujuan' => 'No. Tujuan',
			'nomor_sasaran' => 'No. Sasaran',
			'nomor_indikator' => 'No. Indikator',
			'nomor_program' => 'No. Program',
			'nomor_kegiatan' => 'No. Kegiatan',
			'kegiatan' => 'Kegiatan',
			'pagu_anggaran' => 'Pagu Anggaran',
			'target_keuangan' => 'Target Keuangan',
			'realisasi_keuangan' => 'Realisasi Keuangan',
			'target_fisik' => 'Target Fisik',
			'realisasi_fisik' => 'Realisasi Fisik',
			'target_keuangan_triwulan1' => 'Target Keuangan Triwulan 1',
			'target_keuangan_triwulan2' => 'Target Keuangan Triwulan 2',
			'target_keuangan_triwulan3' => 'Target Keuangan Triwulan 3',
			'target_keuangan_triwulan4' => 'Target Keuangan Triwulan 4',
			'realisasi_keuangan_triwulan1' => 'Realisasi Keuangan Triwulan 1',
			'realisasi_keuangan_triwulan2' => 'Realisasi Keuangan Triwulan 2',
			'realisasi_keuangan_triwulan3' => 'Realisasi Keuangan Triwulan 3',
			'realisasi_keuangan_triwulan4' => 'Realisasi Keuangan Triwulan 4',
			'target_fisik_triwulan1' => 'Target Fisik Triwulan 1',
			'target_fisik_triwulan2' => 'Target Fisik Triwulan 2',
			'target_fisik_triwulan3' => 'Target Fisik Triwulan 3',
			'target_fisik_triwulan4' => 'Target Fisik Triwulan 4',
			'realisasi_fisik_triwulan1' => 'Realisasi Fisik Triwulan 1',
			'realisasi_fisik_triwulan2' => 'Realisasi Fisik Triwulan 2',
			'realisasi_fisik_triwulan3' => 'Realisasi Fisik Triwulan 3',
			'realisasi_fisik_triwulan4' => 'Realisasi Fisik Triwulan 4',
			'nomor_misi_provinsi' => 'Nomor Misi Provinsi',
			'nomor_sasaran_provinsi' => 'Nomor Sasaran Provinsi',
			'nomor_indikator_provinsi' => 'Indikator Provinsi',
			'ket' => 'Keterangan',
			'idpejabat_eselon_tiga' => 'ID Pejabat Eselon Tiga',
			'idpejabat_eselon_empat' => 'ID Pejabat Eselon Empat'

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

		$criteria->compare('kegiatanid',$this->kegiatanid,true);
        if (Yii::app()->user->isAdmin())
            $criteria->compare('id_instansi', $this->id_instansi, true);
        else $criteria->compare('id_instansi', Yii::app()->user->getOpd(), true);
		$criteria->compare('nomor_misi',$this->nomor_misi);
		$criteria->compare('nomor_tujuan',$this->nomor_tujuan);
		$criteria->compare('nomor_sasaran',$this->nomor_sasaran);
		$criteria->compare('nomor_indikator',$this->nomor_indikator);
		$criteria->compare('nomor_program',$this->nomor_program);
		$criteria->compare('nomor_kegiatan',$this->nomor_kegiatan);
		$criteria->compare('kegiatan',$this->kegiatan,true);
		$criteria->compare('pagu_anggaran',$this->pagu_anggaran,true);
		$criteria->compare('target_keuangan',$this->target_keuangan,true);
		$criteria->compare('realisasi_keuangan',$this->realisasi_keuangan,true);
		$criteria->compare('target_fisik',$this->target_fisik,true);
		$criteria->compare('realisasi_fisik',$this->realisasi_fisik,true);
		$criteria->compare('target_keuangan_triwulan1',$this->target_keuangan_triwulan1,true);
		$criteria->compare('target_keuangan_triwulan2',$this->target_keuangan_triwulan2,true);
		$criteria->compare('target_keuangan_triwulan3',$this->target_keuangan_triwulan3,true);
		$criteria->compare('target_keuangan_triwulan4',$this->target_keuangan_triwulan4,true);
		$criteria->compare('realisasi_keuangan_triwulan1',$this->realisasi_keuangan_triwulan1,true);
		$criteria->compare('realisasi_keuangan_triwulan2',$this->realisasi_keuangan_triwulan2,true);
		$criteria->compare('realisasi_keuangan_triwulan3',$this->realisasi_keuangan_triwulan3,true);
		$criteria->compare('realisasi_keuangan_triwulan4',$this->realisasi_keuangan_triwulan4,true);
		$criteria->compare('target_fisik_triwulan1',$this->target_fisik_triwulan1,true);
		$criteria->compare('target_fisik_triwulan2',$this->target_fisik_triwulan2,true);
		$criteria->compare('target_fisik_triwulan3',$this->target_fisik_triwulan3,true);
		$criteria->compare('target_fisik_triwulan4',$this->target_fisik_triwulan4,true);
		$criteria->compare('realisasi_fisik_triwulan1',$this->realisasi_fisik_triwulan1,true);
		$criteria->compare('realisasi_fisik_triwulan2',$this->realisasi_fisik_triwulan2,true);
		$criteria->compare('realisasi_fisik_triwulan3',$this->realisasi_fisik_triwulan3,true);
		$criteria->compare('realisasi_fisik_triwulan4',$this->realisasi_fisik_triwulan4,true);
		$criteria->compare('nomor_misi_provinsi',$this->nomor_misi_provinsi);
		$criteria->compare('nomor_sasaran_provinsi',$this->nomor_sasaran_provinsi);
		$criteria->compare('nomor_indikator_provinsi',$this->nomor_indikator_provinsi);
		$criteria->compare('ket',$this->ket,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Kegiatan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
