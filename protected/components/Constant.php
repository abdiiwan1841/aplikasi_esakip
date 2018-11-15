<?php

class Constant extends CController {

    public static $jumlah_halaman_per_page = 20;
    
    public static $list_tahun = array("2016", "2017", "2018");

    public static $list_table_copy = array("tvisi"=>"Visi", "tmisi"=>"Misi", "ttujuan"=>"Tujuan", "tsasaran"=>"Sasaran", "tindikator"=>"Indikator");

    public static $list_boolean = array(1=>"Ya", 0=>"Tidak");

    public static $list_formula = array(
        1=>"Semakin tinggi realisasi menunjukkan pencapaian kinerja yang semakin membaik",
        // 2=>"Semakin tinggi realisasi menunjukkan semakin rendah pencapaian",
        3=>"Semakin rendah realisasi menunjukkan pencapaian kinerja yang semakin membaik");

    public static $list_role = array(
        0=>"Super Administrator",
        1=>"OPD Sakip Admin",
        2=>"OPD Sakip User",
        3=>"OPD Sakip Viewer",
        4=>"Super Viewer",
        );

    public static $list_role_opd = array(
        1=>"OPD Sakip Admin",
        2=>"OPD Sakip User",
        3=>"OPD Sakip Viewer",
        4=>"Super Viewer",
    );

    public static $listtahunLogin = array("2016"=>"2016", "2017"=>"2017");

    public static $listeselon = array("I"=>"Eselon I", "II"=>"Eselon II","III"=>"Eselon III","IV"=>"Eselon IV");
    

}

?>