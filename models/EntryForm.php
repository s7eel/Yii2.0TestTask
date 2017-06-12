<?php

namespace app\models;

use yii\base\Model;

class EntryForm extends Model
{

    public $title;
    public $price;
    public $img;


    public function rules()
    {
        return [
            [['title', 'price', 'img'], 'required'],
        ];
    }
}