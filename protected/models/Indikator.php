<?php

/**
 * This is the model class for table "tindikator".
 *
 * The followings are the available columns in table 'tindikator':
 * @property string $indikatorid
 * @property string $id_instansi
 * @property integer $nomor_misi
 * @property integer $nomor_tujuan
 * @property integer $nomor_sasaran
 * @property integer $nomor_indikator
 * @property string $indikator
 * @property string $satuan
 * @property integer $indikator_kinerja_utama
 * @property string $target_rpjm1
 * @property string $target_rpjm2
 * @property string $target_rpjm3
 * @property string $target_rpjm4
 * @property string $target_rpjm5
 * @property string $target_tahun_sebelumnya
 * @property string $realisasi_tahun_sebelumnya
 * @property string $target
 * @property string $realisasi
 * @property double $target_akhir_renstra
 * @property string $keterangan
 * @property string $analisis
 * @property integer $tipe_formula
 * @property string $target_triwulan1
 * @property string $target_triwulan2
 * @property string $target_triwulan3
 * @property string $target_triwulan4
 * @property string $realisasi_triwulan1
 * @property string $realisasi_triwulan2
 * @property string $realisasi_triwulan3
 * @property string $realisasi_triwulan4
 * @property string $keterangan_triwulan1
 * @property string $keterangan_triwulan2
 * @property string $keterangan_triwulan3
 * @property string $keterangan_triwulan4
 * @property string $penjelasan_formulasi
 * @property string $sumber_data
 * @property integer $indikator_pk
 */
class Indikator extends RActiveRecord
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
		return 'tindikator';
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
			array('id_instansi, nomor_misi, nomor_sasaran, nomor_indikator', 'required'),
			array('nomor_misi, nomor_tujuan, nomor_sasaran, nomor_indikator, indikator_kinerja_utama, tipe_formula, indikator_pk', 'numerical', 'integerOnly'=>true),
			array('target_akhir_renstra', 'numerical'),
			array('id_instansi', 'length', 'max'=>7),
			array('target_rpjm1, target_rpjm2, target_rpjm3, target_rpjm4, target_rpjm5, target_tahun_sebelumnya, realisasi_tahun_sebelumnya, target, realisasi, target_triwulan1, target_triwulan2, target_triwulan3, target_triwulan4, realisasi_triwulan1, realisasi_triwulan2, realisasi_triwulan3, realisasi_triwulan4', 'length', 'max'=>18),
			array('indikator, satuan, keterangan, analisis, keterangan_triwulan1, keterangan_triwulan2, keterangan_triwulan3, keterangan_triwulan4, penjelasan_formulasi, sumber_data', 'safe'),
            /*array('id_instansi, nomor_misi, nomor_sasaran, nomor_indikator', 'unique'),*/
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('indikatorid, id_instansi, nomor_misi, nomor_tujuan, nomor_sasaran, nomor_indikator, indikator, satuan, indikator_kinerja_utama, target_rpjm1, target_rpjm2, target_rpjm3, target_rpjm4, target_rpjm5, target_tahun_sebelumnya, realisasi_tahun_sebelumnya, target, realisasi, target_akhir_renstra, keterangan, analisis, tipe_formula, target_triwulan1, target_triwulan2, target_triwulan3, target_triwulan4, realisasi_triwulan1, realisasi_triwulan2, realisasi_triwulan3, realisasi_triwulan4, keterangan_triwulan1, keterangan_triwulan2, keterangan_triwulan3, keterangan_triwulan4, penjelasan_formulasi, sumber_data, indikator_pk', 'safe', 'on'=>'search'),
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
                'nomor_sasaran'=>'nomor_sasaran')
                )
		);
	}

    function getFullName()
    {
        return $this->nomor_indikator.'. '.$this->indikator;
    }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'indikatorid' => 'ID',
			'id_instansi' => 'OPD',
			'nomor_misi' => 'No. Misi',
			'nomor_tujuan' => 'No. Tujuan',
			'nomor_sasaran' => 'No. Sasaran',
			'nomor_indikator' => 'No. Indikator',
			'indikator' => 'Indikator',
			'satuan' => 'Satuan',
			'indikator_kinerja_utama' => 'Indikator Kinerja Utama',
			'target_rpjm1' => 'Target Rpjm 1',
			'target_rpjm2' => 'Target Rpjm 2',
			'target_rpjm3' => 'Target Rpjm 3',
			'target_rpjm4' => 'Target Rpjm 4',
			'target_rpjm5' => 'Target Rpjm 5',
			'target_tahun_sebelumnya' => 'Target Tahun Sebelumnya',
			'realisasi_tahun_sebelumnya' => 'Realisasi Tahun Sebelumnya',
			'target' => 'Target Tahun Berjalan',
			'realisasi' => 'Realisasi Tahun Berjalan',
			'target_akhir_renstra' => 'Target Akhir Renstra',
			'keterangan' => 'Keterangan',
			'analisis' => 'Analisis',
			'tipe_formula' => 'Tipe Formula',
			'target_triwulan1' => 'Target Triwulan 1',
			'target_triwulan2' => 'Target Triwulan 2',
			'target_triwulan3' => 'Target Triwulan 3',
			'target_triwulan4' => 'Target Triwulan 4',
			'realisasi_triwulan1' => 'Realisasi Triwulan 1',
			'realisasi_triwulan2' => 'Realisasi Triwulan 2',
			'realisasi_triwulan3' => 'Realisasi Triwulan 3',
			'realisasi_triwulan4' => 'Realisasi Triwulan 4',
			'keterangan_triwulan1' => 'Keterangan Triwulan 1',
			'keterangan_triwulan2' => 'Keterangan Triwulan 2',
			'keterangan_triwulan3' => 'Keterangan Triwulan 3',
			'keterangan_triwulan4' => 'Keterangan Triwulan 4',
			'penjelasan_formulasi' => 'Penjelasan Formulas i',
			'sumber_data' => 'Sumber Data',
			'indikator_pk' => 'Indikator PK',
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

		$criteria->compare('indikatorid',$this->indikatorid,true);
        if (Yii::app()->user->isAdmin())
            $criteria->compare('id_instansi', $this->id_instansi, true);
        else $criteria->compare('id_instansi', Yii::app()->user->getOpd(), true);
		$criteria->compare('nomor_misi',$this->nomor_misi);
		$criteria->compare('nomor_tujuan',$this->nomor_tujuan);
		$criteria->compare('nomor_sasaran',$this->nomor_sasaran);
		$criteria->compare('nomor_indikator',$this->nomor_indikator);
		$criteria->compare('indikator',$this->indikator,true);
		$criteria->compare('satuan',$this->satuan,true);
		$criteria->compare('indikator_kinerja_utama',$this->indikator_kinerja_utama);
		$criteria->compare('target_rpjm1',$this->target_rpjm1,true);
		$criteria->compare('target_rpjm2',$this->target_rpjm2,true);
		$criteria->compare('target_rpjm3',$this->target_rpjm3,true);
		$criteria->compare('target_rpjm4',$this->target_rpjm4,true);
		$criteria->compare('target_rpjm5',$this->target_rpjm5,true);
		$criteria->compare('target_tahun_sebelumnya',$this->target_tahun_sebelumnya,true);
		$criteria->compare('realisasi_tahun_sebelumnya',$this->realisasi_tahun_sebelumnya,true);
		$criteria->compare('target',$this->target,true);
		$criteria->compare('realisasi',$this->realisasi,true);
		$criteria->compare('target_akhir_renstra',$this->target_akhir_renstra);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('analisis',$this->analisis,true);
		$criteria->compare('tipe_formula',$this->tipe_formula);
		$criteria->compare('target_triwulan1',$this->target_triwulan1,true);
		$criteria->compare('target_triwulan2',$this->target_triwulan2,true);
		$criteria->compare('target_triwulan3',$this->target_triwulan3,true);
		$criteria->compare('target_triwulan4',$this->target_triwulan4,true);
		$criteria->compare('realisasi_triwulan1',$this->realisasi_triwulan1,true);
		$criteria->compare('realisasi_triwulan2',$this->realisasi_triwulan2,true);
		$criteria->compare('realisasi_triwulan3',$this->realisasi_triwulan3,true);
		$criteria->compare('realisasi_triwulan4',$this->realisasi_triwulan4,true);
		$criteria->compare('keterangan_triwulan1',$this->keterangan_triwulan1,true);
		$criteria->compare('keterangan_triwulan2',$this->keterangan_triwulan2,true);
		$criteria->compare('keterangan_triwulan3',$this->keterangan_triwulan3,true);
		$criteria->compare('keterangan_triwulan4',$this->keterangan_triwulan4,true);
		$criteria->compare('penjelasan_formulasi',$this->penjelasan_formulasi,true);
		$criteria->compare('sumber_data',$this->sumber_data,true);
		$criteria->compare('indikator_pk',$this->indikator_pk);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Indikator the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
