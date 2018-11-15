<?php
/* @var $this RenstraController */
/* @var $model Datarenstra */


$this->breadcrumbs = array(
    'Datarenstras' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Daftar Datarenstra', 'url' => array('index')),
    array('label' => 'Tambah Datarenstra', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#datarenstra-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

    <h1>Manage Datarenstras</h1>

    <p>
        You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
            &lt;&gt;</b>
        or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
    </p>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button btn')); ?>
    <div class="search-form" style="display:none">
        <?php $this->renderPartial('_search', array(
            'model' => $model,
        )); ?>
    </div><!-- search-form -->

<?php $this->widget('\TbGridView', array(
    'id' => 'datarenstra-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'htmlOptions'=> array('class'=>'table-responsive'),
    'emptyText' => 'Belum ada datanya..',
	'columns'=>array(
        'renstraid',
        'id_instansi',
        'keterangan_renstra',
        'data_file_renstra',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
),
)); ?>