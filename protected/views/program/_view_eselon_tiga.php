<?php
/* @var $this ProgramController */
/* @var $data Program */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('programid')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->programid), array('view', 'id' => $data->programid)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('id_instansi')); ?>:</b>
    <?php echo CHtml::encode($data->id_instansi); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('nomor_misi')); ?>:</b>
    <?php echo CHtml::encode($data->nomor_misi); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('nomor_tujuan')); ?>:</b>
    <?php echo CHtml::encode($data->nomor_tujuan); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('nomor_sasaran')); ?>:</b>
    <?php echo CHtml::encode($data->nomor_sasaran); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('nomor_indikator')); ?>:</b>
    <?php echo CHtml::encode($data->nomor_indikator); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('nomor_program')); ?>:</b>
    <?php echo CHtml::encode($data->nomor_program); ?>
    <br/>

    <?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('program')); ?>:</b>
	<?php echo CHtml::encode($data->program); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pagu_anggaran')); ?>:</b>
	<?php echo CHtml::encode($data->pagu_anggaran); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target_keuangan')); ?>:</b>
	<?php echo CHtml::encode($data->target_keuangan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('realisasi_keuangan')); ?>:</b>
	<?php echo CHtml::encode($data->realisasi_keuangan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target_fisik')); ?>:</b>
	<?php echo CHtml::encode($data->target_fisik); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('realisasi_fisik')); ?>:</b>
	<?php echo CHtml::encode($data->realisasi_fisik); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keterangan')); ?>:</b>
	<?php echo CHtml::encode($data->keterangan); ?>
	<br />

	*/ ?>

</div>