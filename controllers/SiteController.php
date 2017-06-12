<?php

namespace app\controllers;

use app\components\Amazon;
use app\components\Ebay;
use Codeception\Util\Xml;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
//use GuzzleHttp\Client; // подключаем Guzzle
use yii\httpclient\Client;
use app\models\Goods;
use app\models\EntryForm;
use app\models\Discount;
use app\components\Valute;



class SiteController extends Controller
{
    /**
     * Displays homepage
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index',[
            'goods' => Goods::getAllGoods(),
        ]);
    }
    /**
     * Displays ebay page.
     *
     * @return string
     */
    public function actionEbay()
    {
        $disc = Discount::$disc;
                $model = new EntryForm();
                if ($model->load(Yii::$app->request->post())) {
                    Goods::saveGood($model);
                    return $this->render('index',[
                        'goods' => Goods::getAllGoods(),
                    ]);
                }
        // вывод страницы в представление
        $pictures = Ebay::getItemsFromSite();
        // вывод списка с главной страницы в представление
        return $this->render('ebay', [
            'pictures' => $pictures,
            'model' => $model,
            'disc' => $disc,

        ]);
    }
    /**
     * Displays amazon page.
     * Почему-то в браузере иногда не отображается, как и АлиЭкспресс
     * @return string
     */
    public function actionAmazon()
    {
        $disc = Discount::$disc;

        $model = new EntryForm();
        if ($model->load(Yii::$app->request->post())) {
            Goods::saveGood($model);
            return $this->render('index',[
                'goods' => Goods::getAllGoods(),
            ]);
        }
        $pictures = Amazon::getItemsFromSite();
        // вывод списка с главной страницы в представление
        return $this->render('amazon', [
            'pictures' => $pictures,
            'model' => $model,
            'disc' => $disc,

        ]);
    }
    /**
     * @return string
     * Функция по работе с валютами
     */

    public function actionCurrency()
    {
        $cur = new Valute();
        $data = $cur->gettingValutes();
        $usd['uah'] = $cur->gettingUAH($data['UAH']->Nominal, $data['UAH']->Value, $data['USD']->Value);
        $usd['rur'] = $cur->exchange($data['USD']->Value);
        $usd['eur'] = $cur->gettingEUR($data['USD']->Value, $data['EUR']->Value);

        return $this->render('currency',[
            'val' => $usd,
        ]);
    }
}
