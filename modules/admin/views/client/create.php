<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserModel */

$this->title = Yii::t('client', 'Create Client');
$this->params['breadcrumbs'][] = ['label' => Yii::t('client', 'Clients'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>


