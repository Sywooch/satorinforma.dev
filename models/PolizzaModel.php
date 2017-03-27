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
class PolizzaModel extends ActiveRecord
{


    public static function tableName()
    {
        return 'polizza';
    }



    public static function listData(){
        $arr=array();


        $arr =$model = PolizzaModel::find()->asArray()->all();

        return $arr;
    }

    public function getDescrizioni()
    {
        return $this->hasMany(PolizzaDescrizioniModel::className(), ['idpolizza' => 'idpolizza']);
    }


}

?>