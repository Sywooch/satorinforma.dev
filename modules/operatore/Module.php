<?php

namespace app\modules\operatore;

use yii2mod\rbac\filters\AccessControl;

/**
 * Class Module
 *
 * @package app\modules\admin
 */
class Module extends \yii\base\Module
{
    /**
     * @var string the default route of this module. Defaults to 'default'
     */
    public $defaultRoute = 'contact';

    /**
     * @var string|bool the layout that should be applied for views within this module
     */
    public $layout = '@app/views/layouts/main';

    /**
     * @var string the namespace that controller classes are in
     */
    public $controllerNamespace = 'app\modules\operatore\controllers';

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            AccessControl::class,
        ];
    }
}
