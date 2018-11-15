<?php
/* @var $this IstilahController */
/* @var $model Tistilah */
?>

<?php
$this->breadcrumbs = array(
    'Tistilahs' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'Daftar Tistilah', 'url' => array('index')),
    array('label' => 'Manage Tistilah', 'url' => array('admin')),
);
?>

    <h1>Tambah Tistilah</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>