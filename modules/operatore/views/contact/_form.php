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


<!--  -->
    <?php $form = ActiveForm::begin(['id' => 'create-contact-form','options' => ['enctype' => 'multipart/form-data']]); ?>



    <div class="form-group">
        <?php if($model->isNewRecord==false) { echo Html::a(Yii::t('immobili', 'Torna alla scheda'), [Url::to(['contact/scheda', 'id' => $model->id])], ['class' => 'btn btn-primary']); } ?>
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('contact', 'Nuovo') : Yii::t('contact', 'Modifica'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php echo $form->field($model, 'nome')->textInput(['maxlength' => 255]) ?>

            <?php echo $form->field($model, 'cognome')->textInput(['maxlength' => 255]) ?>

            <?= $form->field($model, 'sesso')->radioList(array('M'=>'Maschio','F'=>'Femmina')); ?>


            <?php

            echo $form->field($model, 'datanascita')->widget(yii\widgets\MaskedInput::classname(),[
                'mask' => '99/99/9999',
            ]);
            ?>

            <?php echo $form->field($model, 'cf')->textInput(['maxlength' => 16]) ?>


            <?php
            $items = ArrayHelper::map(\app\models\StatoCivileModel::find()->all(), 'idstatocivile', 'descrizione');
            echo $form->field($model, 'id_civile')->dropDownList($items);
            ?>

            <?php
            $items = ArrayHelper::map(\app\models\LavoroModel::find()->orderBy(['descrizione' => SORT_ASC])->all(), 'idtipolavoro', 'descrizione');
            echo $form->field($model, 'id_lavoro')->dropDownList($items);
            ?>


            <?php echo $form->field($model, 'indirizzo')->textInput(['maxlength' => 255]) ?>


            <?= $form->field($model, 'comune_id')->widget(AutocompleteAjax::classname(), [
                'multiple' => false,
                'url' => ['ajax/search-comune'],
                'options' => ['placeholder' => 'Cerca comune']
            ]) ?>


            <?php echo $form->field($model, 'cap')->textInput(['maxlength' => 10]) ?>



            <?php echo $form->field($model, 'email')->input('email') ?>

            <?php echo $form->field($model, 'phone')->textInput(['maxlength' => 50]) ?>

            <?php echo $form->field($model, 'cell')->textInput(['maxlength' => 50]) ?>

            <?= $form->field($model, 'image')->fileInput() ?>

            <?php

            /*echo $form->field($model, 'image')->widget(FileInput::classname(), [
                'options' => ['accept' => 'image/*'],
                'pluginOptions' => [
                    'showPreview' => false,
                    'showCaption' => true,
                    'showRemove' => true,
                    'showUpload' => false
                ]
            ]);*/
            ?>



        </div>
    </div>

    <div class="form-group">
        <?php if($model->isNewRecord==false) { echo Html::a(Yii::t('immobili', 'Torna alla scheda'), [Url::to(['contact/scheda', 'id' => $model->id])], ['class' => 'btn btn-primary']); } ?>
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('contact', 'Nuovo') : Yii::t('contact', 'Modifica'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>