<?php
/* @var $this PeraturanController */
/* @var $model Perundangan */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form = $this->beginWidget('\TbActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    )); ?>

    <?php echo $form->textFieldControlGroup($model, 'xpid', array('span' => 5, 'maxlength' => 20)); ?>

    <?php echo $form->textAreaControlGroup($model, 'nmperu', array('rows' => 6, 'span' => 8)); ?>

    <?php echo $form->textFieldControlGroup($model, 'nmr', array('span' => 5, 'maxlength' => 20)); ?>

    <?php echo $form->textFieldControlGroup($model, 'thn', array('span' => 5, 'maxlength' => 4)); ?>

    <?php echo $form->textFieldControlGroup($model, 'filenm', array('span' => 5, 'maxlength' => 253)); ?>

    <?php echo $form->textFieldControlGroup($model, 'cdt', array('span' => 5)); ?>

    <?php echo $form->textFieldControlGroup($model, 'cuser', array('span' => 5, 'maxlength' => 20)); ?>

    <div class="form-actions">
        <?php echo TbHtml::submitButton('Search', array('color' => TbHtml::BUTTON_COLOR_SUCCESS,)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->