<?php
/**
 * Created by PhpStorm.
 * User: samuelerenati
 * Date: 06/03/17
 * Time: 09:35
 */

namespace app\models;

use app\models\TipoAziendaModel;
use app\models\PercentualeModel;
use app\models\ContactModel;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class ReportContattoModel extends ActiveRecord
{
    public static function tableName()
    {
        return 'reportcontatto';
    }


    public function rules()
    {
        return ArrayHelper::merge([
            ['idcontatto', 'integer'],
            ['iduser', 'integer'],
            ['idfile_container', 'integer'],

        ], parent::rules());

    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return ArrayHelper::merge([

            'idfile_container' => 'Report',
            'iduser' => 'Utente',
        ], parent::attributeLabels());
    }


    public static function listData(){
        $arr=array();
        $arr =$model = Post::find()->asArray()->all();
        return $arr;
    }

    public function getFormattedDataCreazione()
    {
        return \DateTime::createFromFormat('Y-m-d H:i:s', $this->data_inserimento)->format('d/m/Y H:i:s');
    }

    public function getReport()
    {
        return $this->hasOne(FileContainerModel::className(), ['idfile_container' => 'idfile_container']);
    }

    public function getContatto()
    {
        return $this->hasOne(ContactModel::className(), ['id' => 'idcontatto']);
    }

    public function getUser()
    {
        return $this->hasOne(UserModel::className(), ['id' => 'iduser']);
    }

}