<?php
/* @var $this RenstraController */
/* @var $data Datarenstra */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('renstraid')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->renstraid), array('view', 'id' => $data->renstraid)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('id_instansi')); ?>:</b>
    <?php echo CHtml::encode($data->id_instansi); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('keterangan_renstra')); ?>:</b>
    <?php echo CHtml::encode($data->keterangan_renstra); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('data_file_renstra')); ?>:</b>
    <?php echo CHtml::encode($data->data_file_renstra); ?>
    <br/>


</div>