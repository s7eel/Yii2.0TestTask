<?php
namespace app\models;

use yii\db\ActiveRecord;

class Discount extends ActiveRecord
{
    public static $disc = 10;
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    /**
     * @return string the name of the table associated with this ActiveRecord class.
     */
    public static function tableName()
    {
        return 'discount';
    }
    public static function getDiscOne()
    {
        $res = self::find()
            ->where(['id' => 1])
            ->one();
        return $res;
    }
}