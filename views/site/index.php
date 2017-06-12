<?php

/* @var $this yii\web\View */

use app\components\Valute;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Главная</h1>

        <p class="lead">Вывод всех сохраненных Вами продуктов</p>
        <?php if($goods){
            foreach ($goods as $key=>$value){
                echo $value['title'].'<br>';
                if($value['img']== ''){
                    $value['img'] = 'http://www.hegroup.org.uk/images/epertise_dingbats/Download-logo.png';
                }
                echo '<img style="width:150px; height: 150px;" src='. $value['img'].">".'<br>';
                echo $value['price'].' '.'USD'. '<br>';
                echo Valute::getPriceInUAH($value['price']).'UAH'.'<br>';
                echo '<hr>';
            }
        }else{
            echo '<h4>'.'Вы еще не ввели ни одного товара'.'<h4>';
        }?>

    </div>


</div>
