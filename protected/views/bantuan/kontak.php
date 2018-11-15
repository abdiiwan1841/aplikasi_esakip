<!-- Top Bar Starts -->
<div class="top-bar clearfix">
    <div class="page-title">
        <h4>
            <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
            Kontak & Informasi Aplikasi
        </h4>
    </div>
</div>
<!-- Top Bar Ends -->

<!-- Container fluid Starts -->
<div class="container-fluid">

    <!-- Spacer starts -->
    <div class="spacer-xs">
        <!-- Row Starts -->
        <div class="row no-gutter">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Kontak Teknis</h4>
                    </div>
                    <div class="panel-body">
                        <div class="form">
                            <div class="form-group">
                                <label>Dukungan Teknis (09:00 - 17:00 WIB)</label>
                            </div>
                            <div class="form-group">
                                <label><i class="fa fa-inbox"></i></label>
                                <span>abdiiwan1841@gmail.com</span>
                            </div>
                            <div class="form-group">
                                <label><i class="fa fa-phone"></i></label>
                                <span>0857 2299 5889</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Attention</h4>
                    </div>
                    <div class="panel-body">
                        <?php echo TbHtml::alert(TbHtml::ALERT_COLOR_WARNING,
                            '<p>Untuk perbaikan diharapkan menggunakan screen shoot agar permasalahan mudah untuk ditelusuri</p>
                                        <p>Tidak semua request bisa langsung dihandle dikarenakan ketersediaan waktu dan pekerjaan</p>'); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Change Log</h4>
                        <ul class="links">
                            <li>
                                <a href="#">
                                    <i class="fa fa-list"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        <?php

                        $selected_columns = array(
                            array(
                                'header' => 'Waktu',
                                'name' => 'cdt',
                                'type' => 'html',
                                'htmlOptions' => array('style' => 'word-wrap: break-word;vertical-align:top'),
                                'headerHtmlOptions' => array('style' => 'text-align:left;'),
                                'value' => '"<div style=\"width:130px;\"><i class=\"fa fa-calendar\"></i> " . Yii::app()->dateFormatter->format("dd-MM-yyyy hh:mm",strtotime($data["cdt"])) . "</div>"'
                            ),
                            array(
                                'header' => 'Keterangan',
                                'name' => 'txtlog',
                                'type' => 'html',
                                'htmlOptions' => array('style' => 'word-wrap: break-word;vertical-align:top'),
                                'headerHtmlOptions' => array('style' => 'text-align:left;'),
                                'value' => '$data["txtlog"]',
                            ),
                        );

                        $this->widget('\TbGridView', array(
                            'id' => 'changelod-grid',
                            'dataProvider' => $model->search(),
                            'htmlOptions'=> array('class'=>'table-responsive'),
                            /*'filter'=>$model,*/
                            'columns' => $selected_columns,
                        )); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row Ends -->
    </div>
    <!-- Spacer ends -->
</div>
<!-- Container fluid ends -->