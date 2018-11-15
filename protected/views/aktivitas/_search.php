<?php
/* @var $this AktivitasController */
/* @var $model Aktivitas */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form = $this->beginWidget('\TbActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    )); ?>

    <?php echo $form->textFieldControlGroup($model, 'aktivitasid', array('span' => 5, 'maxlength' => 20)); ?>

    <?php echo $form->textFieldControlGroup($model, 'id_instansi', array('span' => 5, 'maxlength' => 7)); ?>

    <?php echo $form->textFieldControlGroup($model, 'nomor_misi', array('span' => 5)); ?>

    <?php echo $form->textFieldControlGroup($model, 'nomor_tujuan', array('span' => 5)); ?>

    <?php echo $form->textFieldControlGroup($model, 'nomor_sasaran', array('span' => 5)); ?>

    <?php echo $form->textFieldControlGroup($model, 'nomor_indikator', array('span' => 5)); ?>

    <?php echo $form->textFieldControlGroup($model, 'nomor_program', array('span' => 5)); ?>

    <?php echo $form->textFieldControlGroup($model, 'nomor_kegiatan', array('span' => 5)); ?>

    <?php echo $form->textFieldControlGroup($model, 'nomor_aktivitas', array('span' => 5)); ?>

    <?php echo $form->textAreaControlGroup($model, 'aktivitas', array('rows' => 6, 'span' => 8)); ?>

    <?php echo $form->textFieldControlGroup($model, 'pagu_anggaran', array('span' => 5, 'maxlength' => 18)); ?>

    <?php echo $form->textFieldControlGroup($model, 'target_keuangan', array('span' => 5, 'maxlength' => 18)); ?>

    <?php echo $form->textFieldControlGroup($model, 'realisasi_keuangan', array('span' => 5, 'maxlength' => 18)); ?>

    <?php echo $form->textFieldControlGroup($model, 'target_fisik', array('span' => 5, 'maxlength' => 18)); ?>

    <?php echo $form->textFieldControlGroup($model, 'realisasi_fisik', array('span' => 5, 'maxlength' => 18)); ?>

    <?php echo $form->textFieldControlGroup($model, 'target_keuangan_triwulan1', array('span' => 5, 'maxlength' => 18)); ?>

    <?php echo $form->textFieldControlGroup($model, 'target_keuangan_triwulan2', array('span' => 5, 'maxlength' => 18)); ?>

    <?php echo $form->textFieldControlGroup($model, 'target_keuangan_triwulan3', array('span' => 5, 'maxlength' => 18)); ?>

    <?php echo $form->textFieldControlGroup($model, 'target_keuangan_triwulan4', array('span' => 5, 'maxlength' => 18)); ?>

    <?php echo $form->textFieldControlGroup($model, 'realisasi_keuangan_triwulan1', array('span' => 5, 'maxlength' => 18)); ?>

    <?php echo $form->textFieldControlGroup($model, 'realisasi_keuangan_triwulan2', array('span' => 5, 'maxlength' => 18)); ?>

    <?php echo $form->textFieldControlGroup($model, 'realisasi_keuangan_triwulan3', array('span' => 5, 'maxlength' => 18)); ?>

    <?php echo $form->textFieldControlGroup($model, 'realisasi_keuangan_triwulan4', array('span' => 5, 'maxlength' => 18)); ?>

    <?php echo $form->textFieldControlGroup($model, 'target_fisik_triwulan1', array('span' => 5, 'maxlength' => 18)); ?>

    <?php echo $form->textFieldControlGroup($model, 'target_fisik_triwulan2', array('span' => 5, 'maxlength' => 18)); ?>

    <?php echo $form->textFieldControlGroup($model, 'target_fisik_triwulan3', array('span' => 5, 'maxlength' => 18)); ?>

    <?php echo $form->textFieldControlGroup($model, 'target_fisik_triwulan4', array('span' => 5, 'maxlength' => 18)); ?>

    <?php echo $form->textFieldControlGroup($model, 'realisasi_fisik_triwulan1', array('span' => 5, 'maxlength' => 18)); ?>

    <?php echo $form->textFieldControlGroup($model, 'realisasi_fisik_triwulan2', array('span' => 5, 'maxlength' => 18)); ?>

    <?php echo $form->textFieldControlGroup($model, 'realisasi_fisik_triwulan3', array('span' => 5, 'maxlength' => 18)); ?>

    <?php echo $form->textFieldControlGroup($model, 'realisasi_fisik_triwulan4', array('span' => 5, 'maxlength' => 18)); ?>

    <?php echo $form->textFieldControlGroup($model, 'nomor_misi_provinsi', array('span' => 5)); ?>

    <?php echo $form->textFieldControlGroup($model, 'nomor_sasaran_provinsi', array('span' => 5)); ?>

    <?php echo $form->textFieldControlGroup($model, 'nomor_indikator_provinsi', array('span' => 5)); ?>

    <?php echo $form->textAreaControlGroup($model, 'ket', array('rows' => 6, 'span' => 8)); ?>

    <div class="form-actions">
        <?php echo TbHtml::submitButton('Search', array('color' => TbHtml::BUTTON_COLOR_SUCCESS,)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->