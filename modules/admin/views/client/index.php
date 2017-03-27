<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii2mod\editable\EditableColumn;
use app\modules\admin\models\search\ClientStatus;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel \app\models\ClientModelSearch */

$this->title = Yii::t('client', 'Gestione clienti');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-index">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <p>
        <?php echo Html::a(Yii::t('client', 'Crea Cliente'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(['enablePushState' => false, 'timeout' => 10000]); ?>
    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',

            'description',
            'subdomain',
            [
                //'class' => EditableColumn::className(),
                'attribute' => 'master',
                //'url' => ['edit-client'],
                'value' => function ($model) {
                    return ClientStatus::getLabel($model->master);
                },
                /*'type' => 'select',
                'editableOptions' => function ($model) {
                    return [
                        'source' => ClientStatus::listData(),
                        'value' => $model->master,
                    ];
                },*/
                'filter' => ClientStatus::listData(),
                'filterInputOptions' => ['prompt' => Yii::t('client', 'Select'), 'class' => 'form-control'],
            ],

            [
                'header' => Yii::t('client', 'Action'),
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}{delete}',
            ],
        ],
    ]);
    ?>
    <?php Pjax::end(); ?>

</div>