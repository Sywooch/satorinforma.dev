<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\admin\models\search\ClientStatus;
use keygenqt\autocompleteAjax\AutocompleteAjax;


/* @var $this yii\web\View */
/* @var $model app\models\UserModel */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="user-form">



    <?php $form = ActiveForm::begin(['id' => 'create-user-form']); ?>

    <div class="row">
        <div class="col-md-6">
            <?php echo $form->field($model, 'description')->textInput(['maxlength' => 255]) ?>

            <?php echo $form->field($model, 'pi')->textInput(['maxlength' => 255]) ?>

            <?php echo $form->field($model, 'adress')->textInput(['maxlength' => 255]) ?>

            <?php echo $form->field($model, 'cap')->textInput(['maxlength' => 5]) ?>


            <?= $form->field($model, 'comune')->widget(AutocompleteAjax::classname(), [
                'multiple' => false,
                'url' => ['ajax/search-comune'],
                'options' => ['placeholder' => 'Find by user email or user id.']
            ]) ?>


            <?php echo $form->field($model, 'mailto')->textInput(['maxlength' => 255]) ?>

            <?php echo $form->field($model, 'mailfrom')->textInput(['maxlength' => 255]) ?>

            <?php echo $form->field($model, 'phone')->textInput(['maxlength' => 255]) ?>

            <?php echo $form->field($model, 'cell')->textInput(['maxlength' => 255]) ?>

            <?php echo $form->field($model, 'master')->dropDownList(ClientStatus::listData()); ?>

            <?php echo $form->field($model, 'subdomain')->textInput(['maxlength' => 255]) ?>

        </div>
    </div>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('user', 'Crea') : Yii::t('user', 'Modifica'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>