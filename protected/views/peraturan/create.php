<?php
/* @var $this PeraturanController */
/* @var $model Perundangan */
?>

<?php
$this->breadcrumbs = array(
    'Perundangans' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'Daftar Perundangan', 'url' => array('index')),
    array('label' => 'Manage Perundangan', 'url' => array('admin')),
);
?>

    <h1>Tambah Perundangan</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>