<?php
/* @var $this RenjaController */
/* @var $data Datarenja */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('renjaid')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->renjaid), array('view', 'id' => $data->renjaid)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('id_instansi')); ?>:</b>
    <?php echo CHtml::encode($data->id_instansi); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('keterangan_renja')); ?>:</b>
    <?php echo CHtml::encode($data->keterangan_renja); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('data_file_renja')); ?>:</b>
    <?php echo CHtml::encode($data->data_file_renja); ?>
    <br/>


</div>