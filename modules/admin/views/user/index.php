<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii2mod\editable\EditableColumn;
use app\models\ClientModel;
use app\modules\admin\models\search\UserStatus;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel \app\models\UserModelSearch */

$this->title = Yii::t('user', 'Gestione utenti');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <p>
        <?php echo Html::a(Yii::t('user', 'Crea Utente'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(['enablePushState' => false, 'timeout' => 10000]); ?>
    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            [
                //'class' => EditableColumn::className(),
                'attribute' => 'username',
                //'url' => ['edit-user'],
            ],
            'email:email',
            [
                //'class' => EditableColumn::className(),
                'attribute' => 'status',
                //'url' => ['edit-user'],
                'value' => function ($model) {
                    return UserStatus::getLabel($model->status);
                },
                /*'type' => 'select',
                'editableOptions' => function ($model) {
                    return [
                        'source' => UserStatus::listData(),
                        'value' => $model->status,
                    ];
                },*/
                'filter' => UserStatus::listData(),
                'filterInputOptions' => ['prompt' => Yii::t('user', 'Select Status'), 'class' => 'form-control'],
            ],
            [
                //'class' => EditableColumn::className(),
                'attribute' => 'idclient',
                //'url' => ['edit-user'],
                'value' => function ($model) {
                    return ClientModel::getDescription($model->idclient);
                },

                /*'type' => 'select',
                'editableOptions' => function ($model) {
                    return [
                        'source' => ClientModel::listData(),
                        'value' => $model->idclient,
                    ];
                },*/
                'filter' => ClientModel::listData(),
                'filterInputOptions' => ['prompt' => Yii::t('idclient', 'Seleziona cliente'), 'class' => 'form-control'],
            ],

            [
                'attribute' => 'Classe utente',
                'format' => 'raw' ,
                'value' => function ($model) {
                    $str=Html::a('<i class="fa fa-user"></i> ', [Url::to(['user/chgclass', 'id' => $model->id])], ['class' => '']);
                    if($model->auth==null) return '' .$str;
                    return $model->auth->item_name.' ' .$str;
                },
            ],
            [
                'attribute' => 'createdAt',
                'format' => 'date',
                'filter' => false,
            ],
            [
                'header' => Yii::t('user', 'Action'),
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}{delete}',
            ],
        ],
    ]);
    ?>
    <?php Pjax::end(); ?>

</div>