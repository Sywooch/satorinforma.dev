<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserModel */

$this->title = 'Manutenzione azienda';
$this->params['breadcrumbs'][] = ['label' => Yii::t('user', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('user', 'Update');
?>
<div class="user-update">

    <?php echo $this->render('../contact/_head', [
        'model' => $contattoModel,
    ]) ?>

    <h1></h1>
    <div class="title_left">
        <h3><?php echo Html::encode($this->title) ?></h3>
    </div>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
