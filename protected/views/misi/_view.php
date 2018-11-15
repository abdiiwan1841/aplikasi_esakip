<?php
/* @var $this MisiController */
/* @var $data Misi */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('misid')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->misid), array('view', 'id' => $data->misid)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('nomisi')); ?>:</b>
    <?php echo CHtml::encode($data->nomisi); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('idinstansi')); ?>:</b>
    <?php echo CHtml::encode($data->idinstansi); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('misi')); ?>:</b>
    <?php echo CHtml::encode($data->misi); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('cdt')); ?>:</b>
    <?php echo CHtml::encode($data->cdt); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('cuser')); ?>:</b>
    <?php echo CHtml::encode($data->cuser); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('udt')); ?>:</b>
    <?php echo CHtml::encode($data->udt); ?>
    <br/>

    <?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('uuser')); ?>:</b>
	<?php echo CHtml::encode($data->uuser); ?>
	<br />

	*/ ?>

</div>