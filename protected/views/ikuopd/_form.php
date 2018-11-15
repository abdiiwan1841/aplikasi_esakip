<?php
/* @var $this IkuopdController */
/* @var $model Ikuopd */
/* @var $form TbActiveForm */
?>

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
    echo $form->hiddenField($model, 'sasaranid');
    echo $form->textAreaControlGroup($model, 'data_pertimbangan', array('rows' => 6, 'span' => 8));
    ?>

    <?php echo $form->textFieldControlGroup($model, 'sumber_data', array('span' => 5, 'maxlength' => 150)); ?>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?php echo TbHtml::submitButton($model->isNewRecord ? 'Simpan' : 'Perbaharui', array(
                'color' => TbHtml::BUTTON_COLOR_SUCCESS,
                'size' => TbHtml::BUTTON_SIZE_DEFAULT,
            )); ?>
        </div>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->