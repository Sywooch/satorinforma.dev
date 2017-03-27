<?php
/**
 * Created by PhpStorm.
 * User: Samuele
 * Date: 27/12/2016
 * Time: 09:05
 */

namespace app\modules\admin\models\search;

use yii2mod\enum\helpers\BaseEnum;


class UserStatus extends BaseEnum
{

    const ACTIVE = 1;
    const DISABLED = 0;

    public static $list = [
        self::ACTIVE => 'Attivo',
        self::DISABLED => 'Disabilitato',
    ];

}
