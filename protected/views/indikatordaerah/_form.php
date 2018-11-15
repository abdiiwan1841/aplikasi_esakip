<?php
/* @var $this IndikatordaerahController */
/* @var $model Indikatordaerah */
/* @var $form TbActiveForm */
?>

<script src="<?php echo Yii::app()->baseUrl; ?>/static/js/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML"></script>
<script>
    if ( CKEDITOR.env.ie && CKEDITOR.env.version < 9 )
        CKEDITOR.tools.enableHtml5Elements( document );

    CKEDITOR.config.height = 150;
    CKEDITOR.config.width = 'auto';
    CKEDITOR.disableAutoInline = true;
</script>
<div class="form">

    <?php $form=$this->beginWidget('\TbActiveForm', array(
	'id'=>'indikatordaerah-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableClientValidation' => true,
	'layout'=>TbHtml::FORM_LAYOUT_HORIZONTAL,
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Isian yang bertanda <span class="required">*</span> wajib diisi.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php
    $opts = CHtml::listData(Indikatordaerah::model()->findAll(), 'indikatorid', 'indikator');
    echo $form->dropDownListControlGroup($model, 'idindikator', $opts, array('span' => 5, 'maxlength' => 7, 'prompt' => '--Pilih Indikator--'));
    ?>
            <?php /*echo $form->textFieldControlGroup($model,'idindikator',array('span'=>5)); */?>

                <?php /*echo $form->textFieldControlGroup($model,'level',array('span'=>5)); */?>

                <?php
                $opts6 = CHtml::listData(Misidaerah::model()->findAll(), 'idmisi', 'misi');
                echo $form->dropDownListControlGroup($model, 'misiid', $opts6, array('span' => 5, 'maxlength' => 7, 'prompt' => '--Pilih Misi--')); ?>

                <?php echo $form->textFieldControlGroup($model,'nomor_indikator',array('span'=>5)); ?>

                <?php echo $form->textAreaControlGroup($model,'indikator',array('rows'=>6,'span'=>8)); ?>

                <?php /*echo $form->textFieldControlGroup($model,'target_keu',array('span'=>5)); */?><!--

                --><?php /*echo $form->textFieldControlGroup($model,'realisasi_keu',array('span'=>5)); */?>

                <?php
                if (!empty($model->formulasi))
                {
                    $model->formulasi = base64_decode($model->formulasi);
                }
                echo $form->textAreaControlGroup($model,'formulasi',array('rows'=>6,'span'=>8,"class"=>"ckeditor")); ?>

                <?php /*echo $form->textAreaControlGroup($model,'formulasi_asli',array('rows'=>6,'span'=>8)); */?>

                <?php echo $form->textFieldControlGroup($model,'sumber_data',array('span'=>5,'maxlength'=>100)); ?>

            <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?php echo TbHtml::submitButton($model->isNewRecord ? 'Simpan' : 'Perbaharui',array(
                'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
                'size'=>TbHtml::BUTTON_SIZE_LARGE,
            )); ?>
        </div>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->