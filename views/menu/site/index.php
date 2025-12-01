<?php
/**
 * @var Category[] $categories
 * @var News[] $news
 */

use app\models\Category;


?>


<!--==============================
Hero Area
==============================-->
<div class="th-hero-wrapper hero-1" id="hero" data-bg-src="<?= Yii::getAlias('@web') ?>/img/hero/hero_bg_1_2.jpg">
    <div class="swiper th-slider" id="heroSlide1" data-slider-options='{"effect":"fade"}'>
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="hero-inner">
                    <div class="container">
                        <div class="hero-style1">
                            <span class="sub-title" data-ani="slideinup" data-ani-delay="0.2s"><img
                                        src="<?= Yii::getAlias('@web') ?>/img/theme-img/title_icon.svg" alt="shape">Продукты питания 100% качества</span>
                            <h1 class="hero-title">
                                    <span class="title1" data-ani="slideinup" data-ani-delay="0.4s">
                                        <img class="title-img"
                                             src="<?= Yii::getAlias('@web') ?>/img/hero/hero_title_shape.svg"
                                             alt="icon">
                                        Естественный <span class="text-theme">фрукты</span> </span>
                                <span class="title2" data-ani="slideinup" data-ani-delay="0.5s">и овощи</span>
                            </h1>
                            <a href="/site/about" class="th-btn" data-ani="slideinup" data-ani-delay="0.7s">Узнайте
                                больше<i class="fas fa-chevrons-right ms-2"></i></a>
                        </div>
                    </div>
                    <div class="hero-img" data-ani="slideinright" data-ani-delay="0.5s">
                        <img src="<?= Yii::getAlias('@web') ?>/img/hero/hero_1_1.png" alt="Image">
                    </div>
                    <div class="hero-shape1" data-ani="slideinup" data-ani-delay="0.5s">
                        <img src="<?= Yii::getAlias('@web') ?>/img/hero/hero_shape_1_1.png" alt="shape">
                    </div>
                    <div class="hero-shape2" data-ani="slideindown" data-ani-delay="0.6s">
                        <img src="<?= Yii::getAlias('@web') ?>/img/hero/hero_shape_1_2.png" alt="shape">
                    </div>
                    <div class="hero-shape3" data-ani="slideinleft" data-ani-delay="0.7s">
                        <img src="<?= Yii::getAlias('@web') ?>/img/hero/hero_shape_1_3.png" alt="shape">
                    </div>
                </div>

            </div>
            <div class="swiper-slide">
                <div class="hero-inner">
                    <div class="container">
                        <div class="hero-style1">
                            <span class="sub-title" data-ani="slideinup" data-ani-delay="0.2s"><img
                                        src="<?= Yii::getAlias('@web') ?>/img/theme-img/title_icon.svg" alt="shape">100% Органические продукты</span>
                            <h1 class="hero-title">
                                    <span class="title1" data-ani="slideinup" data-ani-delay="0.4s">
                                        <img class="title-img"
                                             src="<?= Yii::getAlias('@web') ?>/img/hero/hero_title_shape.svg"
                                             alt="icon">
                                        Органические <span class="text-theme">фрукты</span> </span>
                                <span class="title2" data-ani="slideinup" data-ani-delay="0.5s">Для здоровья</span>
                            </h1>
                            <a href="/site/about" class="th-btn" data-ani="slideinup" data-ani-delay="0.7s">Узнайте
                                больше<i class="fas fa-chevrons-right ms-2"></i></a>
                        </div>
                    </div>
                    <div class="hero-img" data-ani="slideinright" data-ani-delay="0.5s">
                        <img src="<?= Yii::getAlias('@web') ?>/img/hero/hero_1_2.png" alt="Image">
                    </div>
                    <div class="hero-shape1" data-ani="slideinup" data-ani-delay="0.5s">
                        <img src="<?= Yii::getAlias('@web') ?>/img/hero/hero_shape_1_1.png" alt="shape">
                    </div>
                    <div class="hero-shape2" data-ani="slideindown" data-ani-delay="0.6s">
                        <img src="<?= Yii::getAlias('@web') ?>/img/hero/hero_shape_1_2.png" alt="shape">
                    </div>
                    <div class="hero-shape3" data-ani="slideinleft" data-ani-delay="0.7s">
                        <img src="<?= Yii::getAlias('@web') ?>/img/hero/hero_shape_1_3.png" alt="shape">
                    </div>
                </div>

            </div>
            <div class="swiper-slide">
                <div class="hero-inner">
                    <div class="container">
                        <div class="hero-style1">
                            <span class="sub-title" data-ani="slideinup" data-ani-delay="0.2s"><img
                                        src="<?= Yii::getAlias('@web') ?>/img/theme-img/title_icon.svg" alt="shape">1100% Свежие продукты</span>
                            <h1 class="hero-title">
                                    <span class="title1" data-ani="slideinup" data-ani-delay="0.4s">
                                        <img class="title-img"
                                             src="<?= Yii::getAlias('@web') ?>/img/hero/hero_title_shape.svg"
                                             alt="icon">
                                        Качественные <span class="text-theme">фрукты</span> </span>
                                <span class="title2" data-ani="slideinup"
                                      data-ani-delay="0.5s">Сельское хозяйство</span>
                            </h1>
                            <a href="/site/about" class="th-btn" data-ani="slideinup" data-ani-delay="0.7s">Узнайте
                                больше<i class="fas fa-chevrons-right ms-2"></i></a>
                        </div>
                    </div>
                    <div class="hero-img" data-ani="slideinright" data-ani-delay="0.5s">
                        <img src="<?= Yii::getAlias('@web') ?>/img/hero/hero_1_3.png" alt="Image">
                    </div>
                    <div class="hero-shape1" data-ani="slideinup" data-ani-delay="0.5s">
                        <img src="<?= Yii::getAlias('@web') ?>/img/hero/hero_shape_1_1.png" alt="shape">
                    </div>
                    <div class="hero-shape2" data-ani="slideindown" data-ani-delay="0.6s">
                        <img src="<?= Yii::getAlias('@web') ?>/img/hero/hero_shape_1_2.png" alt="shape">
                    </div>
                    <div class="hero-shape3" data-ani="slideinleft" data-ani-delay="0.7s">
                        <img src="<?= Yii::getAlias('@web') ?>/img/hero/hero_shape_1_3.png" alt="shape">
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="hero-shape4">
        <img class="svg-img" src="<?= Yii::getAlias('@web') ?>/img/hero/hero_shape_1_4.svg" alt="shape">
    </div>
</div>
<!--======== / Hero Section ========-->
<!--==============================
Category Area  
==============================-->

<?php
if (!empty($categories)): ?>

    <section class="space-top">
        <div class="container">
            <div class="title-area text-center">
                <span class="sub-title"><img src="<?= Yii::getAlias('@web') ?>/img/theme-img/title_icon.svg" alt="Icon">Категории продуктов</span>
                <h2 class="sec-title">Что мы предлагаем</h2>
            </div>
            <div class="swiper th-slider"
                 data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"400":{"slidesPerView":"2"},"768":{"slidesPerView":"3"},"992":{"slidesPerView":"4"},"1200":{"slidesPerView":"5"}}}'>
                <div class="swiper-wrapper">
                    <?php
                    foreach ($categories as $category): ?>
                        <div class="swiper-slide">
                            <div class="category-card">
                                <div class="box-shape"
                                     data-bg-src="<?= Yii::getAlias('@web') ?>/img/bg/category_card_bg.png"></div>
                                <div class="box-icon"
                                     data-mask-src="<?= Yii::getAlias('@web') ?>/img/bg/category_card_icon_bg.png">
                                    <img class="h-100" src="<?= Yii::getAlias('@web') . $category->image; ?>"
                                         alt="<?= $category->title; ?>">
                                </div>
                                <h3 class="box-title"><a
                                            href="/site/shop?categoryId=<?= $category->id; ?>"><?= $category->title; ?></a>
                                </h3>
                            </div>
                        </div>
                    <?php
                    endforeach; ?>
                </div>
            </div>
        </div>
    </section>

<?php
endif; ?>
<!--==============================
About Area  
==============================-->
<div class="overflow-hidden space" id="about-sec">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6 mb-30 mb-xl-0">
                <div class="img-box1">
                    <div class="img1">
                        <img src="<?= Yii::getAlias('@web') ?>/img/normal/about_1_1.jpg" alt="About">
                    </div>
                    <div class="img2">
                        <img src="<?= Yii::getAlias('@web') ?>/img/normal/about_1_2.jpg" alt="Image">
                    </div>
                    <div class="shape1 movingX">
                        <img src="<?= Yii::getAlias('@web') ?>/img/normal/about_1_3.png" alt="Image">
                    </div>
                    <div class="year-counter">
                        <div class="year-counter_number"><span class="counter-number">23</span>+</div>
                        <p class="year-counter_text">года работы</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="ps-xxl-5 ps-xl-2 ms-xl-1 text-center text-xl-start">
                    <div class="title-area mb-32">
                        <span class="sub-title"><img src="<?= Yii::getAlias('@web') ?>/img/theme-img/title_icon.svg"
                                                     alt="shape">О нашей компании</span>
                        <h2 class="sec-title">Правильное питание Начните с Органических Продуктов</h2>
                        <p class="sec-text">Органические продукты производятся с помощью фермерской системы, которая
                            позволяет избежать использования синтетических пестицидов, гербицидов, генетически
                            модифицированных организмов (ГМО) и искусственных удобрений. Вместо этого фермеры-органики
                            полагаются на естественные методы, такие как севооборот. компостирование и биологическая
                            борьба с вредителями.</p>
                    </div>
                    <div class="about-feature-wrap">
                        <div class="about-feature">
                            <div class="box-icon">
                                <img src="<?= Yii::getAlias('@web') ?>/img/icon/about_feature_1.svg" alt="Icon">
                            </div>
                            <h3 class="box-title">Лидер в области сельского хозяйства</h3>
                        </div>
                        <div class="about-feature">
                            <div class="box-icon">
                                <img src="<?= Yii::getAlias('@web') ?>/img/icon/about_feature_2.svg" alt="Icon">
                            </div>
                            <h3 class="box-title">Умные органические решения</h3>
                        </div>
                    </div>
                    <div>
                        <a href="about.php" class="th-btn">Узнайте больше<i class="fas fa-chevrons-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--==============================
Product Area
==============================-->
<section class="bg-smoke2 space" id="shop-sec">
    <div class="shape-mockup" data-top="0" data-left="0"><img
                src="<?= Yii::getAlias('@web') ?>/img/shape/vector_shape_1.png" alt="shape"></div>
    <div class="shape-mockup" data-bottom="0" data-right="0"><img
                src="<?= Yii::getAlias('@web') ?>/img/shape/vector_shape_2.png" alt="shape"></div>
    <div class="container text-center">
        <div class="title-area text-center">
            <span class="sub-title"><img src="<?= Yii::getAlias('@web') ?>/img/theme-img/title_icon.svg" alt="Icon">Органические продукты</span>
            <h2 class="sec-title">Органические и свежие продукты ежедневно!</h2>
        </div>
        <div class="filter-menu indicator-active filter-menu-active">
            <button data-filter="*" class="th-btn tab-btn active" type="button">ALL</button>
            <button data-filter=".cat1" class="th-btn tab-btn" type="button">Fruits</button>
            <button data-filter=".cat2" class="th-btn tab-btn" type="button">Vegetable</button>
            <button data-filter=".cat3" class="th-btn tab-btn" type="button">Meat & Fish</button>
            <button data-filter=".cat4" class="th-btn tab-btn" type="button">Fruit Juice</button>
            <button data-filter=".cat5" class="th-btn tab-btn" type="button">Salads</button>
        </div>
        <div class="row gy-4 filter-active">
            <div class="col-xl-3 col-lg-4 col-sm-6 filter-item cat3">
                <div class="th-product product-grid">
                    <div class="product-img">
                        <img src="<?= Yii::getAlias('@web') ?>/img/product/product_1_1.jpg" alt="Product Image">
                        <span class="product-tag">Hot</span>
                        <div class="actions">
                            <a href="#QuickView" class="icon-btn popup-content"><i class="far fa-eye"></i></a>
                            <a href="cart.php" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                            <a href="wishlist.php" class="icon-btn"><i class="far fa-heart"></i></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <a href="shop-details.php" class="product-category">Fresh Fruits</a>
                        <h3 class="product-title"><a href="shop-details.php">Bosco Apple Fruit</a></h3>
                        <span class="price">$177.85</span>
                        <div class="woocommerce-product-rating">
                            <span class="count">(120 Reviews)</span>
                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-sm-6 filter-item cat5 cat2">
                <div class="th-product product-grid">
                    <div class="product-img">
                        <img src="<?= Yii::getAlias('@web') ?>/img/product/product_1_2.jpg" alt="Product Image">
                        <span class="product-tag">New</span>
                        <div class="actions">
                            <a href="#QuickView" class="icon-btn popup-content"><i class="far fa-eye"></i></a>
                            <a href="cart.php" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                            <a href="wishlist.php" class="icon-btn"><i class="far fa-heart"></i></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <a href="shop-details.php" class="product-category">Vegetables</a>
                        <h3 class="product-title"><a href="shop-details.php">Green Cauliflower</a></h3>
                        <span class="price">$39.85</span>
                        <div class="woocommerce-product-rating">
                            <span class="count">(120 Reviews)</span>
                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-sm-6 filter-item cat1 cat4">
                <div class="th-product product-grid">
                    <div class="product-img">
                        <img src="<?= Yii::getAlias('@web') ?>/img/product/product_1_3.jpg" alt="Product Image">
                        <span class="product-tag">Hot</span>
                        <div class="actions">
                            <a href="#QuickView" class="icon-btn popup-content"><i class="far fa-eye"></i></a>
                            <a href="cart.php" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                            <a href="wishlist.php" class="icon-btn"><i class="far fa-heart"></i></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <a href="shop-details.php" class="product-category">Fresh Fruits</a>
                        <h3 class="product-title"><a href="shop-details.php">Mandarin orange</a></h3>
                        <span class="price">$96.85</span>
                        <div class="woocommerce-product-rating">
                            <span class="count">(120 Reviews)</span>
                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-sm-6 filter-item cat2 cat5">
                <div class="th-product product-grid">
                    <div class="product-img">
                        <img src="<?= Yii::getAlias('@web') ?>/img/product/product_1_4.jpg" alt="Product Image">
                        <span class="product-tag">Sale</span>
                        <div class="actions">
                            <a href="#QuickView" class="icon-btn popup-content"><i class="far fa-eye"></i></a>
                            <a href="cart.php" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                            <a href="wishlist.php" class="icon-btn"><i class="far fa-heart"></i></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <a href="shop-details.php" class="product-category">Vegetables</a>
                        <h3 class="product-title"><a href="shop-details.php">Shallot Red onion</a></h3>
                        <span class="price">$08.85<del>$06.99</del></span>
                        <div class="woocommerce-product-rating">
                            <span class="count">(120 Reviews)</span>
                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-sm-6 filter-item cat3 cat1">
                <div class="th-product product-grid">
                    <div class="product-img">
                        <img src="<?= Yii::getAlias('@web') ?>/img/product/product_1_5.jpg" alt="Product Image">
                        <span class="product-tag">New</span>
                        <div class="actions">
                            <a href="#QuickView" class="icon-btn popup-content"><i class="far fa-eye"></i></a>
                            <a href="cart.php" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                            <a href="wishlist.php" class="icon-btn"><i class="far fa-heart"></i></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <a href="shop-details.php" class="product-category">Fresh Fruits</a>
                        <h3 class="product-title"><a href="shop-details.php">Sour Red Cherry</a></h3>
                        <span class="price">$32.85</span>
                        <div class="woocommerce-product-rating">
                            <span class="count">(120 Reviews)</span>
                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-sm-6 filter-item cat5 cat4 cat1 cat2">
                <div class="th-product product-grid">
                    <div class="product-img">
                        <img src="<?= Yii::getAlias('@web') ?>/img/product/product_1_6.jpg" alt="Product Image">
                        <span class="product-tag">Hot</span>
                        <div class="actions">
                            <a href="#QuickView" class="icon-btn popup-content"><i class="far fa-eye"></i></a>
                            <a href="cart.php" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                            <a href="wishlist.php" class="icon-btn"><i class="far fa-heart"></i></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <a href="shop-details.php" class="product-category">Fresh Fruits</a>
                        <h3 class="product-title"><a href="shop-details.php">Strawberry Fruits</a></h3>
                        <span class="price">$30.85</span>
                        <div class="woocommerce-product-rating">
                            <span class="count">(120 Reviews)</span>
                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-sm-6 filter-item cat2 cat1 cat4 cat5">
                <div class="th-product product-grid">
                    <div class="product-img">
                        <img src="<?= Yii::getAlias('@web') ?>/img/product/product_1_7.jpg" alt="Product Image">
                        <span class="product-tag">New</span>
                        <div class="actions">
                            <a href="#QuickView" class="icon-btn popup-content"><i class="far fa-eye"></i></a>
                            <a href="cart.php" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                            <a href="wishlist.php" class="icon-btn"><i class="far fa-heart"></i></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <a href="shop-details.php" class="product-category">Fresh Fruits</a>
                        <h3 class="product-title"><a href="shop-details.php">Six Ripe Banana</a></h3>
                        <span class="price">$232.85</span>
                        <div class="woocommerce-product-rating">
                            <span class="count">(120 Reviews)</span>
                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-sm-6 filter-item cat3">
                <div class="th-product product-grid">
                    <div class="product-img">
                        <img src="<?= Yii::getAlias('@web') ?>/img/product/product_1_8.jpg" alt="Product Image">
                        <span class="product-tag">Hot</span>
                        <div class="actions">
                            <a href="#QuickView" class="icon-btn popup-content"><i class="far fa-eye"></i></a>
                            <a href="cart.php" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                            <a href="wishlist.php" class="icon-btn"><i class="far fa-heart"></i></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <a href="shop-details.php" class="product-category">Fresh Fruits</a>
                        <h3 class="product-title"><a href="shop-details.php">Sausage Ribs Beef</a></h3>
                        <span class="price">$30.85</span>
                        <div class="woocommerce-product-rating">
                            <span class="count">(120 Reviews)</span>
                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section> <!--==============================
Feature Area  
==============================-->
<div class="overflow-hidden space">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 text-center text-xl-start">
                <div class="title-area">
                    <span class="sub-title"><img src="<?= Yii::getAlias('@web') ?>/img/theme-img/title_icon.svg"
                                                 alt="shape">Почему Вы выбрали именно Нас</span>
                    <h2 class="sec-title">Питайте свое тело чистой органической пищей!</h2>
                    <p class="sec-text">Правительства устанавливают правила, гарантирующие соответствие продукции,
                        обозначенной как органическая
                        , определенным стандартам. Для поддержания целостности органической этикетки проводятся
                        регулярные проверки и аудиты
                        .</p>
                </div>
            </div>
        </div>
        <div class="text-center text-xl-start">
            <div class="choose-feature-area">
                <div class="row">
                    <div class="col-xl-7">
                        <div class="choose-feature-wrap">
                            <div class="choose-feature">
                                <div class="box-icon">
                                    <img src="<?= Yii::getAlias('@web') ?>/img/icon/choose_feature_1.svg" alt="Icon">
                                </div>
                                <h3 class="box-title">100% Органический продукт</h3>
                                <p class="box-text">Наша продукция сертифицирована авторитетной компанией organic.</p>
                            </div>
                            <div class="choose-feature">
                                <div class="box-icon">
                                    <img src="<?= Yii::getAlias('@web') ?>/img/icon/choose_feature_2.svg" alt="Icon">
                                </div>
                                <h3 class="box-title">Свежие продукты</h3>
                                <p class="box-text">Наша продукция сертифицирована авторитетной компанией organic.</p>
                            </div>
                            <div class="choose-feature">
                                <div class="box-icon">
                                    <img src="<?= Yii::getAlias('@web') ?>/img/icon/choose_feature_3.svg" alt="Icon">
                                </div>
                                <h3 class="box-title">Биодинамическое питание</h3>
                                <p class="box-text">Наша продукция сертифицирована авторитетной компанией organic.</p>
                            </div>
                            <div class="choose-feature">
                                <div class="box-icon">
                                    <img src="<?= Yii::getAlias('@web') ?>/img/icon/choose_feature_4.svg" alt="Icon">
                                </div>
                                <h3 class="box-title">Обеспеченный платеж</h3>
                                <p class="box-text">Наша продукция сертифицирована авторитетной компанией organic.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 d-none d-xl-block">
                        <div class="img-box2-wrap">
                            <div class="img-box2">
                                <div class="img1">
                                    <img src="<?= Yii::getAlias('@web') ?>/img/normal/why_1_1.png" alt="Why">
                                </div>
                                <div class="img2">
                                    <img src="<?= Yii::getAlias('@web') ?>/img/normal/why_1_2.png" alt="Why">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--==============================
Counter Area
==============================-->
<div class="counter-sec1" data-bg-src="<?= Yii::getAlias('@web') ?>/img/bg/counter_bg_1.png">
    <div class="container">
        <div class="counter-card-wrap">
            <div class="counter-card">
                <div class="box-icon">
                    <img src="<?= Yii::getAlias('@web') ?>/img/icon/counter_card_1.svg" alt="Icon">
                </div>
                <div class="media-body">
                    <h2 class="box-number"><span class="counter-number">15663</span>+</h2>
                    <p class="box-text">Весь ассортимент</p>
                </div>
            </div>
            <div class="divider"></div>
            <div class="counter-card">
                <div class="box-icon">
                    <img src="<?= Yii::getAlias('@web') ?>/img/icon/counter_card_2.svg" alt="Icon">
                </div>
                <div class="media-body">
                    <h2 class="box-number"><span class="counter-number">356</span>+</h2>
                    <p class="box-text">Члены команды</p>
                </div>
            </div>
            <div class="divider"></div>
            <div class="counter-card">
                <div class="box-icon">
                    <img src="<?= Yii::getAlias('@web') ?>/img/icon/counter_card_3.svg" alt="Icon">
                </div>
                <div class="media-body">
                    <h2 class="box-number"><span class="counter-number">2365</span>+</h2>
                    <p class="box-text">Довольные клиенты</p>
                </div>
            </div>
            <div class="divider"></div>
            <div class="counter-card">
                <div class="box-icon">
                    <img src="<?= Yii::getAlias('@web') ?>/img/icon/counter_card_4.svg" alt="Icon">
                </div>
                <div class="media-body">
                    <h2 class="box-number"><span class="counter-number">156</span>+</h2>
                    <p class="box-text">Удостоенный наград</p>
                </div>
            </div>
            <div class="divider"></div>
        </div>
    </div>
</div>

<!--==============================
Testimonial Area  
==============================-->
<section class="overflow-hidden bg-smoke2" id="testi-sec">
    <div class="shape-mockup testi-shape1" data-top="0" data-left="0"><img
                src="<?= Yii::getAlias('@web') ?>/img/normal/testi_shape.png" alt="shape"></div>
    <div class="shape-mockup" data-bottom="0" data-right="0"><img
                src="<?= Yii::getAlias('@web') ?>/img/shape/vector_shape_5.png" alt="shape"></div>
    <div class="container">
        <div class="testi-card-area">
            <div class="title-area">
                <span class="sub-title"><img src="<?= Yii::getAlias('@web') ?>/img/theme-img/title_icon.svg" alt="Icon">Рекомендации</span>
                <h2 class="sec-title">Отзывы наших клиентов</h2>
            </div>
            <div class="testi-card-slide">
                <div class="swiper th-slider" id="testiSlide1" data-slider-options='{"effect":"slide"}'>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="testi-card">
                                <p class="testi-card_text">“Наши методы ведения органического сельского хозяйства
                                    работают в гармонии с природой.
                                    Избегая синтетических химикатов, мы помогаем защитить полезных насекомых, птиц и
                                    других представителей дикой природы, которые жизненно важны для сбалансированной
                                    экосистемы.
                                    Органические продукты часто обладают более насыщенным вкусом.”</p>
                                <div class="testi-card_profile">
                                    <div class="testi-card_avater">
                                        <img src="<?= Yii::getAlias('@web') ?>/img/testimonial/testi_1_1.jpg"
                                             alt="Avater">
                                    </div>
                                    <div class="testi-card_content">
                                        <h3 class="testi-card_name">Анджелина Маргрет</h3>
                                        <span class="testi-card_desig">Клиент нашего магазина</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testi-card">
                                <p class="testi-card_text">“Методы выращивания свежих продуктов работают в гармонии с
                                    природой.
                                    Избегая синтетических химикатов, мы помогаем защитить полезных насекомых, птиц и
                                    других
                                    представителей дикой природы, которые жизненно важны для сбалансированной
                                    экосистемы.
                                    Органические продукты помогают поддерживать себя в форме.”</p>
                                <div class="testi-card_profile">
                                    <div class="testi-card_avater">
                                        <img src="<?= Yii::getAlias('@web') ?>/img/testimonial/testi_1_2.jpg"
                                             alt="Avater">
                                    </div>
                                    <div class="testi-card_content">
                                        <h3 class="testi-card_name">Алексан Микелито</h3>
                                        <span class="testi-card_desig">Клиент нашего магазина</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="icon-box">
                    <button data-slider-prev="#testiSlide1" class="slider-arrow default"><i
                                class="far fa-arrow-left"></i></button>
                    <button data-slider-next="#testiSlide1" class="slider-arrow default"><i
                                class="far fa-arrow-right"></i></button>
                </div>
            </div>
        </div>
    </div>
</section>

<!--==============================
Blog Area  
==============================-->
<section class="space" id="blog-sec">
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title"><img src="<?= Yii::getAlias('@web') ?>/img/theme-img/title_icon.svg" alt="shape">Блог и новости</span>
            <h2 class="sec-title">Последние обновления, Новости и статьи</h2>
        </div>
        <div class="slider-area">
            <div class="swiper th-slider has-shadow" id="blogSlider1"
                 data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}}}'>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <?php
                        foreach ($news as $new): ?>
                            <div class="blog-card">
                                <div class="blog-img">
                                    <img src="<?= $new->image; ?>" alt="<?= $new->title; ?>">
                                </div>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <a href="/site/blog-details?id=<?= $new->id; ?>">
                                            <i class="far fa-calendar"></i>
                                            <?= Yii::$app->formatter->asDate($new->date); ?>
                                        </a>
                                    </div>
                                    <h3 class="box-title"><a
                                                href="/site/blog-details?id=<?= $new->id; ?>"><?= $new->title; ?></a>
                                    </h3>
                                    <a href="/site/blog-details?id=<?= $new->id; ?>" class="th-btn btn-sm style4">Узнать
                                        больше<i
                                                class="fas fa-chevrons-right ms-2"></i></a>
                                </div>
                            </div>
                        <?php
                        endforeach; ?>
                    </div>
                </div>
            </div>
            <button data-slider-prev="#blogSlider1" class="slider-arrow slider-prev"><i class="far fa-arrow-left"></i>
            </button>
            <button data-slider-next="#blogSlider1" class="slider-arrow slider-next"><i class="far fa-arrow-right"></i>
            </button>
        </div>
    </div>
</section>
