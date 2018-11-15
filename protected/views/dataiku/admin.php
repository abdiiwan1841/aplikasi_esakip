<?php
/* @var $this DataikuController */
/* @var $model Dataiku */


$this->breadcrumbs = array(
    'Dataikus' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Daftar Data IKU', 'url' => array('index')),
    array('label' => 'Tambah Data IKU', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#dataiku-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

    <h1>Manage Dataikus</h1>

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
    'id' => 'dataiku-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'htmlOptions'=> array('class'=>'table-responsive'),
    'emptyText' => 'Belum ada datanya..',
	'columns'=>array(
        'ikuid',
        'id_instansi',
        'keterangan_iku',
        'data_file_iku',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
),
)); ?>