<?php
/**
 * Created by PhpStorm.
 * User: Samuele
 * Date: 27/12/2016
 * Time: 09:05
 */

namespace app\models;

use yii2mod\enum\helpers\BaseEnum;


class MesiModel extends BaseEnum
{

    const VUOTO = '0';
    const GENNAIO = '1';
    const FEBBRAIO = '2';
    const MARZO = '3';
    const APRILE = '4';
    const MAGGIO = '5';
    const GIUGNO = '6';
    const LUGLIO = '7';
    const AGOSTO = '8';
    const SETTEMBRE = '9';
    const OTTOBRE = '10';
    const NOVEMBRE = '11';
    const DICEMBRE = '12';


    public static $list = [
        self::VUOTO => '',
        self::GENNAIO => 'Gennaio',
        self::FEBBRAIO => 'Febbraio',
        self::MARZO => 'Marzo',
        self::APRILE => 'Aprile',
        self::MAGGIO => 'Maggio',
        self::GIUGNO => 'Giugno',
        self::LUGLIO => 'Luglio',
        self::AGOSTO => 'Agosto',
        self::SETTEMBRE => 'Settembre',
        self::OTTOBRE => 'Ottobre',
        self::NOVEMBRE => 'Novembre',
        self::DICEMBRE => 'Dicembre',
    ];



}
