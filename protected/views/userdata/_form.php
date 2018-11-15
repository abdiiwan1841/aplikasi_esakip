<?php
/* @var $this VisiController */
/* @var $model Tvisi */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('\TbActiveForm', array(
        'id' => 'visi-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    )); ?>

    <p class="help-block">Isian yang bertanda <span class="required">*</span> wajib diisi.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php
    if (Yii::app()->user->isAdmin()) {
        $opts = CHtml::listData(Opd::model()->findAll(), 'id_instansi', 'nama_instansi');
        echo $form->dropDownListControlGroup($model, 'id_instansi', $opts, array('span' => 5, 'maxlength' => 7, 'empty' => ''));
    } else {
        //echo $form->hiddenField($model, 'id_instansi');
        echo $form->hiddenField($model, 'id_instansi', array('value' => Yii::app()->user->getOpd()));
    }
    ?>
    <?php
    echo $form->dropDownListControlGroup($model, 'id_role', Constant::$list_role_opd, array('span' => 5, 'maxlength' => 7, 'empty' => '')); ?>

    <?php echo $form->textFieldControlGroup($model, 'userid', array('rows' => 6, 'span' => 8)); ?>

    <?php echo $model->isNewRecord ? $form->textFieldControlGroup($model, 'usrpwd1', array('rows' => 6, 'span' => 8)) : ""; ?>

    <?php /*echo $form->textFieldControlGroup($model,'cdt',array('span'=>5)); */ ?><!--

            --><?php /*echo $form->textFieldControlGroup($model,'cuser',array('span'=>5,'maxlength'=>20)); */ ?>
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