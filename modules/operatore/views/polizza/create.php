<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserModel */

$this->title = 'Scelta polizza - Step 2/2 -';

?>
<div class="user-create">


    <?php echo $this->render('../contact/_head', [
        'model' => $contattoModel,
    ]); ?>

    <div class="title_left">
        <h3><?php echo Html::encode($this->title) ?></h3>
    </div>

    <?php echo $this->render('_form', [
        'model' => $model,
        'meseInizio' => $meseInizio,
        'meseFine' => $meseFine,
        'annoInizio' => $annoInizio,
        'annoFine' => $annoFine,
        'idpolizza' => $idpolizza,
    ]); ?>

</div>
