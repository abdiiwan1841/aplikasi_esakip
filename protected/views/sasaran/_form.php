<?php
/* @var $this SasaranController */
/* @var $model Sasaran */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('\TbActiveForm', array(
        'id' => 'sasaran-form',
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
        echo $form->dropDownListControlGroup($model, 'id_instansi', $opts,
            array('span' => 5, 'maxlength' => 7, 'prompt' => '--Pilih OPD--',
                'ajax' => array(
                    'type' => 'POST', //request type
                    'url' => CController::createUrl('loaddata/loadmisi'),
                    'data' => array('OPD' => 'js: $(this).val()'),
                    'success' => 'function(data){$("#Sasaran_nomor_misi").html(data);$("#Sasaran_nomor_tujuan").html("<option value=\'\'>--Pilih Tujuan--</option>");}'
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
    $opts2 = CHtml::listData(Misi::model()->findAll($criteria), 'nomisi', 'fullName');
    echo $form->dropDownListControlGroup($model, 'nomor_misi', $opts2, array('span' => 5, 'maxlength' => 7, 'prompt' => '--Pilih Misi--',
        'ajax' => array(
            'type' => 'POST', //request type
            'url' => CController::createUrl('loaddata/loadtujuan'),
            'data' => array('OPD' => 'js: $("#Sasaran_id_instansi").val()', 'NoMisi' => 'js: $(this).val()'),
            'success' => 'function(data){$("#Sasaran_nomor_tujuan").html(data);$("#Sasaran_nomor_indikator").html("<option value=\'\'>--Pilih Indikator--</option>");}'
        ))); ?>

    <?php
/*    $criteria = new CDbCriteria();
    $criteria->addCondition("id_instansi=:idx");
    $criteria->addCondition("nomor_misi=:idm");
    $criteria->params = array(':idx' => Yii::app()->user->getOpd(), ':idm' => $model->nomor_misi);
    $opts3 = CHtml::listData(Tujuan::model()->findAll($criteria), 'nomor_tujuan', 'fullName');
    echo $form->dropDownListControlGroup($model, 'nomor_tujuan', $opts3, array('span' => 5, 'maxlength' => 7, 'prompt' => '--Pilih Tujuan--')); */?>

    <?php
    $criteria = new CDbCriteria();
    $criteria->addCondition("id_instansi=:idx");
    $criteria->addCondition("nomor_misi=:idm");
    $criteria->params = array(':idx' => Yii::app()->user->getOpd(), ':idm' => $model->nomor_misi);
    $opts3 = CHtml::listData(Tujuan::model()->findAll($criteria), 'nomor_tujuan', 'fullName');
    echo $form->dropDownListControlGroup($model, 'nomor_tujuan', $opts3, array('span' => 5, 'maxlength' => 7, 'prompt' => '--Pilih Misi--',
        'ajax' => array(
            'type' => 'POST', //request type
            'url' => CController::createUrl('loaddata/loadindikatortujuan'),
            'data' => array('OPD' => 'js: $("#Sasaran_id_instansi").val()', 'NoMisi' => 'js: $("#Sasaran_nomor_misi").val()', 'NoTujuan' => 'js: $(this).val()'),
            'success' => 'function(data){$("#Sasaran_nomor_indikator").html(data);}'
        ))); ?>
    <?php
    $criteria = new CDbCriteria();
    $criteria->addCondition("id_instansi=:idx");
    $criteria->addCondition("nomor_misi=:idm");
    $criteria->addCondition("nomor_tujuan=:idt");
    $criteria->params = array(':idx' => Yii::app()->user->getOpd(), ':idm' => $model->nomor_misi,':idt' => $model->nomor_tujuan);
    $opts3 = CHtml::listData(Indikatortujuan::model()->findAll($criteria), 'nomor_indikator', 'fullName');
    echo $form->dropDownListControlGroup($model, 'nomor_indikator', $opts3, array('span' => 5, 'maxlength' => 7, 'prompt' => '--Pilih Indikator--')); ?>

    <?php echo $form->textFieldControlGroup($model, 'nomor_sasaran', array('span' => 5)); ?>

    <?php echo $form->textAreaControlGroup($model, 'sasaran', array('rows' => 6, 'span' => 8)); ?>

    <?php
    $opts4 = array(1 => "Ya", 0 => "Tidak");
    echo $form->dropDownListControlGroup($model, 'sasaran_strategis', $opts4, array('span' => 2, 'maxlength' => 7)); ?>

    <?php echo $form->textFieldControlGroup($model, 'capaian_sasaran', array('span' => 5, 'maxlength' => 18,'value' => $model->isNewRecord?0:$model->capaian_sasaran)); ?>


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