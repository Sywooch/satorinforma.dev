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
class PolizzaContattoDocumentiModel extends ActiveRecord
{



    public static function tableName()
    {
        return 'polizza_contatto_documenti';
    }


    public function getPolizzacontatto()
    {
        return $this->hasOne(PolizzaContattoModel::className(), ['idpolizza_contatto' => 'idpolizza_contatto']);
    }

    public function getDocumento(){

        return $this->hasOne(FileContainerModel::className(), ['idfile_container' => 'idfile_container']);
    }


}

?>