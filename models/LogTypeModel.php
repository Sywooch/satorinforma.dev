<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;
use app\models\Setup;
use app\models\ContactModel;

/**
 * Class ClientModel
 *
 * @package  app\models;
 */
class LogTypeModel extends ActiveRecord
{


    public static function tableName()
    {
        return 'logtype';
    }



    public static function listData(){
        $arr=array();


        $arr =$model = Post::find()->where(['visible'=>'1'])->asArray()->all();

        return $arr;
    }


}

?>