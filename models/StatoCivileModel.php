<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;
use app\models\Setup;

/**
 * Class ClientModel
 *
 * @package  app\models;
 */
class StatoCivileModel extends ActiveRecord
{


    public static function tableName()
    {
        return 'statocivile';
    }



    public static function listData(){
        $arr=array();


        $arr =$model = Post::find()->asArray()->all();

        return $arr;
    }

}

?>