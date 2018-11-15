<?php
/**
 * Author: Abdi-Iwan
 * Date: 9/3/2017 3:25 AM
 * Build For : Gabungan-BIT
 */
class RActiveRecord extends CActiveRecord {

    private static $dbAktif = null;

    protected static function getPeriodeDbConnection()
    {

        if (self::$dbAktif !== null)
            return self::$dbAktif;
        else
        {
            $db_name = Yii::app()->user->getTahun();//$user->db_name;

            self::$dbAktif = Yii::createComponent(array(
                'class' => 'CDbConnection',
                'connectionString'=>"mysql:host=".Yii::app()->params['dbhost'].";dbname=db".$db_name, //dynamic database name here
                'enableProfiling' => true,
                'enableParamLogging' => true,
                'username'=>Yii::app()->params['dbuser'],
                'password'=> Yii::app()->params['dbpwd'], //password here
                'charset'=>'utf8',
                'emulatePrepare' => true,
            ));
            Yii::app()->setComponent('dbadvert', self::$dbAktif);

            if (self::$dbAktif instanceof CDbConnection)
            {
                Yii::app()->db->setActive(false);
                Yii::app()->dbadvert->setActive(true);
                return self::$dbAktif;
            }
            else{
                throw new CDbException(Yii::t('yii','Active Record requires a "db" CDbConnection application component.'));
            }

        }
    }
}

/**
 * File Name: RActiveRecord.php
 */