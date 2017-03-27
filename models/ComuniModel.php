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
class ComuniModel extends ActiveRecord
{


    public static function tableName()
    {
        return 'comuni';
    }



    public static function listData(){
        $arr=array();


        $arr =$model = Post::find()->asArray()->all();

        return $arr;
    }

    public function getContacts()
    {
        return $this->hasMany(ContactModel::className(), ['id' => 'comuni_id']);
    }

    public function getProvincia()
    {
        return $this->hasOne(ProvinceModel::className(), ['id' => 'id_provincia']);
    }


}

?>