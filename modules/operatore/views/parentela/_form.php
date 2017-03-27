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



    <?php $form = ActiveForm::begin(['id' => 'create-parentela-contact-form']); ?>

    <div class="row">
        <div class="col-md-6">


            <?php
            $items = ArrayHelper::map(\app\models\ParentelaModel::find()->all(), 'idparentela', 'descrizione');
            echo $form->field($model, 'idparentela')->dropDownList($items); ?>


            <?= $form->field($model, 'idcontattop')->widget(AutocompleteAjax::classname(), [
                'multiple' => true,
                'url' => ['ajax/search-contact'],
                'options' => ['placeholder' => 'trova'],
            ]); ?>


            <?php echo $form->field($model, 'anni')->textInput(['maxlength' => 3]) ?>

            <?php echo $form->field($model, 'acarico')->checkBox(['label' => 'Familiare a carico', 'uncheck' => false, 'checked' => true]); ?>

        </div>
    </div>

    <div class="form-group">
        <?php echo Html::a(Yii::t('immobili', 'Torna alla lista'), [Url::to(['index', 'id' => $model->idcontatto])], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>