<?php
/* @var $this SasaranController */
/* @var $data Sasaran */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('sasaranid')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->sasaranid), array('view', 'id' => $data->sasaranid)); ?>
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

    <b><?php echo CHtml::encode($data->getAttributeLabel('sasaran')); ?>:</b>
    <?php echo CHtml::encode($data->sasaran); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('sasaran_strategis')); ?>:</b>
    <?php echo CHtml::encode($data->sasaran_strategis); ?>
    <br/>

    <?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('capaian_sasaran')); ?>:</b>
	<?php echo CHtml::encode($data->capaian_sasaran); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cdt')); ?>:</b>
	<?php echo CHtml::encode($data->cdt); ?>
	<br />

	*/ ?>

</div>