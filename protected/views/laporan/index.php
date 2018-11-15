<!-- Top Bar Starts -->
<div class="top-bar clearfix">
    <div class="page-title">
        <h4>
            <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
            <?php echo $title?>
        </h4>
    </div>
</div>
<!-- Top Bar Ends -->

<!-- Container fluid Starts -->
<div class="container-fluid">

    <!-- Spacer starts -->
    <div class="spacer-xs">
        <!-- Row Starts -->
        <div class="form-horizontal">
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-5">
                    <?php echo TbHtml::alert(TbHtml::ALERT_COLOR_INFO,
                        '<p>Silakan Pilih Target Laporan</p>'); ?>
                </div>
            </div>
            <?php if ($kriteria) {?>
            <div class="form-group">
                <label class="col-sm-2 control-label required" for="opt">Kriteria <span class="required">*</span></label>
                <div class="col-md-5">
                    <select maxlength="7" controlwidthclass="col-sm-10" class="form-control" name="opt" id="opt">
                        <option value="0">Periode Berjalan</option>
                        <option value="1">Triwulan 1</option>
                        <option value="2">Triwulan 2</option>
                        <option value="3">Triwulan 3</option>
                        <option value="4">Triwulan 4</option>
                    </select></div>
            </div>
            <?php } ?>

            <div class="form-group" style="margin-bottom: 0px;">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="button" id="btndisplay" class="btn btn-success">Display</button>
                    <button type="button" id="btnpdf" class="btn btn-success">PDF</button>
                </div>
            </div>
        </div>
        <!-- Row Ends -->
    </div>
    <!-- Spacer ends -->
</div>
<!-- Container fluid ends -->

<script>
    $(function () {
        var idPildata="";
        $('#btndisplay').click(function () {
            <?php
            $os = array(1,2,4);
            if (in_array($pilihan,$os)) {
            ?>
                idPildata = "&f="+$("#opt").val();
            <?php
            } else {
            ?>
                idPildata = "&f=0";
            <?php
                }
             ?>
            $('<form action="<?php echo Yii::app()->baseUrl?>/laporan/showlaporan/&opt=<?php echo $pilihan ?>&tr=1'+idPildata+'" method="get" target="_blank" style="display:none"/>'
            ).appendTo("body").submit().remove();
        });

        $('#btnpdf').click(function () {
            <?php
            $os = array(1,2,4);
            if (in_array($pilihan,$os)) {
            ?>
            idPildata = "&f="+$("#opt").val();
            <?php
            } else {
            ?>
            idPildata = "&f=0";
            <?php
            }
            ?>
            $('<form action="<?php echo Yii::app()->baseUrl?>/laporan/showlaporan/&opt=<?php echo $pilihan ?>&tr=2'+idPildata+'" method="get" target="_blank" style="display:none"/>'
            ).appendTo("body").submit().remove();
        });
    });
</script>