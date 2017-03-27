<?php

namespace app\modules\admin\controllers;

use app\models\AuthModel;
use app\models\UserModel;
use app\modules\admin\models\search\UserSearch;
use app\traits\FindModelTrait;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii2mod\editable\EditableAction;

/**
 * Class UserController
 *
 * @package app\modules\admin\controllers
 */
class UserController extends Controller
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
            'edit-user' => [
                'class' => EditableAction::class,
                'modelClass' => UserModel::class,
                'forceCreate' => false,
            ],
            'index' => [
                'class' => 'yii2tech\admin\actions\Index',
                'newSearchModel' => function () {
                    return new UserSearch();
                },
            ],
            'delete' => [
                'class' => 'yii2tech\admin\actions\Delete',
                'findModel' => function ($id) {
                    return $this->findModel(UserModel::class, $id);
                },
                'flash' => Yii::t('user', 'User has been deleted.'),
            ],
        ];
    }

    public function actionChgclass($id){
        $auth=AuthModel::findOne(['user_id'=>$id]);
        if($auth==null) $auth=new AuthModel();
        $auth->user_id=$id;
        if($auth->item_name=='user'){
            $auth->item_name='admin';
        }else{
            $auth->item_name='user';
        }
        $auth->user_id=$id;
        $auth->save(false);

        return $this->redirect(['index']);
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
        $model = new UserModel(['scenario' => 'createUser']);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->createUser()) {
                Yii::$app->session->setFlash('success', Yii::t('user', 'Utente creato.'));

                return $this->redirect(['index']);
            }else{
                echo "1";
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
        $model = $this->findModel(UserModel::class, $id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if (!empty($model->newPassword)) {
                $model->setPassword($model->newPassword);
            }
            $model->save(false);

            Yii::$app->session->setFlash('success', Yii::t('user', 'Utente salvato.'));

            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
}
