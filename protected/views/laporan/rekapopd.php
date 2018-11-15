<!-- Top Bar Starts -->
<div class="top-bar clearfix">
    <div class="page-title">
        <h4>
            <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
            Rekap Data SAKIP
        </h4>
    </div>
    <!--<ul class="right-stats hidden-xs" id="mini-nav-right">
        <li class="reportrange btn btn-success">
            <i class="fa fa-calendar"></i>
            <span></span> <b class="caret"></b>
        </li>
        <li>
            <a href="#" class="btn btn-info sb-open-right  sb-close">
                <div class="fs1" aria-hidden="true" data-icon="&#xe06a;"></div>
            </a>
        </li>
    </ul>-->
</div>
<!-- Top Bar Ends -->

<!-- Container fluid Starts -->
<div class="container-fluid">

    <!-- Spacer starts -->
    <div class="spacer-xs">
        <!-- Row Starts -->
        <?php

        $coul = array(
            'id_instansi',
            'nama_instansi',
            array(
                'name' => 'visi',
                'value' => 'count($data->datavisi)',
                'htmlOptions' => array(
                    'width' => '40', // menentukan ukuran column
                    'style' => 'text-align: center', // menentukan alignment text
                )
            ),
            array(
                'name' => 'misi',
                'value' => 'count($data->datamisi)',
                'htmlOptions' => array(
                    'width' => '40', // menentukan ukuran column
                    'style' => 'text-align: center', // menentukan alignment text
                )
            ),
            array(
                'name' => 'Tujuan',
                'value' => 'count($data->datatujuan)',
                'htmlOptions' => array(
                    'width' => '40', // menentukan ukuran column
                    'style' => 'text-align: center', // menentukan alignment text
                )
            ),
            array(
                'name' => 'Sasaran',
                'value' => 'count($data->datasasaran)',
                'htmlOptions' => array(
                    'width' => '40', // menentukan ukuran column
                    'style' => 'text-align: center', // menentukan alignment text
                )
            ),
            array(
                'name' => 'Indikator',
                'value' => 'count($data->dataindikator)',
                'htmlOptions' => array(
                    'width' => '40', // menentukan ukuran column
                    'style' => 'text-align: center', // menentukan alignment text
                )
            ), array(
                'name' => 'Program',
                'value' => 'count($data->dataprogram)',
                'htmlOptions' => array(
                    'width' => '40', // menentukan ukuran column
                    'style' => 'text-align: center', // menentukan alignment text
                )
            ), array(
                'name' => 'Kegiatan',
                'value' => 'count($data->datakegiatan)',
                'htmlOptions' => array(
                    'width' => '40', // menentukan ukuran column
                    'style' => 'text-align: center', // menentukan alignment text
                )
            ), array(
                'name' => 'Aktivitas',
                'value' => 'count($data->dataaktivitas)',
                'htmlOptions' => array(
                    'width' => '40', // menentukan ukuran column
                    'style' => 'text-align: center', // menentukan alignment text
                )
            ),
        );

        $this->widget('\TbGridView', array(
            'id' => 'rekapopd-grid',
            'dataProvider' => $model->summary(),
            'columns' => $coul,
        )); ?>
        <!-- Row Ends -->
    </div>
    <!-- Row Ends -->
</div>
<!-- Spacer ends -->
</div>
<!-- Container fluid ends -->