<?php

namespace app\controllers\actions;
/**
 * Created by PhpStorm.
 * User: Samuele
 * Date: 21/12/2016
 * Time: 16:26
 */
use Yii;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii2mod\user\actions\LoginAction as Login;

/**
 * Class LoginAction
 *
 * @package yii2mod\user\actions
 */
class LoginAction extends Login
{
    /**
     * Initializes the object.*
     */
    public function init()
    {
        $this->view = 'login';

        parent::init();
    }

    /**
     * Logs in a user.
     *
     * @return string
     */
    public function run()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirectTo(Yii::$app->getHomeUrl());
        }

        $model = Yii::createObject($this->modelClass);
        $load = $model->load(Yii::$app->request->post());

        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            return ActiveForm::validate($model);
        }

        if ($load && $model->login()) {
            return $this->redirectTo(Yii::$app->getUser()->getReturnUrl());
        }

        return $this->controller->renderPartial($this->view, [
            'model' => $model,
        ]);
    }

}
