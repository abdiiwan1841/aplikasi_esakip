<?php

/**
 * This is the model class for table "tmisi".
 *
 * The followings are the available columns in table 'tmisi':
 * @property string $misid
 * @property integer $nomisi
 * @property string $idinstansi
 * @property string $misi
 * @property string $cdt
 * @property string $cuser
 * @property string $udt
 * @property string $uuser
 */
class Misi extends RActiveRecord
{

    /**
     * @return Active Connection string
     */
    public function getDbConnection()
    {
        return self::getPeriodeDbConnection();
    }

    public function primaryKey(){
        return ('misid');
    }

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tmisi';
	}


    /**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idinstansi, misi', 'required'),
			array('nomisi', 'numerical', 'integerOnly'=>true),
			array('idinstansi', 'length', 'max'=>7),
			array('cuser, uuser', 'length', 'max'=>20),
			array('cdt,udt', 'safe'),
            /*array('idinstansi, nomisi', 'unique', 'on' => 'insert'),*/
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('misid, nomisi, idinstansi, misi, cdt, cuser, udt, uuser', 'safe', 'on'=>'search'),
		);
	}

    public function beforeSave(){
        if ($this->isNewRecord) {

            $maxNilai = Yii::app()->db->createCommand()
                ->select('ifnull(max(nomisi),0) as max')
                ->from('tmisi')
                ->where('idinstansi=:id', array(':id'=>$this->idinstansi))
                ->queryScalar();
            $this->nomisi = $maxNilai + 1;

            $this->cdt = new CDbExpression('NOW()');
            $this->cuser = Yii::app()->user->getName();
        } else
        {
            $this->udt = new CDbExpression('NOW()');
            $this->uuser = Yii::app()->user->getName();
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
            //'id_instansi' => array(self::BELONGS_TO, 'Topd', 'id_instansi'),
            'datainstansi' => array(self::BELONGS_TO, 'Opd', '','foreignKey' => array('idinstansi'=>'id_instansi')),
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'misid' => 'ID',
			'nomisi' => 'No. Misi',
			'idinstansi' => 'OPD',
			'misi' => 'Misi',
			'cdt' => 'Dibuat',
			'cuser' => 'Oleh',
			'udt' => 'Diupdate',
			'uuser' => 'Oleh',
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

		$criteria->compare('misid',$this->misid,true);
		$criteria->compare('nomisi',$this->nomisi);
        if (Yii::app()->user->isAdmin())
            $criteria->compare('idinstansi', $this->idinstansi, true);
        else $criteria->compare('idinstansi', Yii::app()->user->getOpd(), true);
		$criteria->compare('misi',$this->misi,true);
		$criteria->compare('cdt',$this->cdt,true);
		$criteria->compare('cuser',$this->cuser,true);
		$criteria->compare('udt',$this->udt,true);
		$criteria->compare('uuser',$this->uuser,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    function getFullName()
    {
        return $this->nomisi.'. '.$this->misi;
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Misi the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
