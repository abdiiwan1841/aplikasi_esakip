<?php
/* @var $this DataikuController*/
/* @var $model Dataiku */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('\TbActiveForm', array(
        'id' => 'dataiku-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data')
    )); ?>

    <p class="help-block">Isian yang bertanda <span class="required">*</span> wajib diisi.</p>

    <?php echo $form->errorSummary($model); ?>


    <?php
    if (Yii::app()->user->isAdmin()) {
    $indikatorprov = CHtml::listData(Indikatorprov::model()->findAll(), 'indikatorid', 'indikator');
    echo $form->dropDownListControlGroup($model, 'indikatorid', $indikatorprov,
            array('span' => 5, 'maxlength' => 7, 'prompt' => '--Pilih IKU--'));
    } else {
        echo $form->hiddenField($model, 'indikatorid', array('value' => Yii::app()->user->getOpd()));
    }
        
    $opts = CHtml::listData(Opd::model()->findAll('aktif=1'), 'id_instansi', 'nama_instansi');
    $modelopd = new Opd;
        echo $form->dropDownListControlGroup($modelopd,'nama_instansi', $opts,
            array('span' => 5, 'maxlength' => 7, 'prompt' => '--Pilih OPD--',
                'ajax' => array(
                    'type' => 'POST', //request type
                    'url' => Yii::app()->getBaseUrl(true).'/loaddata/program',
                    'dataType'=> 'html',
                    'data' => array('OPD' => 'js: $(this).val()'),
                    'success' => 'function(data){$("#Program_program").html(data);}'
                )
            ));

    $modelprogram = new Program;
    $criteria = new CDbCriteria();
    $criteria->addCondition("id_instansi=:idx");
    $criteria->params = array(':idx' => $modelprogram->id_instansi);
    $program = CHtml::listData(Program::model()->findAll($criteria), 'nomor_program', 'program');
    echo $form->dropDownListControlGroup($modelprogram, 'program', $program,
        array('span' => 5, 'maxlength' => 7, 'prompt' => '--Pilih Program--',
            'ajax' => array(
                'type' => 'POST', //request type
                'url' => Yii::app()->getBaseUrl(true).'/loaddata/kegiatan',
                'data' => array('OPD' => 'js: $("#Opd_nama_instansi").val()', 'NoProgram' => 'js: $(this).val()'),
                'success' => 'function(data){$("#Kegiatan_kegiatan").html(data);}'
            )));

    $modelkegiatan = new Kegiatan;
    $criteria = new CDbCriteria();
    $criteria->addCondition("id_instansi=:idx");
    $criteria->addCondition("nomor_program=:no_prog");
    $criteria->params = array(':idx' => $modelkegiatan->id_instansi, ':no_prog' => $modelkegiatan->nomor_program);
    $kegiatan = CHtml::listData(Kegiatan::model()->findAll($criteria), 'nomor_kegiatan', 'kegiatan');
    echo $form->dropDownListControlGroup($modelkegiatan, 'kegiatan', $kegiatan, 
        array('span' => 5, 'maxlength' => 7, 'prompt' => '--Pilih Kegiatan--',));
    ?>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?php echo TbHtml::submitButton($model->isNewRecord ? 'Simpan' : 'Perbaharui', array(
                'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                'size' => TbHtml::BUTTON_SIZE_LARGE,
                "id"=>"iku_submit"
            )); ?>
        </div>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->

<script>
document.getElementById("iku_submit").addEventListener("click", function(event){
    event.preventDefault();
    var iku = document.getElementById("Indikatorprov_indikatorid").value;
    var opd = document.getElementById("Opd_nama_instansi").value;
    var program = document.getElementById("Program_program").value;
    var kegiatan = document.getElementById("Kegiatan_kegiatan").value;

		$.ajax({
			url: '<?php echo Yii::app()->getBaseUrl(true).'/dataiku/tabel'?>',
			dataType: 'html',
			type    : 'POST',
			data		: {'iku' : iku,'opd':opd,'program':program,'kegiatan':kegiatan
			},
			success: function(data){
				$("#form-element").html(data);
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				if (XMLHttpRequest.status === 200) {
					bootbox.alert(textStatus+' errornya '+errorThrown);
				}else{
					unloading();
					unloading(); bootbox.alert('Maaf, Terjadi kesalahan dalam sistem!!');
				}
			}
		});
});
</script>