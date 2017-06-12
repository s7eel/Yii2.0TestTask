<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Currency';
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        This is the Currency exchange page.
    </p>
        <?php
echo '1 USD' . ' => ' . $val['rur'] . ' RUR'. '<br>'.'<hr>';
echo '1 USD' . ' => ' . $val['uah'] . ' UAH'. '<br>'.'<hr>';
echo '1 USD' . ' => ' . $val['eur'] . ' EUR'. '<br>'.'<hr>';
        ?>
</div>