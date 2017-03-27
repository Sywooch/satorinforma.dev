<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\UserModel */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="user-form">



    <?php $form = ActiveForm::begin(['id' => 'create-user-form']); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->errorSummary($model); ?>


            <?php echo $form->field($model, 'username')->textInput(['maxlength' => 255]) ?>

            <?php echo $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>

            <?php echo $form->field($model, 'status')->dropDownList(['1'=>'Attivo', '0'=>'Disabilitato']); ?>

            <?php echo $form->field($model, 'newPassword')->passwordInput(['autocomplete' => 'off']); ?>

            <?php
            $items = ArrayHelper::map(\app\models\ClientModel::find()->orderBy(['description' => SORT_ASC])->all(), 'id', 'description');
            echo $form->field($model, 'idclient')->dropDownList($items);
            ?>

        </div>
    </div>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('user', 'Nuovo') : Yii::t('user', 'Modifica'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>