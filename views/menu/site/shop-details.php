<?php

/**
 * @var Product $product
 * @var Product[] $products
 */

use app\models\Product;

$this->title = $product->title;
$this->params['breadcrumbs'][] = ['url' => '/site/shop', 'label' => 'Товары'];
$this->params['breadcrumbs'][] = [
    'url' => '/site/shop?categoryId=' . $product->categoryId,
    'label' => $product->category->title
];
$this->params['breadcrumbs'][] = $this->title;
?>

<!--==============================
    Product Details
    ==============================-->
<section class="product-details space-top space-extra-bottom">
    <div class="container">
        <div class="row gx-60">
            <div class="col-lg-6">
                <div class="product-big-img">
                    <div class="img"><img src="<?= $product->image; ?>" alt="<?= $this->title; ?>"></div>
                </div>
            </div>
            <div class="col-lg-6 align-self-center">
                <div class="product-about">
                    <p class="price"><?= $product->price; ?>₽
                    </p>
                    <h2 class="product-title"><?= $this->title; ?></h2>
                    <p class="text"><?= $product->description; ?></p>
                    <div class="mt-2 link-inherit">
                        <p>
                            <strong class="text-title me-3">Наличие:</strong>
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
                        </p>
                    </div>
                    <div class="actions">
                        <?php
                        if ($product->count > 0): ?>
                            <div class="quantity">
                                <input type="number" class="qty-input" step="1" min="1" max="100" name="quantity"
                                       value="1"
                                       title="Qty">
                                <button class="quantity-plus qty-btn"><i class="far fa-chevron-up"></i></button>
                                <button class="quantity-minus qty-btn"><i class="far fa-chevron-down"></i></button>
                            </div>
                            <button class="th-btn">В корзину</button>
                        <?php
                        endif; ?>
                        <?php
                        if (!Yii::$app->user->isGuest): ?>
                            <a href="javascript:void(0)" class="icon-btn star--product--js"
                               data-product="<?= $product->id; ?>">
                                <?php
                                if (!empty($product->favorite)): ?>
                                    <i class="fas fa-heart"></i>
                                <?php
                                else: ?>
                                    <i class="far fa-heart"></i>
                                <?php
                                endif; ?>
                            </a>
                        <?php
                        endif; ?>
                    </div>
                    <div class="product_meta">
                        <?php
                        if (!empty($product->category)): ?>
                            <span class="posted_in">Категория: <a
                                        href="/site/shop?categoryId=<?= $product->categoryId; ?>"><?= $product->category->title; ?></a></span>
                        <?php
                        else: ?>
                            <span class="posted_in">Категория: <a href="shop.php">Без категории</a></span>
                        <?php
                        endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <ul class="nav product-tab-style1" id="productTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link th-btn active" id="description-tab" data-bs-toggle="tab" href="#description"
                   role="tab" aria-controls="description" aria-selected="false">Описание</a>
            </li>
        </ul>
        <div class="tab-content" id="productTabContent">
            <div class="tab-pane  show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                <p><?= $product->description; ?></p>
            </div>
        </div>

        <!--==============================
    Related Product
    ==============================-->
        <div class="space-extra-top mb-30">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-auto">
                    <h2 class="sec-title text-center">Похожие товары</h2>
                </div>
                <div class="col-md d-none d-sm-block">
                    <hr class="title-line">
                </div>
                <div class="col-md-auto d-none d-md-block">
                    <div class="sec-btn">
                        <div class="icon-box">
                            <button data-slider-prev="#productSlider1" class="slider-arrow default"><i
                                        class="far fa-arrow-left"></i></button>
                            <button data-slider-next="#productSlider1" class="slider-arrow default"><i
                                        class="far fa-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper th-slider has-shadow" id="productSlider1"
                 data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"4"}}}'>
                <div class="swiper-wrapper">
                    <?php
                    if (count($products) > 1): ?>
                        <?php
                        foreach ($products as $otherProduct): ?>
                            <?php
                            if ($otherProduct->id !== $product->id): ?>
                                <div class="swiper-slide">
                                    <div class="th-product product-grid">
                                        <div class="product-img">
                                            <img src="<?= $otherProduct->image; ?>" alt="<?= $otherProduct->title; ?>">
                                            <div class="actions">
                                                <a href="cart.php" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                                                <?php
                                                if (!Yii::$app->user->isGuest): ?>
                                                    <a href="javascript:void(0)" class="icon-btn star--product--js"
                                                       data-product="<?= $product->id; ?>">
                                                        <?php
                                                        if (!empty($product->favorite)): ?>
                                                            <i class="fas fa-heart"></i>
                                                        <?php
                                                        else: ?>
                                                            <i class="far fa-heart"></i>
                                                        <?php
                                                        endif; ?>
                                                    </a>
                                                <?php
                                                endif; ?>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <a href="/site/shop?categoryId=<?= $otherProduct->categoryId; ?>"
                                               class="product-category"><?= $otherProduct->category->title; ?></a>
                                            <h3 class="product-title"><a
                                                        href="/site/shop-detail?id=<?= $otherProduct->id; ?>"><?= $otherProduct->title; ?></a>
                                            </h3>
                                            <span class="price"><?= $otherProduct->price; ?>₽</span>
                                        </div>
                                    </div>
                                </div>

                            <?php
                            endif; ?>
                        <?php
                        endforeach; ?>
                    <?php
                    else: ?>
                        Похожие товары отсутствуют
                    <?php
                    endif; ?>
                </div>
            </div>
            <div class="d-block d-md-none mt-40 text-center">
                <div class="icon-box">
                    <button data-slider-prev="#productSlider1" class="slider-arrow default"><i
                                class="far fa-arrow-left"></i></button>
                    <button data-slider-next="#productSlider1" class="slider-arrow default"><i
                                class="far fa-arrow-right"></i></button>
                </div>
            </div>
        </div>
    </div>
</section>
