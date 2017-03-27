<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii2mod\user\models\enums\UserStatus;
use yii2mod\user\models\PasswordResetRequestForm as PRR;

/**
 * Class PasswordResetRequestForm
 *
 * @package yii2mod\user\models
 */
class PasswordResetRequestForm extends PRR
{


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'exist',
                'targetClass' => Yii::$app->user->identityClass,
                'message' => Yii::t('yii2mod.user', 'Utente non esite.'),
            ],
            ['email', 'exist',
                'targetClass' => Yii::$app->user->identityClass,
                'filter' => ['status' => UserStatus::ACTIVE],
                'message' => Yii::t('yii2mod.user', 'Il tuo account risulta disabilitato, contatta il supporto per ulteriori dettagli.'),
            ],
        ];
    }


}
