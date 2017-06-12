<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
                <?= $news ?>
        <?= $doc ?>

        <?php foreach ($pictures as $item){
            echo '<img src='. $item['img'].">".'<br>';
            echo 'Title:'.$item['title'].'<br>';
            echo 'Price:'.$item['price'].'<br>';
            echo 'Delivery:'.$item['delivery'].'<br>';?>

<!--        --><?php //$form = ActiveForm::begin(); ?>
<!---->
<!--        --><?//= Html::hiddenInput('title', $item['title']); ?>
<!---->
<!--        --><?//= Html::hiddenInput('price', $item['price']); ?>
<!---->
<!--    <div class="form-group">-->
<!--        --><?//= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
<!--    </div>-->
<!---->
<!--    --><?php //ActiveForm::end(); ?>



            <?php echo '<hr>';
        }?>
<!--        --><?//= $news; ?>
<!--        --><?php //foreach ($pictures as $item){
//            echo '<img src='. $item['img'].">".'<br>';
//            echo 'Price:'.$item['price'].'<br>';
//            echo '<hr>';
//        }?>
<!---->
<!---->
<!--        --><?//= var_dump($pictures); ?>
        This is the About page. You may modify the following file to customize its content:
    </p>

<!--    <code>--><?//= __FILE__ ?><!--</code>-->
</div>
