<?php
/* @var $this PeraturanController */
/* @var $model Perundangan */


$this->breadcrumbs = array(
    'Perundangans' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Daftar Perundangan', 'url' => array('index')),
    array('label' => 'Tambah Perundangan', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#perundangan-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

    <h1>Manage Perundangans</h1>

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
    'id' => 'perundangan-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'xpid',
        'nmperu',
        'nmr',
        'thn',
        'filenm',
        'cdt',
        /*
        'cuser',
        */
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
)); ?>