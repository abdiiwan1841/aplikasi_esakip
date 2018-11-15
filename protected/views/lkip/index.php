
<div class="headline"><h2>HALAMAN PUBLIKASI - LAPORAN AKUNTABILITAS</h2></div>
<div class="row" style="height:30px;"></div>
<form id="bukalap" name="bukalap" method="get" action="<?php echo Yii::app()->baseUrl; ?>/sakiplaporan" target="_blank">
    <div class="row">
        <div class="col-sm-3">Tahun Anggaran</div>
        <div class="col-sm-2">
            <select class="form-control selectContainer input-sm" id="thnanggaran" name="t" required>
                <option value="">Pilih tahun anggaran</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
            </select>
        </div>
        <div class="col-sm-5"></div>
    </div>
    <div class="row" style="height:10px;"></div>
    <div class="row">
        <div class="col-sm-3">OPD / Instansi</div>
        <div class="col-sm-7">
            <select class="form-control selectContainer input-sm" id="pilihopd" name="o" required>
                <option value="">Pilih OPD / Instansi</option>
            </select>
        </div>
        <div class="col-sm-6"></div>
    </div>
    <div class="row" style="height:10px;"></div>
    <div class="row">
        <div class="col-sm-3">Bentuk Laporan</div>
        <div class="col-sm-2">
            <select class="form-control selectContainer input-sm" id="btkn" name="b" required>
                <option value="0">Standar</option>
                <option value="1">File PDF</option>
            </select>
        </div>
        <div class="col-sm-6"></div>
    </div>
    <div class="row" style="height:10px;"></div>
    <div class="row">
        <div class="col-sm-3">Laporan</div>
        <div class="col-sm-7">
            <select class="form-control selectContainer input-sm" id="pilihlaporan" name="l" required>
                <option value="">Pilih laporan</option>
                <option value="1">Laporan Pengukuran Kinerja Tahun</option>
                <option value="2">Laporan Pengukuran Kinerja Triwulan 1</option>
                <option value="3">Laporan Pengukuran Kinerja Triwulan 2</option>
                <option value="4">Laporan Pengukuran Kinerja Triwulan 3</option>
                <option value="5">Laporan Pengukuran Kinerja Triwulan 4</option>
                <option value="6">Laporan Realisasi Kinerja dan Anggaran Tahun</option>
                <option value="7">Laporan Realisasi Kinerja dan Anggaran Triwulan 1</option>
                <option value="8">Laporan Realisasi Kinerja dan Anggaran Triwulan 2</option>
                <option value="9">Laporan Realisasi Kinerja dan Anggaran Triwulan 3</option>
                <option value="10">Laporan Realisasi Kinerja dan Anggaran Triwulan 4</option>
                <option value="11">Laporan Analisa Efisiensi Penggunaan Sumber Daya Tahun</option>
                <option value="12">Laporan Pengukuran Kinerja Kegiatan/Aktivitas Tahun</option>
                <option value="13">Laporan Pengukuran Kinerja Kegiatan/Aktivitas Triwulan 1</option>
                <option value="14">Laporan Pengukuran Kinerja Kegiatan/Aktivitas Triwulan 2</option>
                <option value="15">Laporan Pengukuran Kinerja Kegiatan/Aktivitas Triwulan 3</option>
                <option value="16">Laporan Pengukuran Kinerja Kegiatan/Aktivitas Triwulan 4</option>
                <option value="17">Laporan Pengukuran Kinerja Indikator/Program/Kegiatan/Aktivitas Tahun</option>
                <option value="18">Laporan Rencana Aksi Tahun</option>
                <option value="19">Rencana Strategis</option>
                <option value="20">Rencana Kerja</option>
                <option value="21">Laporan Kinerja Instansi Pemerintah</option>
            </select>
        </div>
    </div>
    <div class="row" style="height:10px;"></div>
    <div class="row">
        <div class="col-sm-3 col-md-offset-3">
            <input id="btnOpen" name="c" class="btn btn-sm btn-primary col-sm-5" type="submit" value="Submit"></div>
    </div>
</form>
<div class="row" style="height:10px;"></div>
<script>
    $(function () {

        $("#thnanggaran").change(function(){
            var value = $(this).val();
            var data = {thn : value};
            $.post('<?php echo Yii::app()->baseUrl; ?>/loaddata/getopd', data, function(responseData){
                $("#pilihopd").html(responseData);
            });
        });


    });

</script>