<?php
/* @var $this SasaranController */
/* @var $model Sasaran */


$this->breadcrumbs = array(
    'Sasarans' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Daftar Sasaran', 'url' => array('index')),
    array('label' => 'Tambah Sasaran', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#sasaran-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

    <h1>Manage Sasarans</h1>

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
    'id' => 'sasaran-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'htmlOptions'=> array('class'=>'table-responsive'),
    'columns' => array(
        'sasaranid',
        'id_instansi',
        'nomor_misi',
        'nomor_tujuan',
        'nomor_sasaran',
        'sasaran',
        /*
        'sasaran_strategis',
        'capaian_sasaran',
        'cdt',
        */
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
)); ?>