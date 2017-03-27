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
class LogContattoModel extends ActiveRecord
{


    public static function tableName()
    {
        return 'log_contatto';
    }

    public function attributeLabels()
    {
        return ArrayHelper::merge([
            'operazione' =>'Operazione',
            'iduser' =>'Utente',
            'idlogtype' => 'Area modifica',
         ], parent::attributeLabels());
    }



    public static function listData(){
        $arr=array();


        $arr =$model = Post::find()->asArray()->all();

        return $arr;
    }


    public function getLogtype()
    {
        return $this->hasOne(LogTypeModel::className(), ['idlogtype' => 'idlogtype']);
    }

    public function getContatto()
    {
        return $this->hasOne(ContactModel::className(), ['id' => 'idcontatto']);
    }

    public function getUser()
    {
        return $this->hasOne(UserModel::className(), [ 'id' => 'iduser']);
    }

    public function getFormattedData()
    {
        return \DateTime::createFromFormat('Y-m-d H:i:s', $this->data_creazione)->format('d/m/Y H:i:s');
    }
}

?>