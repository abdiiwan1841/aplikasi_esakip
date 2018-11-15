<?php
/* @var $this AktivitasController */
/* @var $data Aktivitas */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('aktivitasid')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->aktivitasid), array('view', 'id' => $data->aktivitasid)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('id_instansi')); ?>:</b>
    <?php echo CHtml::encode($data->id_instansi); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('nomor_misi')); ?>:</b>
    <?php echo CHtml::encode($data->nomor_misi); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('nomor_tujuan')); ?>:</b>
    <?php echo CHtml::encode($data->nomor_tujuan); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('nomor_sasaran')); ?>:</b>
    <?php echo CHtml::encode($data->nomor_sasaran); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('nomor_indikator')); ?>:</b>
    <?php echo CHtml::encode($data->nomor_indikator); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('nomor_program')); ?>:</b>
    <?php echo CHtml::encode($data->nomor_program); ?>
    <br/>

    <?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('nomor_kegiatan')); ?>:</b>
	<?php echo CHtml::encode($data->nomor_kegiatan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nomor_aktivitas')); ?>:</b>
	<?php echo CHtml::encode($data->nomor_aktivitas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('aktivitas')); ?>:</b>
	<?php echo CHtml::encode($data->aktivitas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pagu_anggaran')); ?>:</b>
	<?php echo CHtml::encode($data->pagu_anggaran); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target_keuangan')); ?>:</b>
	<?php echo CHtml::encode($data->target_keuangan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('realisasi_keuangan')); ?>:</b>
	<?php echo CHtml::encode($data->realisasi_keuangan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target_fisik')); ?>:</b>
	<?php echo CHtml::encode($data->target_fisik); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('realisasi_fisik')); ?>:</b>
	<?php echo CHtml::encode($data->realisasi_fisik); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target_keuangan_triwulan1')); ?>:</b>
	<?php echo CHtml::encode($data->target_keuangan_triwulan1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target_keuangan_triwulan2')); ?>:</b>
	<?php echo CHtml::encode($data->target_keuangan_triwulan2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target_keuangan_triwulan3')); ?>:</b>
	<?php echo CHtml::encode($data->target_keuangan_triwulan3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target_keuangan_triwulan4')); ?>:</b>
	<?php echo CHtml::encode($data->target_keuangan_triwulan4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('realisasi_keuangan_triwulan1')); ?>:</b>
	<?php echo CHtml::encode($data->realisasi_keuangan_triwulan1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('realisasi_keuangan_triwulan2')); ?>:</b>
	<?php echo CHtml::encode($data->realisasi_keuangan_triwulan2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('realisasi_keuangan_triwulan3')); ?>:</b>
	<?php echo CHtml::encode($data->realisasi_keuangan_triwulan3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('realisasi_keuangan_triwulan4')); ?>:</b>
	<?php echo CHtml::encode($data->realisasi_keuangan_triwulan4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target_fisik_triwulan1')); ?>:</b>
	<?php echo CHtml::encode($data->target_fisik_triwulan1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target_fisik_triwulan2')); ?>:</b>
	<?php echo CHtml::encode($data->target_fisik_triwulan2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target_fisik_triwulan3')); ?>:</b>
	<?php echo CHtml::encode($data->target_fisik_triwulan3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target_fisik_triwulan4')); ?>:</b>
	<?php echo CHtml::encode($data->target_fisik_triwulan4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('realisasi_fisik_triwulan1')); ?>:</b>
	<?php echo CHtml::encode($data->realisasi_fisik_triwulan1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('realisasi_fisik_triwulan2')); ?>:</b>
	<?php echo CHtml::encode($data->realisasi_fisik_triwulan2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('realisasi_fisik_triwulan3')); ?>:</b>
	<?php echo CHtml::encode($data->realisasi_fisik_triwulan3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('realisasi_fisik_triwulan4')); ?>:</b>
	<?php echo CHtml::encode($data->realisasi_fisik_triwulan4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nomor_misi_provinsi')); ?>:</b>
	<?php echo CHtml::encode($data->nomor_misi_provinsi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nomor_sasaran_provinsi')); ?>:</b>
	<?php echo CHtml::encode($data->nomor_sasaran_provinsi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nomor_indikator_provinsi')); ?>:</b>
	<?php echo CHtml::encode($data->nomor_indikator_provinsi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ket')); ?>:</b>
	<?php echo CHtml::encode($data->ket); ?>
	<br />

	*/ ?>

</div>