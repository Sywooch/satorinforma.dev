<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\jui\DatePicker;
use keygenqt\autocompleteAjax\AutocompleteAjax;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\UserModel */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="contact-form">


<!-- ,'options' => ['enctype' => 'multipart/form-data'] -->
    <?php $form = ActiveForm::begin(['id' => 'modify-finanze-form']); ?>
    <div class="form-group">
        <?php if($model->isNewRecord==false) { echo Html::a(Yii::t('immobili', 'Torna alla scheda'), [Url::to(['contact/scheda', 'id' => $model->id])], ['class' => 'btn btn-primary']); } ?>
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('contact', 'Nuovo') : Yii::t('contact', 'Modifica'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php echo $form->field($model, 'annicontrib')->textInput(['type' => 'number']) ?>

            <?= $form->field($model, 'diversi')->radioList(array('S'=>'Si','N'=>'No')); ?>

            <?php echo $form->field($model, 'redditolordo')->textInput(['type' => 'number']) ?>

            <?= $form->field($model, 'sbalzi')->radioList(array('S'=>'Si','N'=>'No')); ?>

            <?php echo $form->field($model, 'liquidita')->textInput(['type' => 'number']) ?>

            <?php echo $form->field($model, 'debiti')->textInput(['type' => 'number']) ?>

            <?php echo $form->field($model, 'tfrmat')->textInput(['type' => 'number']) ?>


        </div>
    </div>

    <div class="form-group">
        <?php if($model->isNewRecord==false) { echo Html::a(Yii::t('immobili', 'Torna alla scheda'), [Url::to(['contact/scheda', 'id' => $model->id])], ['class' => 'btn btn-primary']); } ?>
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('contact', 'Nuovo') : Yii::t('contact', 'Modifica'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>