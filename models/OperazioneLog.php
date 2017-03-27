<?php
/**
 * Created by PhpStorm.
 * User: Samuele
 * Date: 27/12/2016
 * Time: 09:05
 */

namespace app\models;

use yii2mod\enum\helpers\BaseEnum;


class OperazioneLog extends BaseEnum
{

    const INSERT = '1';
    const MODIFY = '2';
    const DELETE = '3';

    public static $list = [
        self::INSERT => 'Inserimento',
        self::MODIFY => 'Modifica',
        self::DELETE => 'Eliminazione',
    ];



}
