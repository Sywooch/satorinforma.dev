<?php

use yii\helpers\Html;
use app\models\PolizzaModel;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\UserModel */

$this->title = 'Scelta polizza - Step 1/2 -';

?>
<div class="user-create">


    <?php echo $this->render('../contact/_head', [
        'model' => $contattoModel,
    ]); ?>

    <div class="title_left">
        <h3><?php echo Html::encode($this->title) ?></h3>
    </div>


    <div class="contact-form">


       <div class="row">
            <div class="col-md-12">

                <?php
                $somma = 0;
                $arrimm = PolizzaModel::find()->all();
                $cont=1;
                foreach ($arrimm as $polizza){
                    echo $this->render('_polizza', [
                        'model' => $polizza,
                        'contattoModel' => $contattoModel,
                    ]);
                }
                ?>





            </div>
        </div>

        <div class="form-group">
            <?php echo Html::a(Yii::t('immobili', 'Torna alla lista'), [Url::to(['index', 'id' => $model->idcontatto])], ['class' => 'btn btn-primary']) ?>

        </div>



    </div>

</div>
