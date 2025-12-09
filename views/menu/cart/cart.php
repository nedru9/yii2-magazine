<?php

$this->title = 'Корзина';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="th-cart-wrapper  space-top space-extra-bottom">
    <div class="container cart-container">
        <?= $this->render('/menu/cart/_main', ['cart' => Yii::$app->cart->getCart()]) ?>
    </div>
</div>
