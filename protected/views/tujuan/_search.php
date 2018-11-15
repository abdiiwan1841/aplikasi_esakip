<?php
/* @var $this TujuanController */
/* @var $model Tujuan */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form = $this->beginWidget('\TbActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    )); ?>

    <?php echo $form->textFieldControlGroup($model, 'tujuanid', array('span' => 5, 'maxlength' => 20)); ?>

    <?php echo $form->textFieldControlGroup($model, 'id_instansi', array('span' => 5, 'maxlength' => 7)); ?>

    <?php echo $form->textFieldControlGroup($model, 'nomor_misi', array('span' => 5)); ?>

    <?php echo $form->textFieldControlGroup($model, 'nomor_tujuan', array('span' => 5)); ?>

    <?php echo $form->textAreaControlGroup($model, 'tujuan', array('rows' => 6, 'span' => 8)); ?>

    <div class="form-actions">
        <?php echo TbHtml::submitButton('Search', array('color' => TbHtml::BUTTON_COLOR_SUCCESS,)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->