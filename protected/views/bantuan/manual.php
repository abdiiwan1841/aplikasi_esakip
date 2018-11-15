<!-- Top Bar Starts -->
<div class="top-bar clearfix">
    <div class="page-title">
        <h4>
            <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
            Manual aplikasi
        </h4>
    </div>
</div>
<!-- Top Bar Ends -->

<!-- Container fluid Starts -->
<div class="container-fluid">
    <!-- Spacer starts -->
    <div class="spacer-xs">
        <!-- Row Starts -->
        <script src="<?php echo Yii::app()->baseUrl; ?>/static/js/PDFObject/pdfobject.js"></script>
        <object data='<?php echo Yii::app()->createAbsoluteUrl('static/manual.pdf'); ?>'
                type='application/pdf'
                width='100%'
                height='500px'>
            <p>This browser does not support inline PDFs. Please download the PDF to view it: <a
                        href="<?php echo Yii::app()->createAbsoluteUrl('static/manual.pdf'); ?>">Download PDF</a></p>
        </object>

        <!-- Row Ends -->
    </div>
    <!-- Spacer ends -->
</div>
<!-- Container fluid ends -->