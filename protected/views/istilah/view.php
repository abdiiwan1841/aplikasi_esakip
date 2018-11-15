<?php
/* @var $this IstilahController */
/* @var $model Tistilah */
?>

<?php
$this->breadcrumbs = array(
    'Tistilahs' => array('index'),
    $model->xpid,
);

$this->menu = array(
    array('label' => 'Daftar Tistilah', 'url' => array('index')),
    array('label' => 'Tambah Tistilah', 'url' => array('create')),
    array('label' => 'Update Tistilah', 'url' => array('update', 'id' => $model->xpid)),
    array('label' => 'Delete Tistilah', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->xpid), 'confirm' => 'Anda yakin menghapus data ini ?')),
    array('label' => 'Manage Tistilah', 'url' => array('admin')),
);
?>

    <h1>View Tistilah #<?php echo $model->xpid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data' => $model,
    'attributes' => array(
        'xpid',
        'nmist',
        'ket',
        'cdt',
        'cuser',
    ),
)); ?>