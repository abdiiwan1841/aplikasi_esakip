<?php
/* @var $this TujuanController */
/* @var $data Tujuan */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('tujuanid')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->tujuanid), array('view', 'id' => $data->tujuanid)); ?>
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

    <b><?php echo CHtml::encode($data->getAttributeLabel('tujuan')); ?>:</b>
    <?php echo CHtml::encode($data->tujuan); ?>
    <br/>


</div>