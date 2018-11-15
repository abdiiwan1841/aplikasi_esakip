<?php
/* @var $this VisiController */
/* @var $data Tvisi */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id_instansi')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id_instansi), array('view', 'id' => $data->id_instansi)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('visi')); ?>:</b>
    <?php echo CHtml::encode($data->visi); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('cdt')); ?>:</b>
    <?php echo CHtml::encode($data->cdt); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('cuser')); ?>:</b>
    <?php echo CHtml::encode($data->cuser); ?>
    <br/>


</div>