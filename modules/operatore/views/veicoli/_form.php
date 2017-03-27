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



    <?php $form = ActiveForm::begin(['id' => 'create-aziende-contact-form']); ?>

    <div class="row">
        <div class="col-md-6">


            <?php
            $items = ArrayHelper::map(\app\models\TipoVeicoloModel::find()->all(), 'idtipo_veicolo', 'descrizione');
            echo $form->field($model, 'idtipo_veicolo')->dropDownList($items); ?>

            <?php


            $items = ArrayHelper::map(\app\models\PercentualeModel::find()->orderBy(['idpercentuale' => SORT_DESC])->all(), 'idpercentuale', 'percentualecol');
            echo $form->field($model, 'idpercentuale')->dropDownList($items); ?>
            <?php echo $form->field($model, 'valore')->textInput(['maxlength' => 30]) ?>



        </div>
    </div>

    <div class="form-group">
        <?php echo Html::a(Yii::t('immobili', 'Torna alla lista'), [Url::to(['index', 'id' => $model->idcontatto])], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>