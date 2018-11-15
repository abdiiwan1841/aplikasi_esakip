<?php
/* @var $this DataikuController*/
/* @var $model Dataiku */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('\TbActiveForm', array(
        'id' => 'perjanjian-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableClientValidation' => true,
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
        'enableAjaxValidation' => false,
    )); ?>

    <p class="help-block">Isian yang bertanda <span class="required">*</span> wajib diisi.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php
        $idopd= Yii::app()->user->getOpd();
        $opts = CHtml::listData(Pejabat::model()->findAll("id_instansi=$idopd"), 'id', 'nama_pejabat');
        echo $form->dropDownListControlGroup($model, 'pejabatid', $opts, array('span' => 5, 'maxlength' => 7, 'empty' => ''));
    ?>
    <?php echo $form->textFieldControlGroup($model, 'sasaran_strategis', array('span' => 5, 'maxlength' => 255)); ?>
    <?php echo $form->textFieldControlGroup($model, 'indikator', array('span' => 5, 'maxlength' => 255)); ?>
    <?php echo $form->textFieldControlGroup($model, 'target', array('span' => 5, 'maxlength' => 100)); ?>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?php echo TbHtml::submitButton($model->isNewRecord ? 'Simpan' : 'Perbaharui', array(
                'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                'size' => TbHtml::BUTTON_SIZE_LARGE,
            )); ?>
        </div>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->