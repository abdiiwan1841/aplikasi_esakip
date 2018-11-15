<?php
/**
 * Author: Abdi-Iwan
 * Date: 9/12/2017 4:20 AM
 * Build For : Gabungan-BIT
 */

class MyHelpers
{

    public static function nilaidb($poin,$pil=1,$ta=2016) {

        if ($ta==2016)
        {
            if($poin>=80){
                $extracted="#17A589";
            }
            elseif ($poin<80 && $poin>=60) {
                $extracted="#5DADE2";
            } elseif($poin>=50 && $poin<60) {
                $extracted="#F7DC6F";
            } elseif($poin<50 && $poin>0) {$extracted="#F1948A";
            }
            else {$extracted="#BFC9CA";}

            return $extracted;
        } else {

            if ($pil > 2) {
                $criteria = new CDbCriteria();
                $criteria->addCondition(":poin between nilai_3 and nilai_4");
                $criteria->params = array(':poin' => $poin);
                $rowc = Nilaikinerja::model()->find($criteria);

            } else {
                $criteria = new CDbCriteria();
                $criteria->addCondition(":poin between nilai_1 and nilai_2");
                $criteria->params = array(':poin' => $poin);
                $rowc = Nilaikinerja::model()->find($criteria);
            }
            if (count($rowc)> 0) {
                return $rowc["warna"];
            } else {
                return $extracted = "";
            }
        }
    }

    public static function keterangan_nilai($nile,$ta)
    {
        if ($ta == 2016) {
            echo '<td bgcolor="#17A589" style="width:20px;">SB</td>
                <td style="width:100px;">Sangat Baik [>=80%]</td>
                <td bgcolor="#5DADE2" style="width:20px;">B</td>
                <td style="width:100px;">Baik [60-79,99%]</td>
                <td bgcolor="#F7DC6F" style="width:20px;">SD</td>
                <td style="width:100px;">Sedang [50-59,99%]</td>
                <td bgcolor="#F1948A" style="width:20px;">K</td>
                <td style="width:100px;">Kurang [0,-49,99%]</td>
                <td bgcolor="#BFC9CA" style="width:20px;">BD</td>
                <td style="width:100px;">Data Tidak Lengkap [0%]</td>';
        } else {
            $criteria = new CDbCriteria(array('order'=>'nilai_1 DESC'));
            $rowc = Nilaikinerja::model()->findAll($criteria);

            foreach ($rowc as $row) {
                echo '<td bgcolor="' . $row["warna"] . '" style="width:20px;text-align: center">' . $row["kategori_abjad"] . '</td>';
                if ($nile == 1 || $nile == 2) {
                    echo '<td style="width:100px">' . $row["keterangan_kategori"] . ' [ ' . $row["nilai_1"] . '-' . $row["nilai_2"] . ' ] </td>';

                } else {
                    echo '<td style="width:100px;">' . $row["keterangan_kategori"] . ' [ ' . $row["nilai_3"] . '-' . $row["nilai_4"] . ' ] </td>';
                }

            }
        }
    }

    public static function fgetonedata($db,$table,$id2search){

        $dsn = "mysql:host=".Yii::app()->params['dbhost'].";dbname=db".$db;
        $connection=new CDbConnection($dsn,Yii::app()->params['dbuser'],Yii::app()->params['dbpwd']);
        $connection->active=true;

        switch ($table){
            case "topd":
                $sqlstr="select nama_instansi as ergebnis from $table where id_instansi='$id2search'";
                break;
            case "trole":
                $sqlstr="select keterangan as ergebnis from $table where id_role='$id2search'";
                break;
            case "indikatorprov":
                $sqlstr="select indikator as ergebnis from $table where indikatorid='$id2search'";
                break;
        }
        $row =  $connection->createCommand($sqlstr)->queryRow();
        $connection->active=false;
        return $row['ergebnis'];
    }

    public static function nilaiByValue($poin,$pil=1,$ta=2016) {

        if ($ta==2016)
        {
            if($poin>=80){
                $extracted="#17A589";
            }
            elseif ($poin<80 && $poin>=60) {
                $extracted="#5DADE2";
            } elseif($poin>=50 && $poin<60) {
                $extracted="#F7DC6F";
            } elseif($poin<50 && $poin>0) {$extracted="#F1948A";
            }
            else {$extracted="#BFC9CA";}

            return $extracted;
        } else {

            $dsn = "mysql:host=".Yii::app()->params['dbhost'].";dbname=db".$ta;
            $connection=new CDbConnection($dsn,Yii::app()->params['dbuser'],Yii::app()->params['dbpwd']);
            $connection->active=true;

            if ($pil > 2) {
                $sql = "SELECT warna FROM tnilaikinerja where $poin between nilai_3 and nilai_4 ORDER BY nilai_1 DESC limit 1";

            } else {
                $sql = "SELECT warna FROM tnilaikinerja where $poin between nilai_1 and nilai_2 ORDER BY nilai_1 DESC limit 1";
            }
            $rowc =$connection->createCommand($sql)->queryRow();
            if (count($rowc)> 0) {
                return $rowc["warna"];
            } else {
                return $extracted = "";
            }
            $connection->active=false;
        }
    }

    public static function keteranganNilai($nile,$ta)
    {
        if ($ta == 2016) {
            echo '<td bgcolor="#17A589" style="width:20px;">SB</td>
                <td style="width:100px;">Sangat Baik [>=80%]</td>
                <td bgcolor="#5DADE2" style="width:20px;">B</td>
                <td style="width:100px;">Baik [60-79,99%]</td>
                <td bgcolor="#F7DC6F" style="width:20px;">SD</td>
                <td style="width:100px;">Sedang [50-59,99%]</td>
                <td bgcolor="#F1948A" style="width:20px;">K</td>
                <td style="width:100px;">Kurang [0,-49,99%]</td>
                <td bgcolor="#BFC9CA" style="width:20px;">BD</td>
                <td style="width:100px;">Data Tidak Lengkap [0%]</td>';
        } else {
            $dsn = "mysql:host=".Yii::app()->params['dbhost'].";dbname=db".$ta;
            $connection=new CDbConnection($dsn,Yii::app()->params['dbuser'],Yii::app()->params['dbpwd']);
            $connection->active=true;

            $sqlstr="SELECT * FROM tnilaikinerja ORDER BY nilai_1 DESC";
            $rowc = $connection->createCommand($sqlstr)->queryAll();

            foreach ($rowc as $row) {
                echo '<td bgcolor="' . $row["warna"] . '" style="width:20px;text-align: center">' . $row["kategori_abjad"] . '</td>';
                if ($nile == 1 || $nile == 2) {
                    echo '<td style="width:100px">' . $row["keterangan_kategori"] . ' [ ' . $row["nilai_1"] . '-' . $row["nilai_2"] . ' ] </td>';

                } else {
                    echo '<td style="width:100px;">' . $row["keterangan_kategori"] . ' [ ' . $row["nilai_3"] . '-' . $row["nilai_4"] . ' ] </td>';
                }

            }
            $connection->active=false;
        }
    }

    public static function fgetindikator($db, $nindikator,$nsasaran,$ntujuan,$nmisi,$idx){

        $dsn = "mysql:host=".Yii::app()->params['dbhost'].";dbname=db".$db;
        $connection=new CDbConnection($dsn,Yii::app()->params['dbuser'],Yii::app()->params['dbpwd']);
        $connection->active=true;

        $sqlstr="select indikator from tindikator where nomor_misi=$nmisi and nomor_tujuan=$ntujuan";
        $sqlstr .=" and nomor_sasaran=$nsasaran and nomor_indikator=$nindikator and id_instansi='$idx'";
        $row =  $connection->createCommand($sqlstr)->queryRow();
        $connection->active=false;
        return $row['indikator'];
    }

    public static function fgetsasaran($db, $nsasaran,$ntujuan,$nmisi, $idx){

        $dsn = "mysql:host=".Yii::app()->params['dbhost'].";dbname=db".$db;
        $connection=new CDbConnection($dsn,Yii::app()->params['dbuser'],Yii::app()->params['dbpwd']);
        $connection->active=true;

        $sqlstr="select sasaran from tsasaran where nomor_misi=$nmisi and nomor_tujuan=$ntujuan";
        $sqlstr .=" and nomor_sasaran=$nsasaran and id_instansi='$idx'";
        $row =  $connection->createCommand($sqlstr)->queryRow();
        $connection->active=false;
        return $row['sasaran'];
    }

    public static function fgetprogram($db, $nprogram,$nindikator,$nsasaran,$ntujuan,$nmisi,$idx){
        $dsn = "mysql:host=".Yii::app()->params['dbhost'].";dbname=db".$db;
        $connection=new CDbConnection($dsn,Yii::app()->params['dbuser'],Yii::app()->params['dbpwd']);
        $connection->active=true;

        $sqlstr="select program from tprogram where nomor_misi=$nmisi and nomor_tujuan=$ntujuan";
        $sqlstr .=" and nomor_sasaran=$nsasaran and nomor_indikator=$nindikator and nomor_program=$nprogram and id_instansi='$idx'";

        $row =  $connection->createCommand($sqlstr)->queryRow();
        $connection->active=false;
        return $row['program'];
    }

    public static function fgetkegiatan($db, $nkegiatan,$nprogram,$nindikator,$nsasaran,$ntujuan,$nmisi,$idx){
        $dsn = "mysql:host=".Yii::app()->params['dbhost'].";dbname=db".$db;
        $connection=new CDbConnection($dsn,Yii::app()->params['dbuser'],Yii::app()->params['dbpwd']);
        $connection->active=true;

        $sqlstr="select kegiatan from tkegiatan where nomor_misi=$nmisi and nomor_tujuan=$ntujuan";
        $sqlstr .=" and nomor_sasaran=$nsasaran and nomor_indikator=$nindikator and nomor_program=$nprogram";
        $sqlstr .=" and nomor_kegiatan=$nkegiatan and id_instansi='$idx'";

        $row =  $connection->createCommand($sqlstr)->queryRow();
        $connection->active=false;

        return $row['kegiatan'];
    }
}

/**
 * File Name: MyHelpers.php
 */