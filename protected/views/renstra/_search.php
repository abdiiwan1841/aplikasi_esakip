<?php
/* @var $this RenstraController */
/* @var $model Datarenstra */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form = $this->beginWidget('\TbActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    )); ?>

    <?php echo $form->textFieldControlGroup($model, 'renstraid', array('span' => 5)); ?>

    <?php echo $form->textFieldControlGroup($model, 'id_instansi', array('span' => 5, 'maxlength' => 7)); ?>

    <?php echo $form->textFieldControlGroup($model, 'keterangan_renstra', array('span' => 5, 'maxlength' => 100)); ?>

    <?php echo $form->textFieldControlGroup($model, 'data_file_renstra', array('span' => 5, 'maxlength' => 150)); ?>

    <div class="form-actions">
        <?php echo TbHtml::submitButton('Search', array('color' => TbHtml::BUTTON_COLOR_PRIMARY,)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->