<?php
/* @var $this SasaranController */
/* @var $model Sasaran */
/* @var $form TbActiveForm */

$id_instansi =Yii::app()->user->getOpd();
$instansi=Opd::model()->find('id_instansi=:id_instansi', array('id_instansi' => $id_instansi));

mysql_connect('localhost','root','');
mysql_select_db('db2016');
?>

<?php echo TbHtml::alert(TbHtml::ALERT_COLOR_WARNING,
'<p> format file cascading yang diizinkan (.jpg, .png, .pdf, .doc, .docx, .xlsx, .xls)</p>'); ?>

<div class="form">

    <?php $form = $this->beginWidget('\TbActiveForm', array(
        'id' => 'upload-cascading-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableClientValidation' => true,
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    )); ?>

    <p class="help-block">Isian yang bertanda <span class="required">*</span> wajib diisi.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->hiddenField($model, 'id_instansi', array('value' => Yii::app()->user->getOpd())); ?>
    <?php echo $form->textFieldControlGroup($model, 'keterangan', array('span' => 5, 'maxlength' => 100,'value' => $model->isNewRecord?'':$model->keterangan)); ?>

    <?php echo $form->fileFieldControlGroup($model, 'file_cas', array('rows' => 6, 'span' => 8)); ?>

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

