<?php
/**
 * Created by PhpStorm.
 * User: samuelerenati
 * Date: 21/02/17
 * Time: 11:01
 */


namespace app\modules\operatore\common\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class FamiliariList extends Widget
{
    /**
     * @var \yii\db\ActiveRecord[] Related models
     */
    public $models = [];

    /**
     * @var string Base to build text content of the link.
     * You should specify attribute name. In case of dynamic generation ('getFullName()') you should specify just 'fullName'.
     */
    public $linkContentBase = 'idcontatto';

    /**
     * @var string Route to build url to related model
     */
    public $viewRoute;

    /**
     * @inheritdoc
     */
    public function run()
    {

         if (!$this->models) {
            return null;
        }


        $items = [];
        foreach ($this->models as $model) {
            $tmpStr='';
            if($model->idcontattop==null){
                //non ho un contatto associato come parente
                $items[] =$this->render('_familiare', [
                    'model' => $model
                ]);
            }else{
                //ho un contatto come parente
                $items[] =$this->render('_familiare', [
                    'model' => $model
                ]);
            }

        }

        return Html::ul($items, [
            'class' => 'messages',
            'encode' => false,
        ]);
    }


}