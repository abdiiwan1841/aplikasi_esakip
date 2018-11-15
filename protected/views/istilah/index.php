<?php
/* @var $this IstilahController */
/* @var $model Tistilah */


?>
<div class="headline"><h2>ISTILAH-ISTILAH SAKIP</h2></div>
<div class="row" style="height:20px;"></div>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'tistilah-grid',
    'dataProvider' => $model->search(),
    'emptyText' =>'Belum ada istilah sakip',
    'htmlOptions'=> array('class'=>'table-responsive'),
    'columns' => array(
        'nmist',
        'ket',
    ),
)); ?>

