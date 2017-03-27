<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \yii2mod\user\models\PasswordResetRequestForm */

$this->title = Yii::t('yii2mod.user', 'Password Dimenticata');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-request-password-reset">

    <?php
    $url = Url::home(true);
    echo Html::img($url.'images/logo.png', ['alt' => 'My logo', 'height' => '50px', 'align' => '']) ?>
    <span></span>


    <h1><?php echo Html::encode($this->title) ?></h1>

    <p><?php echo Yii::t('yii2mod.user', 'Inserisci il tuo indirizzo email. Un link ti verrà inviato sulla tua posta elettronica.'); ?></p>

    <!--<div class="row">
        <div class="col-lg-5">-->
            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
            <?php echo $form->field($model, 'email'); ?>
            <div class="form-group">
                <?php echo Html::submitButton(Yii::t('yii2mod.user', 'Invia'), ['class' => 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end(); ?>
       <!-- </div>
    </div>-->
</div>
