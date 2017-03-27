<?php

use yii\grid\GridView;
use yii\widgets\ListView;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii2mod\editable\EditableColumn;
use yii2mod\user\models\enumerables\UserStatus;
use app\models\ClientModel;
use yii\data\ActiveDataProvider;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel \app\models\UserModelSearch */

$this->title = Yii::t('contact', 'Log operazioni');
$this->params['breadcrumbs'][] = $this->title;
?>


<?php echo $this->render('../contact/_head', [
    'model' => $contattoModel,
]) ?>
<!-- page content -->
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Log operazioni</h3>
            </div>

        <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <?php $form = ActiveForm::begin(['method' => 'get',
                    'fieldConfig' => [
                        'options' => [
                            'tag' => false,
                        ],
                    ]]); ?>
                <div class="input-group">
                    <span class="input-group-btn">
                    </span>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="row">

                            <?php echo Html::a(Yii::t('immobili', 'Torna alla scheda'), [Url::to(['contact/scheda', 'id' => $contattoModel->id])], ['class' => 'btn btn-primary']) ?>


                            <?php Pjax::begin(['enablePushState' => false, 'timeout' => 10000]); ?>
                            <?php echo GridView::widget([
                                'dataProvider' => $dataProvider,

                                'columns' => [
                                    [
                                        'attribute' => 'idlogtype',
                                        'value' => function ($model) {
                                            return $model->logtype->descrizione;
                                        },
                                    ],
                                    [
                                        'attribute' => 'operazione',
                                        'value' => function ($model) {
                                            return \app\models\OperazioneLog::getLabel($model->operazione);
                                        },

                                    ],
                                    [
                                        'attribute' => 'iduser',
                                        'value' => function ($model) {
                                            return $model->user->username;
                                        },
                                    ],
                                    [
                                        'attribute' => 'data_inserimento',
                                        'format' => 'dateTime',
                                        'filter' => false,
                                    ]
                                ],
                            ]);
                            ?>
                            <?php Pjax::end(); ?>
<!--</div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- /page content -->