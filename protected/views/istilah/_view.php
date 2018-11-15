<?php
/* @var $this IstilahController */
/* @var $data Tistilah */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('xpid')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->xpid), array('view', 'id' => $data->xpid)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('nmist')); ?>:</b>
    <?php echo CHtml::encode($data->nmist); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('ket')); ?>:</b>
    <?php echo CHtml::encode($data->ket); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('cdt')); ?>:</b>
    <?php echo CHtml::encode($data->cdt); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('cuser')); ?>:</b>
    <?php echo CHtml::encode($data->cuser); ?>
    <br/>


</div>