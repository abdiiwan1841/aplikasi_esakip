<?php
/* @var $this IstilahController */
/* @var $model Tistilah */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'tistilah-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    )); ?>

    <p class="help-block">Isian yang bertanda <span class="required">*</span> wajib diisi.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->textAreaControlGroup($model, 'nmist', array('rows' => 6, 'span' => 8)); ?>

    <?php echo $form->textAreaControlGroup($model, 'ket', array('rows' => 6, 'span' => 8)); ?>

    <?php echo $form->textFieldControlGroup($model, 'cdt', array('span' => 5)); ?>

    <?php echo $form->textFieldControlGroup($model, 'cuser', array('span' => 5, 'maxlength' => 20)); ?>

    <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Simpan' : 'Perbaharui', array(
            'color' => TbHtml::BUTTON_COLOR_PRIMARY,
            'size' => TbHtml::BUTTON_SIZE_LARGE,
        )); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->