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
class ParentelaModel extends ActiveRecord
{


    public static function tableName()
    {
        return 'parentela';
    }




    public static function listData(){
        $arr=array();


        $arr =$model = ParentelaModel::find()->asArray()->all();

        return $arr;
    }

}

?>