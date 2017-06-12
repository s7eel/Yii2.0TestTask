<?php
/**
 * Created by PhpStorm.
 * User: Админ
 * Date: 12.06.2017
 * Time: 5:54
 */
namespace app\components;

use yii\httpclient\Client;

class Valute
{
    public function exchange($value)
    {
        $res = floatval(str_replace(',', '.', $value));
        return $res;
    }
    public function gettingUAH($val1, $val2, $val3)
    {
        $res = (self::exchange($val1)/self::exchange($val2))*self::exchange($val3);
        return $res;
    }
    public function gettingEUR($val1, $val2)
    {
        $res = self::exchange($val1)/self::exchange($val2);
        return $res;
    }

    public function gettingValutes()
    {
        $val = array();
        $client = new Client(['baseUrl' => 'https://www.cbr.ru/scripts/XML_daily.asp']);
        $response = $client->createRequest()
            ->addHeaders(['content-type' => 'application/xml'])
            ->send();

        $responseData = $response->getData(); // get all valutes
        $val['UAH'] = $responseData['Valute'][27];
        $val['USD'] = $responseData['Valute'][10];
        $val['EUR'] = $responseData['Valute'][11];

        return $val;
    }
    public static function getPriceAmazon($price)
    {
        $x = floatval(str_replace('$', '', $price));
        return $x;
    }
    public static function getPriceEbay($price)
    {
        $x = floatval(str_replace('US $', '', $price));
        return $x;
    }
    public static function getPriceInUAH($val)
    {
        $valAll = self::gettingValutes();
        $usd_to_uah = self::gettingUAH($valAll['UAH']->Nominal, $valAll['UAH']->Value, $valAll['USD']->Value);
        $res = $usd_to_uah * $val;
        return $res;
    }
    public static function getFullPrice($x, $disc)
    {
        return $x = $x + $x*($disc/100);
    }

}