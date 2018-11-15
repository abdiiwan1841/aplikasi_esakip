<?php
/* @var $this AktivitasController */
/* @var $model Aktivitas */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('\TbActiveForm', array(
        'id' => 'aktivitas-form',
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
                    'success' => 'function(data){$("#Aktivitas_nomor_misi").html(data);$("#Aktivitas_nomor_tujuan").html("<option value=\'\'>--Pilih Tujuan--</option>");$("#Aktivitas_nomor_sasaran").html("<option value=\'\'>--Pilih Sasaran--</option>");$("#Aktivitas_nomor_indikator").html("<option value=\'\'>--Pilih Indikator--</option>");$("#Aktivitas_nomor_program").html("<option value=\'\'>--Pilih Program--</option>");$("#Aktivitas_nomor_kegiatan").html("<option value=\'\'>--Pilih Kegiatan--</option>");}'
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
            'data' => array('OPD' => 'js: $("#Aktivitas_id_instansi").val()', 'NoMisi' => 'js: $(this).val()'),
            'success' => 'function(data){$("#Aktivitas_nomor_tujuan").html(data);$("#Aktivitas_nomor_sasaran").html("<option value=\'\'>--Pilih Sasaran--</option>");$("#Aktivitas_nomor_indikator").html("<option value=\'\'>--Pilih Indikator--</option>");$("#Aktivitas_nomor_program").html("<option value=\'\'>--Pilih Program--</option>");$("#Aktivitas_nomor_kegiatan").html("<option value=\'\'>--Pilih Kegiatan--</option>");}'
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
            'data' => array('OPD' => 'js: $("#Aktivitas_id_instansi").val()', 'NoMisi' => 'js: $("#Aktivitas_nomor_misi").val()', 'NoTujuan' => 'js: $(this).val()'),
            'success' => 'function(data){$("#Aktivitas_nomor_sasaran").html(data);$("#Aktivitas_nomor_indikator").html("<option value=\'\'>--Pilih Indikator--</option>");$("#Aktivitas_nomor_program").html("<option value=\'\'>--Pilih Program--</option>");$("#Aktivitas_nomor_kegiatan").html("<option value=\'\'>--Pilih Kegiatan--</option>");}'
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
            'data' => array('OPD' => 'js: $("#Aktivitas_id_instansi").val()', 'NoMisi' => 'js: $("#Aktivitas_nomor_misi").val()', 'NoTujuan' => 'js: $("#Aktivitas_nomor_tujuan").val()', 'NoSasaran' => 'js: $(this).val()'),
            'success' => 'function(data){$("#Aktivitas_nomor_indikator").html(data);$("#Aktivitas_nomor_program").html("<option value=\'\'>--Pilih Program--</option>");$("#Aktivitas_nomor_kegiatan").html("<option value=\'\'>--Pilih Kegiatan--</option>");}'
        ))); ?>

    <?php
    $criteria = new CDbCriteria();
    $criteria->addCondition("id_instansi=:idx");
    $criteria->addCondition("nomor_misi=:idm");
    $criteria->addCondition("nomor_tujuan=:idt");
    $criteria->addCondition("nomor_sasaran=:ids");
    $criteria->params = array(':idx' => Yii::app()->user->getOpd(), ':idm' => $model->nomor_misi, ':idt' => $model->nomor_tujuan, ':ids' => $model->nomor_sasaran);
    $opts5 = CHtml::listData(Indikator::model()->findAll($criteria), 'nomor_indikator', 'fullName');
    echo $form->dropDownListControlGroup($model, 'nomor_indikator', $opts5, array('span' => 5, 'maxlength' => 7, 'prompt' => '--Pilih Indikator--',
        'ajax' => array(
            'type' => 'POST', //request type
            'url' => CController::createUrl('loaddata/loadprogram'),
            'data' => array('OPD' => 'js: $("#Aktivitas_id_instansi").val()', 'NoMisi' => 'js: $("#Aktivitas_nomor_misi").val()', 'NoTujuan' => 'js: $("#Aktivitas_nomor_tujuan").val()', 'NoSasaran' => 'js: $("#Aktivitas_nomor_sasaran").val()', 'NoIndikator' => 'js: $(this).val()'),
            'success' => 'function(data){$("#Aktivitas_nomor_program").html(data);$("#Aktivitas_nomor_kegiatan").html("<option value=\'\'>--Pilih Kegiatan--</option>");}'
        ))); ?>


    <?php
    $criteria = new CDbCriteria();
    $criteria->addCondition("id_instansi=:idx");
    $criteria->addCondition("nomor_misi=:idm");
    $criteria->addCondition("nomor_tujuan=:idt");
    $criteria->addCondition("nomor_sasaran=:ids");
    $criteria->addCondition("nomor_indikator=:idk");
    $criteria->addCondition("nomor_program=:idp");
    $criteria->params = array(':idx' => Yii::app()->user->getOpd(), ':idm' => $model->nomor_misi, ':idt' => $model->nomor_tujuan, ':ids' => $model->nomor_sasaran, ':idk' => $model->nomor_indikator, ':idp' => $model->nomor_program);
    $opts6 = CHtml::listData(Program::model()->findAll($criteria), 'nomor_program', 'fullName');
    echo $form->dropDownListControlGroup($model, 'nomor_program', $opts6, array('span' => 5, 'maxlength' => 7, 'prompt' => '--Pilih Program--',
        'ajax' => array(
            'type' => 'POST', //request type
            'url' => CController::createUrl('loaddata/loadkegiatan'),
            'data' => array('OPD' => 'js: $("#Aktivitas_id_instansi").val()', 'NoMisi' => 'js: $("#Aktivitas_nomor_misi").val()', 'NoTujuan' => 'js: $("#Aktivitas_nomor_tujuan").val()', 'NoSasaran' => 'js: $("#Aktivitas_nomor_sasaran").val()', 'NoIndikator' => 'js: $("#Aktivitas_nomor_indikator").val()', 'NoProgram' => 'js: $(this).val()'),
            'success' => 'function(data){$("#Aktivitas_nomor_kegiatan").html(data);}'
        ))); ?>



    <?php /*echo $form->textFieldControlGroup($model,'nomor_kegiatan',array('span'=>5)); */ ?>

    <?php
    $criteria = new CDbCriteria();
    $criteria->addCondition("id_instansi=:idx");
    $criteria->addCondition("nomor_misi=:idm");
    $criteria->addCondition("nomor_tujuan=:idt");
    $criteria->addCondition("nomor_sasaran=:ids");
    $criteria->addCondition("nomor_indikator=:idk");
    $criteria->addCondition("nomor_kegiatan=:idkeg");
    $criteria->params = array(':idx' => Yii::app()->user->getOpd(), ':idm' => $model->nomor_misi, ':idt' => $model->nomor_tujuan, ':ids' => $model->nomor_sasaran, ':idk' => $model->nomor_indikator, ':idkeg' => $model->nomor_kegiatan);
    $opts6 = CHtml::listData(Kegiatan::model()->findAll($criteria), 'nomor_kegiatan', 'fullName');
    echo $form->dropDownListControlGroup($model, 'nomor_kegiatan', $opts6, array('span' => 5, 'maxlength' => 7, 'prompt' => '--Pilih Program--')); ?>

    <?php echo $form->textFieldControlGroup($model, 'nomor_aktivitas', array('span' => 5)); ?>

    <?php echo $form->textAreaControlGroup($model, 'aktivitas', array('rows' => 6, 'span' => 8)); ?>

    <?php echo $form->textFieldControlGroup($model, 'pagu_anggaran', array('span' => 5, 'maxlength' => 18,'value' => $model->isNewRecord?0:$model->pagu_anggaran)); ?>

    <?php echo $form->textFieldControlGroup($model, 'target_keuangan', array('span' => 5, 'maxlength' => 18,'value' => $model->isNewRecord?0:$model->target_keuangan)); ?>

    <div class="form-group">
        <label class="col-sm-2 control-label" for="Aktivitas_target_keuangan_triwulan1">Target Keuangan 1-2-3-4</label>
        <div class="col-md-10">
            <div class="form-inline">
                <div class="form-group ">
            <?php echo $form->textField($model, 'target_keuangan_triwulan1', array('span' => 3, 'maxlength' => 18,'value' => $model->isNewRecord?0:$model->target_keuangan_triwulan1)); ?>
            <?php echo $form->textField($model, 'target_keuangan_triwulan2', array('span' => 3, 'maxlength' => 18,'value' => $model->isNewRecord?0:$model->target_keuangan_triwulan2)); ?>
            <?php echo $form->textField($model, 'target_keuangan_triwulan3', array('span' => 3, 'maxlength' => 18,'value' => $model->isNewRecord?0:$model->target_keuangan_triwulan3)); ?>
            <?php echo $form->textField($model, 'target_keuangan_triwulan4', array('span' => 3, 'maxlength' => 18,'value' => $model->isNewRecord?0:$model->target_keuangan_triwulan4)); ?>
                </div>
            </div>
        </div>
    </div>
    <?php echo $form->textFieldControlGroup($model, 'realisasi_keuangan', array('span' => 5, 'maxlength' => 18,'value' => $model->isNewRecord?0:$model->realisasi_keuangan)); ?>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="Aktivitas_realisasi_keuangan_triwulan1">Realisasi Keuangan
            1-2-3-4</label>
        <div class="col-md-10">
            <div class="form-inline">
                <div class="form-group ">
            <?php echo $form->textField($model, 'realisasi_keuangan_triwulan1', array('span' => 3, 'maxlength' => 18,'value' => $model->isNewRecord?0:$model->realisasi_keuangan_triwulan1)); ?>
            <?php echo $form->textField($model, 'realisasi_keuangan_triwulan2', array('span' => 3, 'maxlength' => 18,'value' => $model->isNewRecord?0:$model->realisasi_keuangan_triwulan2)); ?>
            <?php echo $form->textField($model, 'realisasi_keuangan_triwulan3', array('span' => 3, 'maxlength' => 18,'value' => $model->isNewRecord?0:$model->realisasi_keuangan_triwulan3)); ?>
            <?php echo $form->textField($model, 'realisasi_keuangan_triwulan4', array('span' => 3, 'maxlength' => 18,'value' => $model->isNewRecord?0:$model->realisasi_keuangan_triwulan4)); ?>
                </div>
            </div>
        </div>
    </div>
    <?php echo $form->textFieldControlGroup($model, 'target_fisik', array('span' => 5, 'maxlength' => 18,'value' => $model->isNewRecord?0:$model->target_fisik)); ?>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="Aktivitas_target_fisik_triwulan1">Target Fisik 1-2-3-4</label>
        <div class="col-md-10">
            <div class="form-inline">
                <div class="form-group ">
            <?php echo $form->textField($model, 'target_fisik_triwulan1', array('span' => 3, 'maxlength' => 18,'value' => $model->isNewRecord?0:$model->target_fisik_triwulan1)); ?>
            <?php echo $form->textField($model, 'target_fisik_triwulan2', array('span' => 3, 'maxlength' => 18,'value' => $model->isNewRecord?0:$model->target_fisik_triwulan2)); ?>
            <?php echo $form->textField($model, 'target_fisik_triwulan3', array('span' => 3, 'maxlength' => 18,'value' => $model->isNewRecord?0:$model->target_fisik_triwulan3)); ?>
            <?php echo $form->textField($model, 'target_fisik_triwulan4', array('span' => 3, 'maxlength' => 18,'value' => $model->isNewRecord?0:$model->target_fisik_triwulan4)); ?>
                </div>
            </div>
        </div>
    </div>

    <?php echo $form->textFieldControlGroup($model, 'realisasi_fisik', array('span' => 5, 'maxlength' => 18,'value' => $model->isNewRecord?0:$model->realisasi_fisik)); ?>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="Aktivitas_realisasi_fisik_triwulan1">Realisasi Fisik 1-2-3-4</label>
        <div class="col-md-10">
            <div class="form-inline">
                <div class="form-group ">
            <?php echo $form->textField($model, 'realisasi_fisik_triwulan1', array('span' => 3, 'maxlength' => 18,'value' => $model->isNewRecord?0:$model->realisasi_fisik_triwulan1)); ?>
            <?php echo $form->textField($model, 'realisasi_fisik_triwulan2', array('span' => 3, 'maxlength' => 18,'value' => $model->isNewRecord?0:$model->realisasi_fisik_triwulan2)); ?>
            <?php echo $form->textField($model, 'realisasi_fisik_triwulan3', array('span' => 3, 'maxlength' => 18,'value' => $model->isNewRecord?0:$model->realisasi_fisik_triwulan3)); ?>
            <?php echo $form->textField($model, 'realisasi_fisik_triwulan4', array('span' => 3, 'maxlength' => 18,'value' => $model->isNewRecord?0:$model->realisasi_fisik_triwulan4)); ?>
                </div>
            </div>
        </div>
    </div>


    <?php echo $form->textFieldControlGroup($model, 'nomor_misi_provinsi', array('span' => 2,'value' => $model->isNewRecord?0:$model->nomor_misi_provinsi)); ?>

    <?php echo $form->textFieldControlGroup($model, 'nomor_sasaran_provinsi', array('span' => 2,'value' => $model->isNewRecord?0:$model->nomor_sasaran_provinsi)); ?>

    <?php
    $opts7 = CHtml::listData(Indikatorprov::model()->findAll(), 'indikatorid', 'fullname');
    echo $form->dropDownListControlGroup($model, 'nomor_indikator_provinsi', $opts7, array('span' => 5, 'maxlength' => 7));
    ?>

    <?php echo $form->textAreaControlGroup($model, 'ket', array('rows' => 6, 'span' => 8)); ?>

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