<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserModel */

$this->title = Yii::t('contact', 'Modifica situazione finanziaria');
$this->params['breadcrumbs'][] = ['label' => Yii::t('contact', 'Contacts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <?php echo $this->render('_head', [
        'model' => $model,
    ]) ?>

    <h1></h1>
    <div class="title_left">
        <h3><?php echo Html::encode($this->title) ?></h3>
    </div>

    <?php echo $this->render('_formfinanze', [
        'model' => $model,
    ]) ?>

</div>


