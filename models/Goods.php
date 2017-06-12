<?php
namespace app\models;

use yii\base\Request;
use yii\db\ActiveRecord;

class Goods extends ActiveRecord
{

    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    /**
     * @return string the name of the table associated with this ActiveRecord class.
     */
    public static function tableName()
    {
        return 'goods';
    }

    public static function getAllGoods()
    {
        $goods = self::find()->all();
        return $goods;
    }

    public static function saveGood($model)
    {
        $good = new Goods();
        $good->title = $model->title ;
        $good->price = $model->price;
        $good->img = $model->img;

        $good->save();
    }

}