<?php

/* @var array $cart */

use app\components\Cart;

if (empty($cart[Cart::SESSION_KEY_PRODUCTS])): ?>
    В корзине ничего нет

<?php
else: ?>
    <form action="#" class="woocommerce-cart-form">
        <table class="cart_table">
            <thead>
            <tr>
                <th class="cart-col-image">Изображение</th>
                <th class="cart-col-productname">Наименование</th>
                <th class="cart-col-price">Цена</th>
                <th class="cart-col-quantity">Количество</th>
                <th class="cart-col-total">Итого</th>
                <th class="cart-col-remove">Действие</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($cart[Cart::SESSION_KEY_PRODUCTS] as $item): ?>
                <tr class="cart_item">
                    <td data-title="Product">
                        <a class="cart-productimage" href="/site/shop-detail?id=<?= $item['id']; ?>">
                            <img width="91" height="91"
                                    src="<?= !empty($item['image']) ? $item['image'] : Yii::getAlias(
                                            '@web'
                                        ) . '/img/no-photo.png'; ?>"
                                    alt="<?= $item['name']; ?>">
                        </a>
                    </td>
                    <td data-title="Name">
                        <a class="cart-productname"
                           href="/site/shop-detail?id=<?= $item['id']; ?>"><?= $item['name']; ?></a>
                    </td>
                    <td data-title="Price">
                        <span class="price"><bdi><?= $item['price']; ?><span>₽</span></bdi></span>
                    </td>
                    <td data-title="Quantity">
                        <div class="quantity">
                            <button class="quantity-minus qty-btn"><i class="far fa-minus"></i></button>
                            <input type="number" data-product="<?= $item['id']; ?>" class="qty-input update-count--js"
                                   value="<?= $item['count']; ?>" min="1" max="<?= $item['max']; ?>">
                            <button class="quantity-plus qty-btn"><i class="far fa-plus"></i></button>
                        </div>
                    </td>
                    <td data-title="Total">
                        <span class="amount"><bdi><?= $item['total']; ?></bdi><span>₽</span></span>
                    </td>
                    <td data-title="Remove">
                        <a href="javascript:void(0)" class="remove remove-cart--js"
                           data-product="<?= $item['id']; ?>"><i class="fal fa-trash-alt"></i></a>
                    </td>
                </tr>
            <?php
            endforeach; ?>
            <tr>
                <td colspan="6" class="actions">
                    <a href="/site/shop" class="th-btn">Продолжить покупки</a>
                </td>
            </tr>
            </tbody>
        </table>
    </form>
    <div class="row justify-content-end">
        <div class="col-md-8 col-lg-7 col-xl-6">
            <h2 class="h4 summary-title">Итого</h2>
            <table class="cart_totals">
                <tbody>
                <tr>
                    <td>Промежуточный итог корзины</td>
                    <td data-title="Промежуточный итог корзины">
                        <span class="amount"><bdi><?= $cart['total']; ?></bdi><span>₽</span></span>
                    </td>
                </tr>
                </tbody>
                <tfoot>
            </table>
            <div class="wc-proceed-to-checkout mb-30">
                <a href="/site/checkout" class="th-btn">Перейти к оформлению заказа</a>
            </div>
        </div>
    </div>

<?php
endif; ?>
