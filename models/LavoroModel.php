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
class LavoroModel extends ActiveRecord
{


    public static function tableName()
    {
        return 'tipolavoro';
    }



    public static function listData(){
        $arr=array();


        $arr =$model = Post::find()->asArray()->all();

        return $arr;
    }

}

?>