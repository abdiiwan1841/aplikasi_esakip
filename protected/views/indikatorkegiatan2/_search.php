<?php
/* @var $this IndikatorkegiatanController */
/* @var $model IndikatorKegiatan */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('\TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'indikatorid',array('span'=>5,'maxlength'=>20)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id_instansi',array('span'=>5,'maxlength'=>7)); ?>

                    <?php echo $form->textFieldControlGroup($model,'nomor_misi',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'nomor_tujuan',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'nomor_sasaran',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'nomor_program',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'nomor_kegiatan',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'nomor_indikator',array('span'=>5)); ?>

                    <?php echo $form->textAreaControlGroup($model,'indikator',array('rows'=>6,'span'=>8)); ?>

                    <?php echo $form->textAreaControlGroup($model,'satuan',array('rows'=>6,'span'=>8)); ?>

                    <?php echo $form->textFieldControlGroup($model,'indikator_kinerja_utama',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'target_rpjm1',array('span'=>5,'maxlength'=>18)); ?>

                    <?php echo $form->textFieldControlGroup($model,'target_rpjm2',array('span'=>5,'maxlength'=>18)); ?>

                    <?php echo $form->textFieldControlGroup($model,'target_rpjm3',array('span'=>5,'maxlength'=>18)); ?>

                    <?php echo $form->textFieldControlGroup($model,'target_rpjm4',array('span'=>5,'maxlength'=>18)); ?>

                    <?php echo $form->textFieldControlGroup($model,'target_rpjm5',array('span'=>5,'maxlength'=>18)); ?>

                    <?php echo $form->textFieldControlGroup($model,'target_tahun_sebelumnya',array('span'=>5,'maxlength'=>18)); ?>

                    <?php echo $form->textFieldControlGroup($model,'realisasi_tahun_sebelumnya',array('span'=>5,'maxlength'=>18)); ?>

                    <?php echo $form->textFieldControlGroup($model,'target',array('span'=>5,'maxlength'=>18)); ?>

                    <?php echo $form->textFieldControlGroup($model,'realisasi',array('span'=>5,'maxlength'=>18)); ?>

                    <?php echo $form->textFieldControlGroup($model,'target_akhir_renstra',array('span'=>5)); ?>

                    <?php echo $form->textAreaControlGroup($model,'keterangan',array('rows'=>6,'span'=>8)); ?>

                    <?php echo $form->textAreaControlGroup($model,'analisis',array('rows'=>6,'span'=>8)); ?>

                    <?php echo $form->textFieldControlGroup($model,'tipe_formula',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'target_triwulan1',array('span'=>5,'maxlength'=>18)); ?>

                    <?php echo $form->textFieldControlGroup($model,'target_triwulan2',array('span'=>5,'maxlength'=>18)); ?>

                    <?php echo $form->textFieldControlGroup($model,'target_triwulan3',array('span'=>5,'maxlength'=>18)); ?>

                    <?php echo $form->textFieldControlGroup($model,'target_triwulan4',array('span'=>5,'maxlength'=>18)); ?>

                    <?php echo $form->textFieldControlGroup($model,'realisasi_triwulan1',array('span'=>5,'maxlength'=>18)); ?>

                    <?php echo $form->textFieldControlGroup($model,'realisasi_triwulan2',array('span'=>5,'maxlength'=>18)); ?>

                    <?php echo $form->textFieldControlGroup($model,'realisasi_triwulan3',array('span'=>5,'maxlength'=>18)); ?>

                    <?php echo $form->textFieldControlGroup($model,'realisasi_triwulan4',array('span'=>5,'maxlength'=>18)); ?>

                    <?php echo $form->textAreaControlGroup($model,'keterangan_triwulan1',array('rows'=>6,'span'=>8)); ?>

                    <?php echo $form->textAreaControlGroup($model,'keterangan_triwulan2',array('rows'=>6,'span'=>8)); ?>

                    <?php echo $form->textAreaControlGroup($model,'keterangan_triwulan3',array('rows'=>6,'span'=>8)); ?>

                    <?php echo $form->textAreaControlGroup($model,'keterangan_triwulan4',array('rows'=>6,'span'=>8)); ?>

                    <?php echo $form->textAreaControlGroup($model,'penjelasan_formulasi',array('rows'=>6,'span'=>8)); ?>

                    <?php echo $form->textAreaControlGroup($model,'sumber_data',array('rows'=>6,'span'=>8)); ?>

                    <?php echo $form->textFieldControlGroup($model,'indikator_pk',array('span'=>5)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->