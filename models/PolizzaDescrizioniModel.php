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
class PolizzaDescrizioniModel extends ActiveRecord
{


    public static function tableName()
    {
        return 'polizza_descrizioni';
    }



    public static function listData(){
        $arr=array();


        $arr =$model = Post::find()->asArray()->all();

        return $arr;
    }


}

?>