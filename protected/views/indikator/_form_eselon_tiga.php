<?php
/* @var $this IndikatorController */
/* @var $model Indikator */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('\TbActiveForm', array(
        'id' => 'indikator-form',
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
                    'success' => 'function(data){$("#IndikatorEselonTiga_nomor_misi").html(data);$("#IndikatorEselonTiga_nomor_tujuan").html("<option value=\'\'>--Pilih Tujuan--</option>");$("#IndikatorEselonTiga_nomor_sasaran_eselon_tiga").html("<option value=\'\'>--Pilih Sasaran--</option>");}'
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
            'data' => array('OPD' => 'js: $("#IndikatorEselonTiga_id_instansi").val()', 'NoMisi' => 'js: $(this).val()'),
            'success' => 'function(data){$("#IndikatorEselonTiga_nomor_tujuan").html(data);$("#IndikatorEselonTiga_nomor_sasaran_eselon_tiga").html("<option value=\'\'>--Pilih Sasaran--</option>");}'
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
            'url' => CController::createUrl('loaddata/loadsasaraneselontiga'),
            'data' => array('OPD' => 'js: $("#IndikatorEselonTiga_id_instansi").val()', 'NoMisi' => 'js: $("#IndikatorEselonTiga_nomor_misi").val()', 'NoTujuan' => 'js: $(this).val()'),
            'success' => 'function(data){$("#IndikatorEselonTiga_nomor_sasaran_eselon_tiga").html(data);}'
        ))); ?>

    <?php
    $criteria = new CDbCriteria();
    $criteria->addCondition("id_instansi=:idx");
    $criteria->addCondition("nomor_misi=:idm");
    $criteria->addCondition("nomor_tujuan=:idy");
    $criteria->params = array(':idx' => Yii::app()->user->getOpd(), ':idm' => $model->nomor_misi, ':idy' => $model->nomor_tujuan);
    $opts3 = CHtml::listData(SasaranEselonTiga::model()->findAll($criteria), 'nomor_sasaran', 'fullName');
    echo $form->dropDownListControlGroup($model, 'nomor_sasaran_eselon_tiga', $opts3, array('span' => 5, 'maxlength' => 7, 'prompt' => '--Pilih Tujuan--',
        'ajax' => array(
            'type' => 'POST', //request type
            'url' => CController::createUrl('loaddata/loadjabataneselontiga'),
            'data' => array('OPD' => 'js: $("#IndikatorEselonTiga_id_instansi").val()', 'NoMisi' => 'js: $("#IndikatorEselonTiga_nomor_misi").val()', 'NoTujuan' => 'js: $("#IndikatorEselonTiga_nomor_tujuan").val()', 'NoSasaran' => 'js: $(this).val()'),
            'success' => 'function(data){$("#IndikatorEselonTiga_idpejabat_eselon_tiga").html(data);}'
        ))); ?>

<?php
    $criteria = new CDbCriteria();
    $criteria->addCondition("id_instansi=:idx");
    $criteria->addCondition("id=:idp");
    $criteria->params = array(':idx' => Yii::app()->user->getOpd(), ':idp' => $model->idpejabat_eselon_tiga);
    $opts3 = CHtml::listData(Pejabat::model()->findAll($criteria), 'id', 'fullName');
    echo $form->dropDownListControlGroup($model, 'idpejabat_eselon_tiga', $opts3, array('span' => 5, 'maxlength' => 7, 'prompt' => '--Pilih Sasaran--')); ?>

    
    <?php echo $form->textFieldControlGroup($model, 'nomor_indikator', array('span' => 5)); ?>

    <?php echo $form->textAreaControlGroup($model, 'indikator', array('rows' => 6, 'span' => 8)); ?>

    <?php echo $form->textAreaControlGroup($model, 'satuan', array('rows' => 6, 'span' => 8)); ?>

    <?php echo $form->dropDownListControlGroup($model, 'indikator_kinerja_utama', Constant::$list_boolean, array('span' => 2, 'maxlength' => 7)); ?>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="Indikator_target_rpjm1">Target Rpjm 1-2-3-4-5</label>
        <div class="col-md-10">
            <div class="form-inline">
                <div class="form-group ">
            <?php echo $form->textField($model, 'target_rpjm1', array('span' => 2, 'maxlength' => 18,'value' => $model->isNewRecord?0:$model->target_rpjm1)); ?>
            <?php echo $form->textField($model, 'target_rpjm2', array('span' => 2, 'maxlength' => 18,'value' => $model->isNewRecord?0:$model->target_rpjm2)); ?>
            <?php echo $form->textField($model, 'target_rpjm3', array('span' => 2, 'maxlength' => 18,'value' => $model->isNewRecord?0:$model->target_rpjm3)); ?>
            <?php echo $form->textField($model, 'target_rpjm4', array('span' => 2, 'maxlength' => 18,'value' => $model->isNewRecord?0:$model->target_rpjm4)); ?>
            <?php echo $form->textField($model, 'target_rpjm5', array('span' => 2, 'maxlength' => 18,'value' => $model->isNewRecord?0:$model->target_rpjm5)); ?>
                </div>
            </div>
        </div>
    </div>

    <?php echo $form->textFieldControlGroup($model, 'target_tahun_sebelumnya', array('span' => 5, 'maxlength' => 18,'value' => $model->isNewRecord?0:$model->target_tahun_sebelumnya)); ?>

    <?php echo $form->textFieldControlGroup($model, 'realisasi_tahun_sebelumnya', array('span' => 5, 'maxlength' => 18,'value' => $model->isNewRecord?0:$model->realisasi_tahun_sebelumnya)); ?>

    <?php echo $form->textFieldControlGroup($model, 'target', array('span' => 5, 'maxlength' => 18,'value' => $model->isNewRecord?0:$model->target)); ?>

    <?php echo $form->textFieldControlGroup($model, 'realisasi', array('span' => 5, 'maxlength' => 18,'value' => $model->isNewRecord?0:$model->realisasi)); ?>

    <?php echo $form->textFieldControlGroup($model, 'target_akhir_renstra', array('span' => 5,'value' => $model->isNewRecord?0:$model->target_akhir_renstra)); ?>

    <?php echo $form->textAreaControlGroup($model, 'keterangan', array('rows' => 6, 'span' => 8)); ?>

    <?php echo $form->textAreaControlGroup($model, 'analisis', array('rows' => 6, 'span' => 8)); ?>

    <?php
    echo $form->dropDownListControlGroup($model, 'tipe_formula', Constant::$list_formula, array('span' => 5, 'maxlength' => 7)); ?>

    <div class="form-group">
        <label class="col-sm-2 control-label" for="Indikator_target_triwulan1">Target Triwulan 1-2-3-4</label>
        <div class="col-md-10">
            <div class="form-inline">
                <div class="form-group ">
            <?php echo $form->textField($model, 'target_triwulan1', array('span' => 3, 'maxlength' => 18,'value' => $model->isNewRecord?0:$model->target_triwulan1)); ?>
            <?php echo $form->textField($model, 'target_triwulan2', array('span' => 3, 'maxlength' => 18,'value' => $model->isNewRecord?0:$model->target_triwulan2)); ?>
            <?php echo $form->textField($model, 'target_triwulan3', array('span' => 3, 'maxlength' => 18,'value' => $model->isNewRecord?0:$model->target_triwulan3)); ?>
            <?php echo $form->textField($model, 'target_triwulan4', array('span' => 3, 'maxlength' => 18,'value' => $model->isNewRecord?0:$model->target_triwulan4)); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label" for="Indikator_realisasi_triwulan1">Realisasi Triwulan 1-2-3-4</label>
        <div class="col-md-10">
            <div class="form-inline">
                <div class="form-group ">
            <?php echo $form->textField($model, 'realisasi_triwulan1', array('span' => 3, 'maxlength' => 18,'value' => $model->isNewRecord?0:$model->realisasi_triwulan1)); ?>
            <?php echo $form->textField($model, 'realisasi_triwulan2', array('span' => 3, 'maxlength' => 18,'value' => $model->isNewRecord?0:$model->realisasi_triwulan2)); ?>
            <?php echo $form->textField($model, 'realisasi_triwulan3', array('span' => 3, 'maxlength' => 18,'value' => $model->isNewRecord?0:$model->realisasi_triwulan3)); ?>
            <?php echo $form->textField($model, 'realisasi_triwulan4', array('span' => 3, 'maxlength' => 18,'value' => $model->isNewRecord?0:$model->realisasi_triwulan4)); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label" for="Indikator_keterangan_triwulan1">Keterangan Triwulan 1-2-3-4</label>
        <div class="col-md-10">
            <div class="form-inline">
                <div class="form-group ">
            <?php echo $form->textField($model, 'keterangan_triwulan1', array('span' => 3, 'maxlength' => 18,'value' => $model->isNewRecord?0:$model->keterangan_triwulan1)); ?>
            <?php echo $form->textField($model, 'keterangan_triwulan2', array('span' => 3, 'maxlength' => 18,'value' => $model->isNewRecord?0:$model->keterangan_triwulan2)); ?>
            <?php echo $form->textField($model, 'keterangan_triwulan3', array('span' => 3, 'maxlength' => 18,'value' => $model->isNewRecord?0:$model->keterangan_triwulan3)); ?>
            <?php echo $form->textField($model, 'keterangan_triwulan4', array('span' => 3, 'maxlength' => 18,'value' => $model->isNewRecord?0:$model->keterangan_triwulan4)); ?>
                </div>
            </div>
        </div>
    </div>


    <?php echo $form->textAreaControlGroup($model, 'penjelasan_formulasi', array('rows' => 6, 'span' => 8)); ?>

    <?php echo $form->textAreaControlGroup($model, 'sumber_data', array('rows' => 6, 'span' => 8)); ?>

    <?php echo $form->dropDownListControlGroup($model, 'indikator_pk', Constant::$list_boolean, array('span' => 2, 'maxlength' => 7, 'prompt' => '--IPK--')); ?>
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