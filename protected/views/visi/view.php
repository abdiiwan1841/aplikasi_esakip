<?php
/* @var $this VisiController */
/* @var $model Tvisi */
?>

<?php
$this->menu = array(
    array('label' => 'Daftar Visi', 'url' => array('index')),
    array('label' => 'Tambah Visi', 'url' => array('create')),
    array('label' => 'Update Visi', 'url' => array('update', 'id' => $model->id_instansi)),
    array('label' => 'Hapus Visi', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id_instansi), 'confirm' => 'Anda yakin menghapus data ini ?')),

);
?>

<div class="top-bar clearfix">
    <div class="page-title">
        <h4>
            <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
            Data Visi
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
                'datainstansi.nama_instansi',
                'visi',
                'cdt',
                'cuser',
            ),
        )); ?>
    </div>
</div>
