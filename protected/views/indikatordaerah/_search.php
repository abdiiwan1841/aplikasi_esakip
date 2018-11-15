<?php
/* @var $this IndikatordaerahController */
/* @var $model Indikatordaerah */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('\TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'indikatorid',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'idindikator',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'level',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'nomor_indikator',array('span'=>5)); ?>

                    <?php echo $form->textAreaControlGroup($model,'indikator',array('rows'=>6,'span'=>8)); ?>

                    <?php echo $form->textFieldControlGroup($model,'target_keu',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'realisasi_keu',array('span'=>5)); ?>

                    <?php echo $form->textAreaControlGroup($model,'formulasi',array('rows'=>6,'span'=>8)); ?>

                    <?php echo $form->textAreaControlGroup($model,'formulasi_asli',array('rows'=>6,'span'=>8)); ?>

                    <?php echo $form->textFieldControlGroup($model,'sumber_data',array('span'=>5,'maxlength'=>100)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->