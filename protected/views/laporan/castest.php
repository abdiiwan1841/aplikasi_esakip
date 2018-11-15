<div class="top-bar clearfix">
    <div class="page-title">
        <h4>
            <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
            <?php echo $title?> <?php echo Yii::app()->user->getTahun(); ?>
        </h4>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-0 col-sm-12">
        <?php echo TbHtml::alert(TbHtml::ALERT_COLOR_DANGER,
            '<p> Jika struktur cascading yang ditampilkan tidak sesuai, User dapat mengunggah file cascading (struktur file cascading yang telah dibuat manual oleh user) dalam format file (.jpg / .png / .pdf / .doc / .docx / .xlsx / .xls)</p>'); ?>
    </div>
</div>

<div class="container-fluid">
    <div class="spacer-xs">

        <?php $this->renderPartial('_form_laporan_cascading', array('model' => $model)); ?>
    </div>

    <div id="form-element">
    </div>
</div>

