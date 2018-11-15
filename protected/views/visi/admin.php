<?php
/* @var $this VisiController */
/* @var $model Tvisi */


$this->breadcrumbs = array(
    'Tvisis' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Daftar Visi', 'url' => array('index')),
    array('label' => 'Tambah Visi', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tvisi-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

    <h1>Manage Visi</h1>

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
    'id' => 'tvisi-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'htmlOptions'=> array('class'=>'table-responsive'),
    'columns' => array(
        'id_instansi',
        'visi',
        'cdt',
        'cuser',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
)); ?>