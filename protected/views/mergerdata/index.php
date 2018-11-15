<!-- Top Bar Starts -->
<div class="top-bar clearfix">
    <div class="page-title">
        <h4>
            <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
            Merger Data
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
        <p>Data yang dimigrasi tidak menimpa data lama namun menambahkan sebagai data baru dan</p>
        <p>data akan dimasukan sebagai data tahun anggaran <strong>' . Yii::app()->user->getTahun() . '</strong></p>'); ?>
            <?php $form = $this->beginWidget('\TbActiveForm', array(
                'id' => 'copi-form',
                'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
                'enableAjaxValidation' => false,

            )); ?>

            <p class="help-block">Isian yang bertanda <span class="required">*</span> wajib diisi.</p>
            <?php if(Yii::app()->user->hasFlash('pesan')) {
                echo TbHtml::alert(TbHtml::ALERT_COLOR_INFO, Yii::app()->user->getFlash("pesan"));
            }?>
            <?php
            $list = Constant::$list_tahun;
            if (($key = array_search(Yii::app()->user->getTahun(), $list)) !== false) {
                unset($list[$key]);
            }


            echo $form->dropDownListControlGroup($model, 'tahun', $list , array('span' => 5, 'maxlength' => 7, 'prompt' => '--Pilih TA--'));
            ?>

            <?php
            $opts = CHtml::listData(Opd::model()->findAll(), 'id_instansi', 'nama_instansi');
            echo $form->dropDownListControlGroup($model, 'id_instansi', $opts, array('span' => 5, 'maxlength' => 7, 'prompt' => '--Pilih OPD--'));
            ?>

            <?php
            echo $form->dropDownListControlGroup($model, 'tabel', Constant::$list_table_copy, array('span' => 5, 'maxlength' => 7, 'prompt' => '--Pilih Data--'));
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