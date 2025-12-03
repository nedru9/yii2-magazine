<?php

use app\models\Product;

$this->title = 'Избранные товары';
$this->params['breadcrumbs'][] = $this->title;

/**
 * @var Product[] $products
 */

?>
<!--==============================
Checkout Area
==============================-->
<div class="space">
    <div class="container">
        <div class="tinv-wishlist woocommerce tinv-wishlist-clear">
            <div class="tinv-header">
                <h2 class="mb-30">Избранные товары</h2>
            </div>
            <form action="#" method="post" autocomplete="off">
                <table class="tinvwl-table-manage-list">
                    <thead>
                    <tr>
                        <th class="product-remove"></th>
                        <th class="product-thumbnail">&nbsp;</th>
                        <th class="product-name">
                            <span class="tinvwl-full">Наименование товара</span><span class="tinvwl-mobile">Товар</span>
                        </th>
                        <th class="product-price">Цена</th>
                        <th class="product-stock">Наличие</th>
                        <th class="product-action">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($products as $product): ?>
                        <tr class="wishlist_item">
                            <td class="product-remove">
                                <button data-product="<?= $product->id; ?>" class="favorite-remove--js" type="submit" name="tinvwl-remove" value="58" title="Remove"><i
                                            class="fal fa-times"></i>
                                </button>
                            </td>
                            <td class="product-thumbnail">
                                <a href="shop-details.php"><img src="<?= $product->image; ?>"
                                                                class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                                alt="image"></a>
                            </td>
                            <td class="product-name">
                                <a href="shop-details.php"><?= $product->title; ?></a>
                            </td>
                            <td class="product-price">
                            <span class="woocommerce-Price-amount amount"><bdi><?= $product->price; ?><span
                                            class="woocommerce-Price-currencySymbol">₽</span></bdi></span>
                            </td>
                            <td class="product-stock">
                                <?php
                                if ($product->count > 0): ?>
                                    <span class="stock in-stock">
                                    <i class="far fa-check-square me-2 ms-1"></i>В наличии
                                </span>
                                <?php
                                else: ?>
                                    <span class="stock in-stock">
                                    <i class="far fa-square me-2 ms-1"></i>Нет в наличии
                                </span>
                                <?php
                                endif; ?>
                            </td>


                            <td class="product-action">
                                <?php
                                if ($product->count > 0): ?>
                                    <button class="button th-btn" name="tinvwl-add-to-cart" value="58"
                                            title="Add to Cart">
                                        <i class="fal fa-shopping-cart"></i><span class="tinvwl-txt">В корзину</span>
                                    </button>
                                <?php
                                endif; ?>
                            </td>

                        </tr>
                    <?php
                    endforeach; ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
