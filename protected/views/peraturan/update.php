<?php
/* @var $this PeraturanController */
/* @var $model Perundangan */
?>

<?php
$this->breadcrumbs = array(
    'Perundangans' => array('index'),
    $model->xpid => array('view', 'id' => $model->xpid),
    'Update',
);

$this->menu = array(
    array('label' => 'Daftar Perundangan', 'url' => array('index')),
    array('label' => 'Tambah Perundangan', 'url' => array('create')),
    array('label' => 'View Perundangan', 'url' => array('view', 'id' => $model->xpid)),
    array('label' => 'Manage Perundangan', 'url' => array('admin')),
);
?>

    <h1>Update Perundangan <?php echo $model->xpid; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>