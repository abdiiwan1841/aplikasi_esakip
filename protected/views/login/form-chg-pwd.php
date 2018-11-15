<?php
$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    'Login',
);
?>

<!-- Top Bar Starts -->
<div class="top-bar clearfix">
    <div class="page-title">
        <h4>
            <div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
            Perubahan Kata Kunci
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h4>Form</h4>
                    </div>
                    <div class="panel-body">
                        <?php echo TbHtml::alert(TbHtml::ALERT_COLOR_WARNING, ' <h3>PENTING!!!</h3>
                            <p>Setelah pergantian kata kunci, akan di logout otomatis</p>'); ?>
                        <?php if(Yii::app()->user->hasFlash('pesan')) {
                            echo TbHtml::alert(TbHtml::ALERT_COLOR_INFO, Yii::app()->user->getFlash("pesan"));
                        }?>
                        <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                            'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
                            'id'=>'chgpass-form',
                            'enableClientValidation'=>true,
                            'clientOptions'=>array(
                                'validateOnSubmit'=>true,
                            ),
                        )); ?>
                        <?php echo $form->textFieldControlGroup($model, 'passwordOld',array('span' => 5, 'maxlength' => 20)); ?>
                        <?php echo $form->textFieldControlGroup($model, 'passwordSave',array('span' => 5, 'maxlength' => 20)); ?>
                        <?php echo $form->textFieldControlGroup($model, 'repeatPassword',array('span' => 5, 'maxlength' => 20)); ?>


                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                        <?php echo TbHtml::formActions(array(
                            TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_SUCCESS)),
                            TbHtml::resetButton('Reset'),
                        )); ?>
                            </div>
                        </div>
                        <?php $this->endWidget(); ?>
                    </div>
                </div>
            </div>

        </div>
        <!-- Row Ends -->
    </div>
    <!-- Spacer ends -->
</div>
<!-- Container fluid ends -->