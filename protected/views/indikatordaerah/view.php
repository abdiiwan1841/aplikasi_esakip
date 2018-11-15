<?php
/* @var $this IndikatordaerahController */
/* @var $model Indikatordaerah */
?>

<?php
$this->breadcrumbs = array(
    'Indikatordaerahs' => array('index'),
    $model->indikatorid,
);

$this->menu = array(
    array('label' => 'Daftar IKU', 'url' => array('index')),
    array('label' => 'Tambah IKU', 'url' => array('create')),
    array('label' => 'Update IKU', 'url' => array('update', 'id' => $model->indikatorid)),
    array('label' => 'Hapus IKU', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->indikatorid), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>


<div class="top-bar clearfix">
    <div class="page-title">
        <h4>
            <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
            Data Indikator
        </h4>
    </div>
    <div class="pull-right" id="mini-nav-right">
        <?php
        echo TbHtml::buttonDropdown('Aksi', $this->menu, array('split' => false, 'dropup' => false, 'menuOptions' => array('pull' => TbHtml::PULL_RIGHT)));;
        ?>
    </div>
</div>
<div class="container-fluid">
    <div class="spacer-xs">

        <?php $this->widget('zii.widgets.CDetailView', array(
            'htmlOptions' => array(
                'class' => 'table table-striped table-condensed table-hover',
            ),
            'data' => $model,
            'attributes' => array(
                'indikatorid',
                'datamisi.misi',
                'dataindikator.indikator',
                'nomor_indikator',
                'indikator',
                /*'target_keu',
                'realisasi_keu',*/
                /*'formulasi:html',*/
                array(
                    'label'=>'Formulasi',
                    'type'=>'raw',
                    'value'=>CHtml::encode(base64_decode($model->formulasi)),
            ),
                'sumber_data',
            ),
        )); ?>
    </div>
</div>
