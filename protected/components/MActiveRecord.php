<?php
/**
 * Author: Abdi-Iwan
 * Date: 9/3/2017 3:25 AM
 * Build For : Gabungan-BIT
 */
class MActiveRecord extends CActiveRecord {

    private static $dbMaster = null;

    protected static function getMasterDbConnection()
    {

        if (self::$dbMaster !== null)
            return self::$dbMaster;
        else
        {
            self::$dbMaster = Yii::createComponent(array(
                'class' => 'CDbConnection',
                'connectionString'=>"mysql:host=".Yii::app()->params['dbhost'].";dbname=db_esakip", //dynamic database name here
                'enableProfiling' => true,
                'enableParamLogging' => true,
                'username'=>Yii::app()->params['dbuser'],
                'password'=> Yii::app()->params['dbpwd'], //password here
                'charset'=>'utf8',
                'emulatePrepare' => true,
            ));
            Yii::app()->setComponent('dbmaster', self::$dbMaster);

            if (self::$dbMaster instanceof CDbConnection)
            {
                Yii::app()->db->setActive(false);
                Yii::app()->dbmaster->setActive(true);
                return self::$dbMaster;
            }
            else{
                throw new CDbException(Yii::t('yii','Active Record requires a "db" CDbConnection application component.'));
            }

        }
    }
}

/**
 * File Name: MActiveRecord.php
 */