<?php
/* @var $this PeraturanController */
/* @var $model Perundangan */


?>
    <div class="headline"><h2>PERATURAN/UNDANG-UNDANG</h2></div>
    <div class="row" style="height:20px;"></div>
<?php $this->widget('\TbGridView', array(
    'id' => 'perundangan-grid',
    'dataProvider' => $model->search(),
    /*'filter'=>$model,*/
    'htmlOptions'=> array('class'=>'table-responsive'),
    'emptyText' =>'Belum ada peraturan/UU',
    'columns' => array(
        'nmperu',
        'nmr',
        'thn',
        array(
            'header' => 'Dokumen',
            'name' => 'filenm',
            'type' => 'raw',
            'value' => 'CHtml::link($data->filenm,
                        Yii::app()->createUrl("static/docundang2/$data->filenm"),
                        array("target"=>"_blank") )',
        ),

    ),
)); ?>