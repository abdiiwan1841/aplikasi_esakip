<?php
/* @var $this PejabatController */
/* @var $data Pejabat */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_instansi')); ?>:</b>
	<?php echo CHtml::encode($data->id_instansi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parent_id')); ?>:</b>
	<?php echo CHtml::encode($data->parent_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_pejabat')); ?>:</b>
	<?php echo CHtml::encode($data->nama_pejabat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_jabatan')); ?>:</b>
	<?php echo CHtml::encode($data->nama_jabatan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nip_pejabat')); ?>:</b>
	<?php echo CHtml::encode($data->nip_pejabat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_golongan_pejabat')); ?>:</b>
	<?php echo CHtml::encode($data->nama_golongan_pejabat); ?>
	<br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('eselon')); ?>:</b>
    <?php echo CHtml::encode($data->nama_golongan_pejabat); ?>
    <br />


</div>