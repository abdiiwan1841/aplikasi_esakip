<?php
/* @var $this PeraturanController */
/* @var $data Perundangan */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('xpid')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->xpid), array('view', 'id' => $data->xpid)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('nmperu')); ?>:</b>
    <?php echo CHtml::encode($data->nmperu); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('nmr')); ?>:</b>
    <?php echo CHtml::encode($data->nmr); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('thn')); ?>:</b>
    <?php echo CHtml::encode($data->thn); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('filenm')); ?>:</b>
    <?php echo CHtml::encode($data->filenm); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('cdt')); ?>:</b>
    <?php echo CHtml::encode($data->cdt); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('cuser')); ?>:</b>
    <?php echo CHtml::encode($data->cuser); ?>
    <br/>


</div>