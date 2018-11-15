<?php
/* @var $this RenstraController */
/* @var $data Datarenstra */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('pkid')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->pkid), array('view', 'id' => $data->pkid)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('id_instansi')); ?>:</b>
    <?php echo CHtml::encode($data->id_instansi); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('keterangan_pk')); ?>:</b>
    <?php echo CHtml::encode($data->keterangan_pk); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('data_file_pk')); ?>:</b>
    <?php echo CHtml::encode($data->data_file_pk); ?>
    <br/>


</div>