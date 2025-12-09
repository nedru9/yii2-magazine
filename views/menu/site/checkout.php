<?php

/* @var array $cart */

use app\components\Cart;

$this->title = 'Оформление заказа';
$this->params['breadcrumbs'][] = $this->title;
?>
<!--==============================
Checkout Arae
==============================-->
<div class="th-checkout-wrapper space-top space-extra-bottom">
    <div class="container">

        // тут будет форма оформления заказа
        <form action="#" class="woocommerce-checkout mt-40">
            <div class="row ">
                <div class="col-lg-6">
                    <h2 class="h4">Billing Details</h2>
                    <div class="row">
                        <div class="col-12 form-group">
                            <select class="form-select">
                                <option>United Kingdom (UK)</option>
                                <option>United State (US)</option>
                                <option>Equatorial Guinea (GQ)</option>
                                <option>Australia (AU)</option>
                                <option>Germany (DE)</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="text" class="form-control" placeholder="First Name">
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="text" class="form-control" placeholder="Last Name">
                        </div>
                        <div class="col-12 form-group">
                            <input type="text" class="form-control" placeholder="Your Company Name">
                        </div>
                        <div class="col-12 form-group">
                            <input type="text" class="form-control" placeholder="Street Address">
                            <input type="text" class="form-control"
                                   placeholder="Apartment, suite, unit etc. (optional)">
                        </div>
                        <div class="col-12 form-group">
                            <input type="text" class="form-control" placeholder="Town / City">
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="text" class="form-control" placeholder="Country">
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="text" class="form-control" placeholder="Postcode / Zip">
                        </div>
                        <div class="col-12 form-group">
                            <input type="text" class="form-control" placeholder="Email Address">
                            <input type="text" class="form-control" placeholder="Phone number">
                        </div>
                        <div class="col-12 form-group">
                            <input type="checkbox" id="accountNewCreate">
                            <label for="accountNewCreate">Create An Account?</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <p id="ship-to-different-address">
                        <input id="ship-to-different-address-checkbox" type="checkbox" name="ship_to_different_address"
                               value="1" checked>
                        <label for="ship-to-different-address-checkbox">
                            Ship to a different address?
                            <span class="checkmark"></span>
                        </label>
                    </p>
                    <div class="shipping_address">
                        <div class="row">
                            <div class="col-12 form-group">
                                <select class="form-select">
                                    <option>United Kingdom (UK)</option>
                                    <option>United State (US)</option>
                                    <option>Equatorial Guinea (GQ)</option>
                                    <option>Australia (AU)</option>
                                    <option>Germany (DE)</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" placeholder="First Name">
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" placeholder="Last Name">
                            </div>
                            <div class="col-12 form-group">
                                <input type="text" class="form-control" placeholder="Your Company Name">
                            </div>
                            <div class="col-12 form-group">
                                <input type="text" class="form-control" placeholder="Street Address">
                                <input type="text" class="form-control"
                                       placeholder="Apartment, suite, unit etc. (optional)">
                            </div>
                            <div class="col-12 form-group">
                                <input type="text" class="form-control" placeholder="Town / City">
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" placeholder="Country">
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" placeholder="Postcode / Zip">
                            </div>
                            <div class="col-12 form-group">
                                <input type="text" class="form-control" placeholder="Email Address">
                                <input type="text" class="form-control" placeholder="Phone number">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 form-group">
                        <textarea cols="20" rows="5" class="form-control"
                                  placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                    </div>
                </div>
            </div>
        </form>
        <h4 class="mt-4 pt-lg-2">Содержимое заказа</h4>
        <form action="#" class="woocommerce-cart-form">
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
                <?php foreach ($cart[Cart::SESSION_KEY_PRODUCTS] as $item): ?>
                <tr class="cart_item">
                    <td data-title="Product">
                        <a class="cart-productimage" href="/site/shop-detail?id=<?= $item['id']; ?>"><img width="91" height="91"
                                                                                  src="<?= $item['image']; ?>"
                                                                                  alt="<?= $item['name']; ?>"></a>
                    </td>
                    <td data-title="Name">
                        <a class="cart-productname" href="/site/shop-detail?id=<?= $item['id']; ?>"><?= $item['name']; ?></a>
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

                <?php endforeach; ?>
                </tbody>
                <tfoot class="checkout-ordertable">
                <tr class="cart-subtotal">
                    <th>Итого</th>
                    <td data-title="Subtotal" colspan="4"><span class="woocommerce-Price-amount amount"><bdi><?= $cart['total']; ?></bdi><span
                                    class="woocommerce-Price-currencySymbol">₽</span></span></td>
                </tr>
                </tfoot>
            </table>
        </form>
        <div class="mt-lg-3 mb-30">
            <div class="woocommerce-checkout-payment">
                <ul class="wc_payment_methods payment_methods methods">
                    <li class="wc_payment_method payment_method_bacs">
                        <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method"
                               value="bacs" checked="checked">
                        <label for="payment_method_bacs">Direct bank transfer</label>
                        <div class="payment_box payment_method_bacs">
                            <p>Make your payment directly into our bank account. Please use app\components\Cart;use your Order ID as the payment
                                reference. Your order will not be shipped until the funds have cleared in our account.
                            </p>
                        </div>
                    </li>
                    <li class="wc_payment_method payment_method_cheque">
                        <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method"
                               value="cheque">
                        <label for="payment_method_cheque">Cheque Payment</label>
                        <div class="payment_box payment_method_cheque">
                            <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store
                                Postcode.</p>
                        </div>
                    </li>
                    <li class="wc_payment_method payment_method_cod">
                        <input id="payment_method_cod" type="radio" class="input-radio" name="payment_method">
                        <label for="payment_method_cod">Credit Cart</label>
                        <div class="payment_box payment_method_cod">
                            <p>Pay with cash upon delivery.</p>
                        </div>
                    </li>
                    <li class="wc_payment_method payment_method_paypal">
                        <input id="payment_method_paypal" type="radio" class="input-radio" name="payment_method"
                               value="paypal">
                        <label for="payment_method_paypal">Paypal</label>
                        <div class="payment_box payment_method_paypal">
                            <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                        </div>
                    </li>
                </ul>
                <div class="form-row place-order">
                    <button type="submit" class="th-btn">Place order</button>
                </div>
            </div>
        </div>
    </div>
</div>
