<?php
/* @var $this IndikatordaerahController */
/* @var $data Indikatordaerah */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('indikatorid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->indikatorid),array('view','id'=>$data->indikatorid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idindikator')); ?>:</b>
	<?php echo CHtml::encode($data->idindikator); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('level')); ?>:</b>
	<?php echo CHtml::encode($data->level); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nomor_indikator')); ?>:</b>
	<?php echo CHtml::encode($data->nomor_indikator); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('indikator')); ?>:</b>
	<?php echo CHtml::encode($data->indikator); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target_keu')); ?>:</b>
	<?php echo CHtml::encode($data->target_keu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('realisasi_keu')); ?>:</b>
	<?php echo CHtml::encode($data->realisasi_keu); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('formulasi')); ?>:</b>
	<?php echo CHtml::encode($data->formulasi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('formulasi_asli')); ?>:</b>
	<?php echo CHtml::encode($data->formulasi_asli); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sumber_data')); ?>:</b>
	<?php echo CHtml::encode($data->sumber_data); ?>
	<br />

	*/ ?>

</div>