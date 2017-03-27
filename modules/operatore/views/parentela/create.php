<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UserModel */

$this->title = 'Creazione parentela';
$this->params['breadcrumbs'][] = ['label' => Yii::t('user', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('user', 'Update');
?>
<div class="user-create">


    <?php echo $this->render('../contact/_head', [
        'model' => $contattoModel,
    ]) ?>

    <div class="title_left">
        <h3><?php echo Html::encode($this->title) ?></h3>
    </div>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
