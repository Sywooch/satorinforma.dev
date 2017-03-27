<?php

namespace app\models;

use app\models\ContactModel;
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
class PolizzaContattoModel extends ActiveRecord
{


    public static function tableName()
    {
        return 'polizza_contatto';
    }



    public static function listData(){
        $arr=array();


        $arr =$model = PolizzaContattoModel::find()->asArray()->all();

        return $arr;
    }

    public function getContatto()
    {
        return $this->hasOne(ContactModel::className(), ['id' => 'idcontatto']);
    }

    public function getPolizza()
    {
        return $this->hasOne(PolizzaModel::className(), ['idpolizza' => 'idpolizza']);
    }

    public function getDocumenti()
    {
        return $this->hasMany(PolizzaContattoDocumentiModel::className(), ['idpolizza_contatto' => 'idpolizza_contatto'])->all();
    }

}

?>