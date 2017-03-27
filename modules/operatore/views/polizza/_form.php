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



    <?php $form = ActiveForm::begin(['id' => 'create-polizza-contact-form']); ?>
    <div class="row">
        <div class="col-md-6">
            <?= Html::hiddenInput('id', $model->idcontatto) ?>
            <?= Html::hiddenInput('idpolizza',$idpolizza) ?>
            <?= Html::label('Mese/anno inizio', 'meseInizio', ['class' => 'control-label ']) ?>
            <?php echo HTML::dropDownList('meseInizio',$meseInizio ,\app\models\MesiModel::listData()); ?>
            /<?= Html::textInput('annoInizio', $annoInizio, ['maxlength' => 4]) ?>

            <br/>

            <?= Html::label('Mese/anno fine', 'meseFine', ['class' => 'control-label ']) ?>
            <?php echo HTML::dropDownList('meseFine',$meseFine ,\app\models\MesiModel::listData()); ?>/
            <?= Html::textInput('annoFine', $annoFine, ['maxlength' => 4]) ?>
            <br/>

            <br/>
        </div>
    </div>

    <div class="form-group">
        <?php echo Html::a(Yii::t('immobili', 'Torna alla lista'), [Url::to(['index', 'id' => $model->idcontatto])], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::submitButton($model->isNewRecord ? 'Procedi' : 'Modifica', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>