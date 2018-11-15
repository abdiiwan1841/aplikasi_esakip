<?php
/* @var $this IndikatorkegiatanController */
/* @var $data IndikatorKegiatan */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('indikatorid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->indikatorid),array('view','id'=>$data->indikatorid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_instansi')); ?>:</b>
	<?php echo CHtml::encode($data->id_instansi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nomor_misi')); ?>:</b>
	<?php echo CHtml::encode($data->nomor_misi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nomor_tujuan')); ?>:</b>
	<?php echo CHtml::encode($data->nomor_tujuan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nomor_sasaran')); ?>:</b>
	<?php echo CHtml::encode($data->nomor_sasaran); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nomor_program')); ?>:</b>
	<?php echo CHtml::encode($data->nomor_program); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nomor_kegiatan')); ?>:</b>
	<?php echo CHtml::encode($data->nomor_kegiatan); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('nomor_indikator')); ?>:</b>
	<?php echo CHtml::encode($data->nomor_indikator); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('indikator')); ?>:</b>
	<?php echo CHtml::encode($data->indikator); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('satuan')); ?>:</b>
	<?php echo CHtml::encode($data->satuan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('indikator_kinerja_utama')); ?>:</b>
	<?php echo CHtml::encode($data->indikator_kinerja_utama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target_rpjm1')); ?>:</b>
	<?php echo CHtml::encode($data->target_rpjm1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target_rpjm2')); ?>:</b>
	<?php echo CHtml::encode($data->target_rpjm2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target_rpjm3')); ?>:</b>
	<?php echo CHtml::encode($data->target_rpjm3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target_rpjm4')); ?>:</b>
	<?php echo CHtml::encode($data->target_rpjm4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target_rpjm5')); ?>:</b>
	<?php echo CHtml::encode($data->target_rpjm5); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target_tahun_sebelumnya')); ?>:</b>
	<?php echo CHtml::encode($data->target_tahun_sebelumnya); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('realisasi_tahun_sebelumnya')); ?>:</b>
	<?php echo CHtml::encode($data->realisasi_tahun_sebelumnya); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target')); ?>:</b>
	<?php echo CHtml::encode($data->target); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('realisasi')); ?>:</b>
	<?php echo CHtml::encode($data->realisasi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target_akhir_renstra')); ?>:</b>
	<?php echo CHtml::encode($data->target_akhir_renstra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keterangan')); ?>:</b>
	<?php echo CHtml::encode($data->keterangan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('analisis')); ?>:</b>
	<?php echo CHtml::encode($data->analisis); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipe_formula')); ?>:</b>
	<?php echo CHtml::encode($data->tipe_formula); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target_triwulan1')); ?>:</b>
	<?php echo CHtml::encode($data->target_triwulan1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target_triwulan2')); ?>:</b>
	<?php echo CHtml::encode($data->target_triwulan2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target_triwulan3')); ?>:</b>
	<?php echo CHtml::encode($data->target_triwulan3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target_triwulan4')); ?>:</b>
	<?php echo CHtml::encode($data->target_triwulan4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('realisasi_triwulan1')); ?>:</b>
	<?php echo CHtml::encode($data->realisasi_triwulan1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('realisasi_triwulan2')); ?>:</b>
	<?php echo CHtml::encode($data->realisasi_triwulan2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('realisasi_triwulan3')); ?>:</b>
	<?php echo CHtml::encode($data->realisasi_triwulan3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('realisasi_triwulan4')); ?>:</b>
	<?php echo CHtml::encode($data->realisasi_triwulan4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keterangan_triwulan1')); ?>:</b>
	<?php echo CHtml::encode($data->keterangan_triwulan1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keterangan_triwulan2')); ?>:</b>
	<?php echo CHtml::encode($data->keterangan_triwulan2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keterangan_triwulan3')); ?>:</b>
	<?php echo CHtml::encode($data->keterangan_triwulan3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keterangan_triwulan4')); ?>:</b>
	<?php echo CHtml::encode($data->keterangan_triwulan4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('penjelasan_formulasi')); ?>:</b>
	<?php echo CHtml::encode($data->penjelasan_formulasi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sumber_data')); ?>:</b>
	<?php echo CHtml::encode($data->sumber_data); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('indikator_pk')); ?>:</b>
	<?php echo CHtml::encode($data->indikator_pk); ?>
	<br />

	*/ ?>

</div>