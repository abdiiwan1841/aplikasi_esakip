<?php
/* @var $this IndikatorController */
/* @var $model Indikator */
?>

<?php
$this->breadcrumbs = array(
    'Indikators' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'Daftar Indikator', 'url' => array('eselonTiga')),
);
?>

<div class="top-bar clearfix">
    <div class="page-title">
        <h4>
            <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
            Tambah Data Indikator Saran Eselon 3
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
        <?php $this->renderPartial('_form_eselon_tiga', array('model' => $model)); ?>
    </div>
</div>
