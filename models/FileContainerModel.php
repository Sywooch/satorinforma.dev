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
class FileContainerModel extends ActiveRecord
{


    public static function tableName()
    {
        return 'file_container';
    }



    public static function listData(){
        $arr=array();


        $arr =$model = Post::find()->asArray()->all();

        return $arr;
    }


    public function getTipoFile()
    {
        return $this->hasOne(FileTypeModel::className(), ['idfile_type' => 'file_type']);
    }


}

?>