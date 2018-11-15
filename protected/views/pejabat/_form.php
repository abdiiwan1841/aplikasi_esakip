<?php
/* @var $this PejabatController */
/* @var $model Pejabat */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('\TbActiveForm', array(
        'id' => 'pejabat-form',
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
    if (Yii::app()->user->isAdmin()) {
        $opts = CHtml::listData(Opd::model()->findAll('aktif=1'), 'id_instansi', 'nama_instansi');
        echo $form->dropDownListControlGroup($model, 'id_instansi', $opts, array('span' => 5, 'maxlength' => 7, 'empty' => '',
            'ajax' => array(
                'type' => 'POST', //request type
                'url' => CController::createUrl('loaddata/loadpejabat'),
                'data' => array('OPD' => 'js: $(this).val()'),
                'success' => 'function(data){$("#Pejabat_parent_id").html(data);}'
            )
            ));
    } else {
        echo $form->hiddenField($model, 'id_instansi', array('value' => Yii::app()->user->getOpd()));
    }
    ?>

    <?php /*echo $form->textFieldControlGroup($model,'parent_id',array('span'=>5)); */ ?>

    <?php
    $idopd = Yii::app()->user->getOpd();
    $opts = CHtml::listData(Pejabat::model()->findAll("id_instansi=$idopd"), 'id', 'nama_pejabat');
    echo $form->dropDownListControlGroup($model, 'parent_id', $opts, array('span' => 5, 'maxlength' => 7, 'prompt' => 'Pilih Atasan')); ?>

    <?php echo $form->textFieldControlGroup($model, 'nama_pejabat', array('span' => 5, 'maxlength' => 255)); ?>

    <?php echo $form->textFieldControlGroup($model, 'nama_jabatan', array('span' => 5, 'maxlength' => 255)); ?>

    <?php echo $form->textFieldControlGroup($model, 'nip_pejabat', array('span' => 5, 'maxlength' => 30)); ?>
    <?php
    echo $form->dropDownListControlGroup($model, 'eselon', Constant::$listeselon, array('span' => 3, 'maxlength' => 5, 'empty' => ''));
    ?>
    <?php echo $form->textFieldControlGroup($model, 'nama_golongan_pejabat', array('span' => 5, 'maxlength' => 150)); ?>


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