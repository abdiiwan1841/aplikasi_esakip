<!-- Top Bar Starts -->
<div class="top-bar clearfix">
    <div class="page-title">
        <h4>
            <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
            PENGHAPUSAN DATA
        </h4>
    </div>
</div>
<!-- Top Bar Ends -->

<!-- Container fluid Starts -->
<div class="container-fluid">

    <!-- Spacer starts -->
    <div class="spacer-xs">
        <!-- Row Starts -->
        <div class="form">
            <?php echo TbHtml::alert(TbHtml::ALERT_COLOR_WARNING, ' <h3>PENTING!!!</h3>
            <p>Data yang akan di hapus adalah data tahun anggaran <strong>' . Yii::app()->user->getTahun() . '</strong></p>
            <p>Harap hati-hati karena data saling berkaitan</p>'); ?>
            <?php $form = $this->beginWidget('\TbActiveForm', array(
                'id' => 'hapusdata-form',
                'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
                'enableAjaxValidation' => false,

            )); ?>
            <?php echo $form->hiddenField($model, 'id_instansi', array('value' => Yii::app()->user->getOpd())); ?>
            <?php echo $form->hiddenField($model, 'tahun', array('value' => Yii::app()->user->getTahun())); ?>

            <?php if(Yii::app()->user->hasFlash('pesan')) {
                echo TbHtml::alert(TbHtml::ALERT_COLOR_INFO, Yii::app()->user->getFlash("pesan"));
            }?>
            <?php echo $form->checkBoxListControlGroup($model, 'tabel', array(
                'taktivitas'=>'Aktivitas','tkegiatan'=>'Kegiatan','tprogram'=>'Program',
                'tindikator'=>'Indikator','tsasaran'=>'Sasaran','ttujuan'=>'Tujuan','tmisi'=>'Misi','tvisi'=>'Visi',
            ));
            ?>

            <div class="form-group">

                <div class="col-sm-offset-2 col-sm-10">
                    <?php echo TbHtml::submitButton('SUBMIT', array(
                        'color' => TbHtml::BUTTON_COLOR_SUCCESS,
                        'size' => TbHtml::BUTTON_SIZE_DEFAULT,
                    )); ?>
                </div>
            </div>

            <?php $this->endWidget(); ?>

        </div><!-- form -->
        <!-- Row Ends -->
    </div>
    <!-- Spacer ends -->
</div>
<!-- Container fluid ends -->