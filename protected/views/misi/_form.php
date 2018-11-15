<?php
/* @var $this MisiController */
/* @var $model Misi */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('\TbActiveForm', array(
        'id' => 'misi-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
        'enableAjaxValidation' => false,
    )); ?>

    <p class="help-block">Isian yang bertanda <span class="required">*</span> wajib diisi.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php
    if (Yii::app()->user->isAdmin()) {
        $opts = CHtml::listData(Opd::model()->findAll(), 'id_instansi', 'nama_instansi');
        echo $form->dropDownListControlGroup($model, 'idinstansi', $opts, array('span' => 5, 'maxlength' => 7, 'empty' => ''));
    } else {
        echo $form->hiddenField($model, 'idinstansi', array('value' => Yii::app()->user->getOpd()));
    }
    ?>

    <?php
    if (!$model->isNewRecord) {
        /*echo $form->hiddenField($model, 'nomisi');*/
        echo $form->textFieldControlGroup($model, 'nomisi', array('span' => 2, 'disabled' => true));
    }
    ?>

    <?php /*echo $form->textFieldControlGroup($model, 'nomisi', array('span' => 5)); */ ?>


    <?php echo $form->textAreaControlGroup($model, 'misi', array('rows' => 6, 'span' => 8)); ?>

    <!-- <?php /*echo $form->textFieldControlGroup($model,'cdt',array('span'=>5)); */ ?>

                <?php /*echo $form->textFieldControlGroup($model,'cuser',array('span'=>5,'maxlength'=>20)); */ ?>

                <?php /*echo $form->textFieldControlGroup($model,'udt',array('span'=>5)); */ ?>

                --><?php /*echo $form->textFieldControlGroup($model,'uuser',array('span'=>5,'maxlength'=>20)); */ ?>

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