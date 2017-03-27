<?php

namespace app\modules\admin\controllers;

use app\models\ClientModel;
use app\modules\admin\models\search\ClientSearch;
use app\traits\FindModelTrait;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii2mod\editable\EditableAction;

/**
 * Class ClientController
 *
 * @package app\modules\admin\controllers
 */
class ClientController extends Controller
{
    use FindModelTrait;



    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'index' => ['get'],
                    'create' => ['get', 'post'],
                    'update' => ['get', 'post'],
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'edit-client' => [
                'class' => EditableAction::class,
                'modelClass' => ClientModel::class,
                'forceCreate' => false,
            ],
            'index' => [
                'class' => 'yii2tech\admin\actions\Index',
                'newSearchModel' => function () {
                    return new ClientSearch();
                },
            ],
            'delete' => [
                'class' => 'yii2tech\admin\actions\Delete',
                'findModel' => function ($id) {
                    return $this->findModel(ClientModel::class, $id);
                },
                'flash' => Yii::t('client', 'Client has been deleted.'),
            ],
        ];
    }

    /**
     * Creates a new user.
     *
     * If creation is successful, the browser will be redirected to the 'index' page.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ClientModel();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->createClient()) {
                Yii::$app->session->setFlash('success', Yii::t('client', 'Client has been created.'));

                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing user.
     *
     * If update is successful, the browser will be redirected to the 'index' page.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel(ClientModel::class, $id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            //Validazione


            $model->save(false);
            Yii::$app->session->setFlash('success', Yii::t('client', 'Client has been saved.'));

            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
}
