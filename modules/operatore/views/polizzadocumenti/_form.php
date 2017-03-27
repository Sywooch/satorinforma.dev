<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\jui\DatePicker;
use keygenqt\autocompleteAjax\AutocompleteAjax;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use app\models\PolizzaModel;
use app\models\MesiModel;

/* @var $this yii\web\View */
/* @var $model app\models\UserModel */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="contact-form">



    <?php $form = ActiveForm::begin(['id' => 'create-polizza-contact-form','options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="row">
        <div class="col-md-6">

            <?php
            $items = ArrayHelper::map(\app\models\FileTypeModel::find()->all(), 'idfile_type', 'descrizione');
            echo $form->field($modelFile, 'file_type')->dropDownList($items); ?>

            <?= $form->field($modelFile, 'file')->fileInput() ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo Html::a(Yii::t('immobili', 'Torna alla lista'), [Url::to(['index', 'id' => $model->idpolizza_contatto])], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::submitButton($model->isNewRecord ? 'Procedi' : 'Modifica', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>