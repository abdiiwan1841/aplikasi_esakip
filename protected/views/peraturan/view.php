<?php
/* @var $this PeraturanController */
/* @var $model Perundangan */
?>

<?php
$this->breadcrumbs = array(
    'Perundangans' => array('index'),
    $model->xpid,
);

$this->menu = array(
    array('label' => 'Daftar Perundangan', 'url' => array('index')),
    array('label' => 'Tambah Perundangan', 'url' => array('create')),
    array('label' => 'Update Perundangan', 'url' => array('update', 'id' => $model->xpid)),
    array('label' => 'Delete Perundangan', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->xpid), 'confirm' => 'Anda yakin menghapus data ini ?')),
    array('label' => 'Manage Perundangan', 'url' => array('admin')),
);
?>

    <h1>View Perundangan #<?php echo $model->xpid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data' => $model,
    'attributes' => array(
        'xpid',
        'nmperu',
        'nmr',
        'thn',
        'filenm',
        'cdt',
        'cuser',
    ),
)); ?>