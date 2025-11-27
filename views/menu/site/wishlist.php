<?php

$this->title = 'Избранные товары';
$this->params['breadcrumbs'][] = $this->title;
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
                        <th class="product-cb">
                            <input type="checkbox" class="global-cb" title="Select all for bulk action">
                        </th>
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
                    <tr class="wishlist_item">
                        <td class="product-cb">
                            <input type="checkbox" name="wishlist_pr[]" value="58" title="Select for bulk action">
                        </td>
                        <td class="product-remove">
                            <button type="submit" name="tinvwl-remove" value="58" title="Remove"><i
                                        class="fal fa-times"></i>
                            </button>
                        </td>
                        <td class="product-thumbnail">
                            <a href="shop-details.php"><img src="assets/img/product/product_thumb_1_1.jpg"
                                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                            alt="image"></a>
                        </td>
                        <td class="product-name">
                            <a href="shop-details.php">Bosco Apple Fruit</a>
                        </td>
                        <td class="product-price">
                            <span class="woocommerce-Price-amount amount"><bdi><span
                                            class="woocommerce-Price-currencySymbol">$</span>45.00</bdi></span>
                        </td>
                        <td class="product-stock">
                            <p class="stock in-stock">
                                <span><i class="fas fa-check"></i></span><span class="tinvwl-txt">In stock</span>
                            </p>
                        </td>
                        <td class="product-action">
                            <button class="button th-btn" name="tinvwl-add-to-cart" value="58" title="Add to Cart">
                                <i class="fal fa-shopping-cart"></i><span class="tinvwl-txt">В корзину</span>
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
