<?php
/**
 * Created by PhpStorm.
 * User: Samuele
 * Date: 27/12/2016
 * Time: 09:05
 */

namespace app\modules\admin\models\search;

use yii2mod\enum\helpers\BaseEnum;


class ClientStatus extends BaseEnum
{

    const MASTER = 'Y';
    const NORMAL = 'N';

    public static $list = [
        self::MASTER => 'Master',
        self::NORMAL => 'Agenzia',
    ];

}
