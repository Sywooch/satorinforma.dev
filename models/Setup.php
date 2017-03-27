<?php
/**
 * Created by PhpStorm.
 * User: samuelerenati
 * Date: 03/02/17
 * Time: 11:26
 */

namespace app\models;

class Setup {
    const DATE_FORMAT = 'php:Y-m-d';
    const DATETIME_FORMAT = 'php:Y-m-d H:i:s';
    const TIME_FORMAT = 'php:H:i:s';

    public static function convert($dateStr, $type='date', $format = null) {
        if ($type === 'datetime') {
            $fmt = ($format == null) ? self::DATETIME_FORMAT : $format;
        }
        elseif ($type === 'time') {
            $fmt = ($format == null) ? self::TIME_FORMAT : $format;
        }
        else {
            $fmt = ($format == null) ? self::DATE_FORMAT : $format;
        }
        //return \Yii::$app->formatter->asDate($dateStr, $fmt);
        //echo $dateStr. ' '.$format;
        //$fmt='d/m/Y';
        $date=null;
        try{
            $date = \DateTime::createFromFormat($fmt, $dateStr);
        }catch(\Exception $e){
            if($fmt=='d/m/Y'){
                $date = \DateTime::createFromFormat(self::DATE_FORMAT, $dateStr);
            }

        }
        echo $dateStr;
        print_r(\DateTime::getLastErrors());
        $date->format('Y-m-d');
        print_r(\DateTime::getLastErrors());
        //$date->format('Y-m-d');
        //return "2016-01-01";
        return $date->format('Y-m-d');

    }
}