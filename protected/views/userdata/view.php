<?php
/* @var $this VisiController */
/* @var $model Tvisi */
?>

<?php
$this->menu = array(
    array('label' => 'Daftar Pengguna', 'url' => array('index')),
    array('label' => 'Tambah Pengguna', 'url' => array('create')),
    array('label' => 'Update Pengguna', 'url' => array('update', 'id' => $model->usrxid)),
    array('label' => 'Hapus Pengguna', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->usrxid), 'confirm' => 'Anda yakin menghapus data ini ?')),

);
?>

<div class="top-bar clearfix">
    <div class="page-title">
        <h4>
            <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
            Data Pengguna
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
                'datagrup.keterangan',
                'userid',
            ),
        )); ?>
    </div>
</div>
