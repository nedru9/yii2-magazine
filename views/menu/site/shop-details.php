<?php

/**
 * @var Product $product
 */

use app\models\Product;

$this->title = $product->title;
$this->params['breadcrumbs'][] = ['url' => '/dms/index', 'label' => 'Страхование ДМС']; //товары
$this->params['breadcrumbs'][] = ['url' => '/dms/clinic-dictionary', 'label' => 'Справочник клиник']; //категория
$this->params['breadcrumbs'][] = $this->title; //товар
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
                            <span class="stock in-stock"><i class="far fa-check-square me-2 ms-1"></i>In Stock</span>
                        </p>
                    </div>
                    <div class="actions">
                        <div class="quantity">
                            <input type="number" class="qty-input" step="1" min="1" max="100" name="quantity" value="1"
                                   title="Qty">
                            <button class="quantity-plus qty-btn"><i class="far fa-chevron-up"></i></button>
                            <button class="quantity-minus qty-btn"><i class="far fa-chevron-down"></i></button>
                        </div>
                        <button class="th-btn">В корзину</button>
                        <a href="wishlist.php" class="icon-btn"><i class="far fa-heart"></i></a>
                    </div>
                    <div class="product_meta">
                        <?php
                        if (!empty($product->category)): ?>
                            <span class="posted_in">Категория: <a href="shop.php"><?= $product->category->title; ?></a></span>
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
                <a class="nav-link th-btn" id="description-tab" data-bs-toggle="tab" href="#description" role="tab"
                   aria-controls="description" aria-selected="false">Product Description</a>
            </li>
        </ul>
        <div class="tab-content" id="productTabContent">
            <div class="tab-pane fade" id="description" role="tabpanel" aria-labelledby="description-tab">
                <p>Prepare to embark on a sensory journey with the Bosco Apple, a fruit that transcends the ordinary and
                    promises an unparalleled taste experience. These apples are nothing short of nature’s masterpiece,
                    celebrated for their distinctive blend of flavors and their captivating visual allure. Bosco Apples
                    are a revelation for your taste buds. Their impeccable balance of sweetness and tartness creates a
                    complex, layered taste profile that keeps you coming back for more. Each bite is a symphony of sweet
                    and tangy notes, making these apples a gastronomic delight whether enjoyed fresh or as a key
                    ingredient in your favorite culinary creations.</p>
                <p>The Bosco Apple is not just a fruit; it’s a work of art. Its striking, deep red skin is adorned with
                    intricate speckles, making it a showstopper in the world of fruit aesthetics. Display these apples
                    with pride in your kitchen, and you’ll undoubtedly draw admiration from all who see them. We take
                    our commitment to the environment seriously. Bosco Apples are cultivated on eco-friendly orchards
                    that prioritize sustainable farming practices. You can savor these apples knowing they are grown
                    with respect for the planet, aligning with your values of environmental responsibility. Whether
                    you’re a culinary aficionado or a casual home chef, Bosco Apples offer limitless possibilities in
                    the kitchen. Slice them into a vibrant salad, transform them into mouthwatering pies, or blend them
                    into wholesome applesauce. The culinary canvas is yours to paint with these versatile apples.</p>
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

                    <div class="swiper-slide">
                        <div class="th-product product-grid">
                            <div class="product-img">
                                <img src="assets/img/product/product_1_1.jpg" alt="Product Image">
                                <span class="product-tag">Hot</span>
                                <div class="actions">
                                    <a href="#QuickView" class="icon-btn popup-content"><i class="far fa-eye"></i></a>
                                    <a href="cart.php" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                                    <a href="wishlist.php" class="icon-btn"><i class="far fa-heart"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <a href="shop-details.html" class="product-category">Fresh Fruits</a>
                                <h3 class="product-title"><a href="shop-details.html">Bosco Apple Fruit</a></h3>
                                <span class="price">$177.85</span>
                            </div>
                        </div>
                    </div>
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
