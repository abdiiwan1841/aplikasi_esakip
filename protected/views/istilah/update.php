<?php
/* @var $this IstilahController */
/* @var $model Tistilah */
?>

<?php
$this->breadcrumbs = array(
    'Tistilahs' => array('index'),
    $model->xpid => array('view', 'id' => $model->xpid),
    'Update',
);

$this->menu = array(
    array('label' => 'Daftar Tistilah', 'url' => array('index')),
    array('label' => 'Tambah Tistilah', 'url' => array('create')),
    array('label' => 'View Tistilah', 'url' => array('view', 'id' => $model->xpid)),
    array('label' => 'Manage Tistilah', 'url' => array('admin')),
);
?>

    <h1>Update Tistilah <?php echo $model->xpid; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>