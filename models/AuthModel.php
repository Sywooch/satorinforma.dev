<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\db\ActiveRecord;

/**
 * Class ClientModel
 *
 * @package  app\models;
 */
class AuthModel extends ActiveRecord
{
   public static function tableName()
   {
           return 'auth_assignment';
   }

}

?>