<?php

namespace app\controllers\actions;

use Yii;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii2mod\user\traits\EventTrait;
use yii2mod\user\actions\RequestPasswordResetAction as RequestPassword;

/**
 * Class RequestPasswordResetAction
 *
 * @package yii2mod\user\actions
 */
class RequestPasswordResetAction extends RequestPassword
{

    /**
     * Initializes the object.*
     */
    public function init()
    {
        $this->view = 'requestPasswordResetToken';
        $this->modelClass='app\models\PasswordResetRequestForm';

        parent::init();
    }

    public function run()
    {

        $model = Yii::createObject($this->modelClass);
        $event = $this->getFormEvent($model);

        $this->trigger(self::EVENT_BEFORE_REQUEST, $event);

        $load = $model->load(Yii::$app->request->post());

        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            return ActiveForm::validate($model);
        }

        if ($load && $model->validate()) {
            if ($model->sendEmail()) {
                $this->trigger(self::EVENT_AFTER_REQUEST, $event);
                Yii::$app->getSession()->setFlash('success', $this->successMessage);

                return $this->redirectTo(Yii::$app->getHomeUrl());
            } else {
                Yii::$app->getSession()->setFlash('error', $this->errorMessage);
            }
        }

        return $this->controller->render($this->view, [
            'model' => $model,
        ]);
    }
}
