<?php
/* @var $this TujuanController */
/* @var $model Tujuan */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('\TbActiveForm', array(
        'id' => 'tujuan-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
        'enableClientValidation' => true,
        'enableAjaxValidation' => false,
    )); ?>

    <p class="help-block">Isian yang bertanda <span class="required">*</span> wajib diisi.</p>

    <?php echo $form->errorSummary($model); ?>


    <?php
    if (Yii::app()->user->isAdmin()) {
        $opts = CHtml::listData(Opd::model()->findAll('aktif=1'), 'id_instansi', 'nama_instansi');
        echo $form->dropDownListControlGroup($model, 'id_instansi', $opts,
            array('span' => 5, 'maxlength' => 7, 'prompt' => '--Pilih OPD--',
                'ajax' => array(
                    'type' => 'POST', //request type
                    'url' => CController::createUrl('loaddata/loadmisi'),
                    'data' => array('OPD' => 'js: $(this).val()'),
                    'success' => 'function(data){$("#Tujuan_nomor_misi").html(data);}'
                )
            ));
    } else {
        echo $form->hiddenField($model, 'id_instansi', array('value' => Yii::app()->user->getOpd()));
    }
    ?>

    <?php
    $criteria = new CDbCriteria();
    $criteria->addCondition("idinstansi=:idx");
    $criteria->params = array(':idx' => Yii::app()->user->getOpd());
    $opts2 = CHtml::listData(Misi::model()->findAll($criteria), 'nomisi', 'fullname');
    echo $form->dropDownListControlGroup($model, 'nomor_misi', $opts2, array('span' => 5, 'maxlength' => 7, 'empty' => '')); ?>

    <?php echo $form->textFieldControlGroup($model, 'nomor_tujuan', array('span' => 5)); ?>

    <?php echo $form->textAreaControlGroup($model, 'tujuan', array('rows' => 6, 'span' => 8)); ?>

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