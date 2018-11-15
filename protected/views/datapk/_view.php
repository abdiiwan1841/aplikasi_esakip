<?php
/* @var $this RenstraController */
/* @var $data Datarenstra */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('ikuid')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->ikuid), array('view', 'id' => $data->ikuid)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('id_instansi')); ?>:</b>
    <?php echo CHtml::encode($data->id_instansi); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('keterangan_iku')); ?>:</b>
    <?php echo CHtml::encode($data->keterangan_iku); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('data_file_iku')); ?>:</b>
    <?php echo CHtml::encode($data->data_file_renstra); ?>
    <br/>


</div>