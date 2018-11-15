<?php
/* @var $this ProgramController */
/* @var $model Program */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('\TbActiveForm', array(
        'id' => 'program-form',
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
                    'success' => 'function(data){$("#Program_nomor_misi").html(data);$("#Program_nomor_tujuan").html("<option value=\'\'>--Pilih Tujuan--</option>");$("#Program_nomor_sasaran").html("<option value=\'\'>--Pilih Sasaran--</option>");$("#Program_nomor_indikator").html("<option value=\'\'>--Pilih Indikator--</option>");}'
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
            'data' => array('OPD' => 'js: $("#Program_id_instansi").val()', 'NoMisi' => 'js: $(this).val()'),
            'success' => 'function(data){$("#Program_nomor_tujuan").html(data);$("#Program_nomor_sasaran").html("<option value=\'\'>--Pilih Sasaran--</option>");$("#Program_nomor_indikator").html("<option value=\'\'>--Pilih Indikator--</option>");}'
        ))); ?>

    <?php
    $criteria = new CDbCriteria();
    $criteria->addCondition("id_instansi=:idx");
    $criteria->addCondition("nomor_misi=:idm");
    $criteria->params = array(':idx' => Yii::app()->user->getOpd(), ':idm' => $model->nomor_misi);
    $opts3 = CHtml::listData(Tujuan::model()->findAll($criteria), 'nomor_tujuan', 'fullName');
    echo $form->dropDownListControlGroup($model, 'nomor_tujuan', $opts3, array('span' => 5, 'maxlength' => 7, 'prompt' => '--Pilih Tujuan--',
        'ajax' => array(
            'type' => 'POST', //request type
            'url' => CController::createUrl('loaddata/loadsasaran'),
            'data' => array('OPD' => 'js: $("#Program_id_instansi").val()', 'NoMisi' => 'js: $("#Program_nomor_misi").val()', 'NoTujuan' => 'js: $(this).val()'),
            'success' => 'function(data){$("#Program_nomor_sasaran").html(data);$("#Program_nomor_indikator").html("<option value=\'\'>--Pilih Indikator--</option>");}'
        ))); ?>

    <?php
    $criteria = new CDbCriteria();
    $criteria->addCondition("id_instansi=:idx");
    $criteria->addCondition("nomor_misi=:idm");
    $criteria->addCondition("nomor_tujuan=:ids");
    $criteria->params = array(':idx' => Yii::app()->user->getOpd(), ':idm' => $model->nomor_misi, ':ids' => $model->nomor_tujuan);
    $opts4 = CHtml::listData(Sasaran::model()->findAll($criteria), 'nomor_sasaran', 'fullName');
    echo $form->dropDownListControlGroup($model, 'nomor_sasaran', $opts4, array('span' => 5, 'maxlength' => 7, 'prompt' => '--Pilih Sasaran--',
        'ajax' => array(
            'type' => 'POST', //request type
            'url' => CController::createUrl('loaddata/loadindikator'),
            'data' => array('OPD' => 'js: $("#Program_id_instansi").val()', 'NoMisi' => 'js: $("#Program_nomor_misi").val()', 'NoTujuan' => 'js: $("#Program_nomor_tujuan").val()', 'NoSasaran' => 'js: $(this).val()'),
            'success' => 'function(data){$("#Program_nomor_indikator").html(data);}'
        ))); ?>

    <?php
    $criteria = new CDbCriteria();
    $criteria->addCondition("id_instansi=:idx");
    $criteria->addCondition("nomor_misi=:idm");
    $criteria->addCondition("nomor_tujuan=:idt");
    $criteria->addCondition("nomor_sasaran=:ids");
    $criteria->params = array(':idx' => Yii::app()->user->getOpd(), ':idm' => $model->nomor_misi, ':idt' => $model->nomor_tujuan, ':ids' => $model->nomor_sasaran);
    $opts4 = CHtml::listData(Indikator::model()->findAll($criteria), 'nomor_indikator', 'fullName');
    echo $form->dropDownListControlGroup($model, 'nomor_indikator', $opts4, array('span' => 5, 'maxlength' => 7, 'prompt' => '--Pilih Indikator--')); ?>

    <?php echo $form->textFieldControlGroup($model, 'nomor_program', array('span' => 5)); ?>

    <?php echo $form->textAreaControlGroup($model, 'program', array('rows' => 6, 'span' => 8)); ?>

    <?php echo $form->textFieldControlGroup($model, 'pagu_anggaran', array('span' => 5, 'maxlength' => 18,'value' => $model->isNewRecord?0:$model->pagu_anggaran)); ?>

    <?php echo $form->textFieldControlGroup($model, 'target_keuangan', array('span' => 5, 'maxlength' => 18,'value' => $model->isNewRecord?0:$model->target_keuangan)); ?>

    <?php echo $form->textFieldControlGroup($model, 'realisasi_keuangan', array('span' => 5, 'maxlength' => 18,'value' => $model->isNewRecord?0:$model->realisasi_keuangan)); ?>

    <?php echo $form->textFieldControlGroup($model, 'target_fisik', array('span' => 5, 'maxlength' => 18,'value' => $model->isNewRecord?0:$model->target_fisik)); ?>

    <?php echo $form->textFieldControlGroup($model, 'realisasi_fisik', array('span' => 5, 'maxlength' => 18,'value' => $model->isNewRecord?0:$model->realisasi_fisik)); ?>

    <?php echo $form->textAreaControlGroup($model, 'keterangan', array('rows' => 6, 'span' => 8)); ?>

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