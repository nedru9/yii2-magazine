<?php

use app\components\Cart;

/* @var array $cart */
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
                        <a class="cart-productimage" href="/site/shop-detail?id=<?= $item['id']; ?>"><img
                                    width="91" height="91"
                                    src="<?= $item['image']; ?>"
                                    alt="<?= $item['name']; ?>"></a>
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
                <tr class="shipping">
                    <th>Доставка и погрузочно-разгрузочные работы</th>
                    <td data-title="Доставка и погрузочно-разгрузочные работы">
                        <ul class="woocommerce-shipping-methods list-unstyled">
                            <li>
                                <input type="radio" id="free_shipping" name="shipping_method"
                                       class="shipping_method">
                                <label for="free_shipping">Бесплатная доставка</label>
                            </li>
                            <li>
                                <input type="radio" id="flat_rate" name="shipping_method"
                                       class="shipping_method"
                                       checked="checked">
                                <label for="flat_rate">Фиксированная ставка</label>
                            </li>
                        </ul>
                        <p class="woocommerce-shipping-destination">
                            Варианты доставки будут обновлены во время оформления заказа.
                        </p>
                        <form action="#" method="post">
                            <a href="#" class="shipping-calculator-button">Изменить адрес</a>
                            <div class="shipping-calculator-form">
                                <p class="form-row">
                                    <input type="text" class="form-control" placeholder="Адрес">
                                </p>
                            </div>
                        </form>
                    </td>
                </tr>
                </tbody>
                <tfoot>
                <tr class="order-total">
                    <td>Общее количество заказов</td>
                    <td data-title="Итого">
                        <strong><span class="amount"><bdi>47</bdi><span>₽</span></span></strong>
                    </td>
                </tr>
                </tfoot>
            </table>
            <div class="wc-proceed-to-checkout mb-30">
                <a href="/site/checkout" class="th-btn">Перейти к оформлению заказа</a>
            </div>
        </div>
    </div>

<?php
endif; ?>
