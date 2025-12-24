<?php

/* @var array $cart */

/* @var OrderForm $orderForm */

use app\components\Cart;
use app\enums\PaymentMethod;
use app\models\OrderForm;
use yii\bootstrap\Html;
use yii\widgets\ActiveForm;

$this->title = 'Оформление заказа';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="th-checkout-wrapper space-top space-extra-bottom">
    <div class="container">
        <?php
        if (Yii::$app->session->hasFlash('error')): ?>
            <div class="alert alert-danger">
                <?= Yii::$app->session->getFlash('error') ?>
            </div>
        <?php
        endif; ?>
        <?php
        $form = ActiveForm::begin([
            'options' => [
                'class' => 'woocommerce-checkout mt-40',
            ]
        ]); ?>


        <div class="row">
            <div class="col-12">
                <h4>Оформление заказа</h4>
            </div>
            <div class="row">
                <div class="col-12 form-group">
                    <?= $form->field($orderForm, 'firstName')
                        ->textInput([
                            'class' => 'form-control',
                        ]); ?>
                    <?= $form->field($orderForm, 'lastName')
                        ->textInput([
                            'class' => 'form-control',
                        ]) ?>
                    <?= $form->field($orderForm, 'email')
                        ->textInput([
                            'class' => 'form-control',
                        ]) ?>
                    <?= $form->field($orderForm, 'phone')
                        ->textInput([
                            'class' => 'form-control',
                        ]) ?>
                    <?= $form->field($orderForm, 'address')
                        ->textInput([
                            'class' => 'form-control',
                        ]) ?>
                </div>
            </div>


        </div>


        <h4 class="mt-4 pt-lg-2">Содержимое заказа</h4>
        <table class="cart_table mb-20">
            <thead>
            <tr>
                <th class="cart-col-image">Изображение</th>
                <th class="cart-col-productname">Наименование</th>
                <th class="cart-col-price">Цена</th>
                <th class="cart-col-quantity">Количество</th>
                <th class="cart-col-total">Итого</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($cart[Cart::SESSION_KEY_PRODUCTS] as $item): ?>
                <tr class="cart_item">
                    <td data-title="Product">
                        <a class="cart-productimage" href="/site/shop-detail?id=<?= $item['id']; ?>"><img width="91"
                                                                                                          height="91"
                                                                                                          src="<?= $item['image']; ?>"
                                                                                                          alt="<?= $item['name']; ?>"></a>
                    </td>
                    <td data-title="Name">
                        <a class="cart-productname"
                           href="/site/shop-detail?id=<?= $item['id']; ?>"><?= $item['name']; ?></a>
                    </td>
                    <td data-title="Price">
                        <span class="amount"><bdi><?= $item['price']; ?></bdi><span>₽</span></span>
                    </td>
                    <td data-title="Quantity">
                        <strong class="product-quantity"><?= $item['count']; ?></strong>
                    </td>
                    <td data-title="Total">
                        <span class="amount"><bdi><?= $item['total']; ?></bdi><span>₽</span></span>
                    </td>
                </tr>

            <?php
            endforeach; ?>
            </tbody>
            <tfoot class="checkout-ordertable">
            <tr class="cart-subtotal">
                <th>Итого</th>
                <td data-title="Subtotal" colspan="4"><span class="woocommerce-Price-amount amount"><bdi><?= $cart['total']; ?></bdi><span
                                class="woocommerce-Price-currencySymbol">₽</span></span></td>
            </tr>
            </tfoot>
        </table>
        <div class="mt-lg-3 mb-30">
            <div class="woocommerce-checkout-payment">
                <ul class="wc_payment_methods payment_methods methods">
                    <?= $form->field($orderForm, 'paymentMethod')->radioList(
                        PaymentMethod::list(),
                        [
                            'item' => function ($index, $label, $name, $checked, $value) {
                                $checkedAttr = $checked ? 'checked' : '';

                                return <<<HTML
                                <li class="wc_payment_method payment_method_bacs">
                                    <input type="radio" name="{$name}" value="{$value}" checked class="input-radio">
                                    <label for="{$name}">{$label}</label>
                                </li>
                                HTML;
                            },
                        ]
                    ) ?>

                </ul>
                <div class="form-row place-order">
                    <?= Html::submitButton('Оформить заказ', ['class' => 'th-btn']) ?>
                </div>
            </div>
        </div>
        <?php
        ActiveForm::end(); ?>
    </div>
</div>
