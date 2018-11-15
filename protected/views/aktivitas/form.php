<?php
/* @var $this AktivitasController */
/* @var $model Aktivitas */
?>

<?php
$this->breadcrumbs = array(
    'Aktivitases' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'Daftar Aktivitas', 'url' => array('index')),
);
?>

<div class="top-bar clearfix">
    <div class="page-title">
        <h4>
            <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
            LAPORAN RENCANA AKSI
        </h4>
    </div>
    <div class="pull-right" id="mini-nav-right">
        <?php
        echo TbHtml::buttonDropdown('Aksi', $this->menu, array('split' => false, 'dropup' => false, 'menuOptions' => array('pull' => TbHtml::PULL_RIGHT)));;
        ?>
    </div>
</div>
<div class="container-fluid">
    <div class="spacer-xs">
        <div class="form-horizontal">
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-5">
                    <?php echo TbHtml::alert(TbHtml::ALERT_COLOR_INFO,
                        '<p>Silakan Pilih Target Laporan</p>'); ?>
                </div>
            </div>

            <div class="form-group" style="margin-bottom: 0px;">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="button" id="btndisplay" class="btn btn-success">Display</button>
                    <button type="button" id="btnpdf" class="btn btn-success">PDF</button>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    $(function () {
        $('#btndisplay').click(function () {

            $('<form action="<?php echo Yii::app()->baseUrl?>/aktivitas/showlaporan/1" method="get" target="_blank" style="display:none"/>'
            ).appendTo("body").submit().remove();
        });

        $('#btnpdf').click(function () {

            $('<form action="<?php echo Yii::app()->baseUrl?>/aktivitas/showlaporan/2" method="get" target="_blank" style="display:none"/>'
            ).appendTo("body").submit().remove();
        });
    });
</script>
