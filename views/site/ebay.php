<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\Valute;


$this->title = 'Ebay';
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
        <?php foreach ($pictures as $item){

        if($item['img']== ''){
            $item['img'] = 'http://www.hegroup.org.uk/images/epertise_dingbats/Download-logo.png';
        }
        echo '<img style="width:150px; height: 150px;" src='. $item['img'].">".'<br>';
            echo 'Title:'.$item['title'].'<br>';
            $x = Valute::getPriceEbay($item['price']);
            $full_price = Valute::getFullPrice($x, $disc);
            echo 'Price:'.$full_price.'$'.'<br>';
            echo 'Delivery:' . $item['delivery'].'<br>';
            ?>

        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'title')->hiddenInput(['value'=> $item['title']])->label(false); ?>
        <?= $form->field($model, 'price')->hiddenInput(['value'=> $x])->label(false); ?>
        <?= $form->field($model, 'img')->hiddenInput(['value'=> $item['img']])->label(false); ?>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end();
            echo '<hr>';
        }?>

</div>
