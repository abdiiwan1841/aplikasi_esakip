<?php
/**
 * Author: Abdi-Iwan
 * Date: 9/6/2017 9:30 PM
 * Build For : Gabungan-BIT
 */
class Laporan extends RActiveRecord
{
    /**
     * @return Active Connection string
     */
    public function getDbConnection()
    {
        return self::getPeriodeDbConnection();
    }





}

/**
 * File Name: Laporan.php
 */