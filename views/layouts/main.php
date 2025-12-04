<?php

/** @var yii\web\View $this */

/** @var string $content */

/** @var int $favoriteCount */

use app\assets\AppAsset;
use app\entities\Favorite;
use app\widgets\Alert;
use yii\bootstrap\Html;
use yii\widgets\Breadcrumbs;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php
$this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php
    $this->head() ?>
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicons - Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?= Yii::getAlias('@web') ?>/img/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= Yii::getAlias('@web') ?>/img/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= Yii::getAlias('@web') ?>/img/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= Yii::getAlias('@web') ?>/img/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114"
          href="<?= Yii::getAlias('@web') ?>/img/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120"
          href="<?= Yii::getAlias('@web') ?>/img/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144"
          href="<?= Yii::getAlias('@web') ?>/img/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152"
          href="<?= Yii::getAlias('@web') ?>/img/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180"
          href="<?= Yii::getAlias('@web') ?>/img/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"
          href="<?= Yii::getAlias('@web') ?>/img/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= Yii::getAlias('@web') ?>/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= Yii::getAlias('@web') ?>/img/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= Yii::getAlias('@web') ?>/img/favicons/favicon-16x16.png">
    <link rel="manifest" href="<?= Yii::getAlias('@web') ?>/img/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= Yii::getAlias('@web') ?>/img/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!--==============================
	  Google Fonts
	============================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,100;9..40,200;9..40,300;9..40,400;9..40,500;9..40,600;9..40,700&family=Lexend:wght@300;400;500;600;700;800;900&family=Lobster&display=swap"
          rel="stylesheet">
</head>
<body class="d-flex flex-column h-100">
<?php
$this->beginBody() ?>

<!--<header id="header">-->
<!--    --><?php
//    NavBar::begin([
//        'brandLabel' => Yii::$app->name,
//        'brandUrl' => Yii::$app->homeUrl,
//        'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top']
//    ]);
//    echo Nav::widget([
//        'options' => ['class' => 'navbar-nav'],
//        'items' => [
//            ['label' => 'Товары', 'url' => ['/products']],
//            ['label' => 'Создать товар', 'url' => ['/products/create']],
//            ['label' => 'Contact', 'url' => ['/site/contact']],
//            Yii::$app->user->isGuest
//                ? ['label' => 'Login', 'url' => ['/site/login']]
//                : '<li class="nav-item">'
//                    . Html::beginForm(['/site/logout'])
//                    . Html::submitButton(
//                        'Logout (' . Yii::$app->user->identity->username . ')',
//                        ['class' => 'nav-link btn btn-link logout']
//                    )
//                    . Html::endForm()
//                    . '</li>'
//        ]
//    ]);
//    NavBar::end();
//    ?>
<!--</header>-->


<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade
    your browser</a> to improve your experience and security.</p>
<![endif]-->


<!--********************************
       Code Start From Here
******************************** -->

<!--==============================
 Preloader
==============================-->
<div class="preloader ">
    <div class="preloader-inner">
        <div class="loader">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>

<!--==============================
    Sidemenu
============================== -->
<div class="sidemenu-wrapper sidemenu-cart d-none d-lg-block ">
    <div class="sidemenu-content">
        <button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>
        <div class="widget woocommerce widget_shopping_cart">
            <h3 class="widget_title">Корзина</h3>
            <div class="widget_shopping_cart_content">
                <ul class="woocommerce-mini-cart cart_list product_list_widget ">
                    <li class="woocommerce-mini-cart-item mini_cart_item">
                        <a href="#" class="remove remove_from_cart_button"><i class="far fa-times"></i></a>
                        <a href="#"><img src="<?= Yii::getAlias('@web') ?>/img/product/product_thumb_1_1.jpg"
                                         alt="Cart Image">Bosco Apple Fruit</a>
                        <span class="quantity">1 ×
                                <span class="woocommerce-Price-amount amount">
                                    <span class="woocommerce-Price-currencySymbol">$</span>940.00</span>
                            </span>
                    </li>
                </ul>
                <p class="woocommerce-mini-cart__total total">
                    <strong>Итого:</strong>
                    <span class="woocommerce-Price-amount amount">
                            4398.00₽</span>
                </p>
                <p class="woocommerce-mini-cart__buttons buttons">
                    <a href="/site/cart" class="th-btn wc-forward">Корзина</a>
                    <a href="/site/checkout" class="th-btn checkout wc-forward">Оформить</a>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="popup-search-box d-none d-lg-block">
    <button class="searchClose"><i class="fal fa-times"></i></button>
    <form action="#">
        <input type="text" placeholder="Что вы ищете?">
        <button type="submit"><i class="fal fa-search"></i></button>
    </form>
</div>
<!--==============================
    Mobile Menu
  ============================== -->
<div class="th-menu-wrapper">
    <div class="th-menu-area text-center">
        <button class="th-menu-toggle"><i class="fal fa-times"></i></button>
        <div class="mobile-logo">
            <a href="/"><img src="<?= Yii::getAlias('@web') ?>/img/logo.svg" alt="Frutin"></a>
        </div>
        <div class="th-mobile-menu">
            <ul>
                <li>
                    <a href="/">Главная</a>
                </li>
                <li><a href="/site/shop">Товары</a></li>
                <li><a href="/site/about">О нас</a></li>
                <li><a href="/site/faq">Помощь</a></li>
                <li><a href="/site/blog">Блог</a></li>
                <li><a href="/site/contact">Контакты</a></li>
            </ul>
        </div>
    </div>
</div>
<!--==============================
	Header Area
==============================-->
<header class="th-header header-layout1">
    <div class="header-top">
        <div class="container">
            <div class="row justify-content-center justify-content-lg-between align-items-center gy-2">
                <div class="col-auto d-none d-lg-block">

                </div>
                <div class="col-auto">
                    <div class="header-links">
                        <ul>
                            <li class="d-none d-sm-inline-block"><i class="fal fa-location-dot"></i><a
                                        href="https://www.google.com/maps">
                                    г. Москва, ул. Неглинная, д. 12</a>
                            </li>
                            <li>
                                <div class="social-links">
                                    <a href="https://www.facebook.com/"><i class="fab fa-telegram"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sticky-wrapper">
        <!-- Main Menu Area -->
        <div class="menu-area">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto">
                        <div class="header-logo">
                            <a href="/"><img src="<?= Yii::getAlias('@web') ?>/img/logo.svg"
                                             alt="Frutin"></a>
                        </div>
                    </div>
                    <div class="col-auto">
                        <nav class="main-menu d-none d-lg-inline-block">
                            <ul>
                                <li>
                                    <a href="/">Главная</a>
                                </li>
                                <?php
                                if (!Yii::$app->user->can('manager')): ?>
                                    <li>
                                        <a href="/site/shop">Товары</a>
                                    </li>
                                    <li><a href="/site/about">О нас</a></li>
                                    <li>
                                        <a href="/site/faq">Помощь</a>
                                    </li>
                                    <li>
                                        <a href="/site/blog">Блог</a>
                                    </li>
                                    <li>
                                        <a href="/site/contact">Контакты</a>
                                    </li>
                                <?php
                                else: ?>
                                    <li>
                                        <a href="/categories">Категории</a>
                                    </li>
                                    <li>
                                        <a href="/products">Товары</a>
                                    </li>
                                    <li>
                                        <a href="/user/orders">Заказы</a>
                                    </li>


                                <?php
                                endif; ?>
                            </ul>
                        </nav>
                        <button type="button" class="th-menu-toggle d-block d-lg-none"><i class="far fa-bars"></i>
                        </button>
                    </div>
                    <div class="col-auto d-none d-xl-block">
                        <div class="header-button">
                            <button type="button" class="simple-icon searchBoxToggler"><i class="far fa-search"></i>
                            </button>
                            <a class="favorite simple-icon" href="/site/wishlist">
                                <span class="badge"><?= count(Favorite::getFavorites()); ?></span>
                                <i class="fa-regular fa-heart"></i>
                            </a>
                            <?php
                            if (Yii::$app->user->isGuest === true): ?>
                                <a class="favorite simple-icon" href="/user/login">
                                    <i class="fa-regular fa-user"></i>
                                </a>
                            <?php
                            else: ?>
                                <a class="favorite simple-icon" href="/user/products">
                                    <i class="fa-regular fa-user"></i>
                                </a>
                            <?php
                            endif; ?>
                            <button type="button" class="simple-icon sideMenuToggler">
                                <span class="badge">5</span>
                                <i class="fa-regular fa-cart-shopping"></i>
                            </button>
                            <a href="shop.php" class="th-btn style4">Купить сейчас<i
                                        class="fas fa-chevrons-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


<main id="main" class="flex-shrink-0" role="main">
    <?php
    if (!empty($this->params['breadcrumbs'])): ?>
        <div class="breadcrumb-wrapper magazine">
            <div class="container">
                <div class="breadcrumb-content">
                    <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>

                </div>
            </div>
        </div>
    <?php
    endif ?>

    <?= Alert::widget() ?>
    <?= $content ?>
    <div class="">
        <div class="container z-index-common">
            <div class="newsletter-wrap">
                <div class="newsletter-content">
                    <h4 class="newsletter-title">Подпишитесь, чтобы получать обновления и новости о нас.</h4>
                </div>
                <form class="newsletter-form">
                    <div class="form-group">
                        <input class="form-control" type="email" placeholder="Email" required="">
                    </div>
                    <button type="submit" class="th-btn style6">Подписаться</button>
                </form>
            </div>
        </div>
    </div>
    <footer class="footer-wrapper footer-layout1">
        <div class="widget-area">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget footer-widget">
                            <div class="th-widget-about">
                                <div class="about-logo">
                                    <a href="home-organic-farm.php"><img
                                                src="<?= Yii::getAlias('@web'); ?>/img/logo-footer.svg"
                                                alt="Frutin"></a>
                                </div>
                                <p class="about-text">Мотивационный лозунг компании</p>
                                <div class="th-social">
                                    <a href="https://www.facebook.com/"><i class="fab fa-telegram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title"><img
                                        src="<?= Yii::getAlias('@web'); ?>/img/theme-img/title_icon.svg" alt="Icon">Общее
                            </h3>
                            <div class="menu-all-pages-container">
                                <ul class="menu">
                                    <li><a href="/site/about">О нас</a></li>
                                    <li><a href="/site/shop">Товары</a></li>
                                    <li><a href="/site/faq">Помощь</a></li>
                                    <li><a href="/site/blog">Блог</a></li>
                                    <li><a href="/site/contact">Контакты</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget footer-widget">
                            <h3 class="widget_title"><img
                                        src="<?= Yii::getAlias('@web'); ?>/img/theme-img/title_icon.svg" alt="Icon">Контакты
                            </h3>
                            <div class="th-widget-contact">
                                <div class="info-box">
                                    <div class="info-box_icon">
                                        <i class="fas fa-location-dot"></i>
                                    </div>
                                    <p class="info-box_text">г. Москва, ул. Неглинная, д. 12</p>
                                </div>
                                <div class="info-box">
                                    <div class="info-box_icon">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <p class="info-box_text">
                                        <a href="tel:+73012777777" class="info-box_link">+7 (3012) 77-77-77</a>
                                    </p>
                                </div>
                                <div class="info-box">
                                    <div class="info-box_icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <p class="info-box_text">
                                        <a href="mailto:help24/7@frutin.com"
                                           class="info-box_link">777777@mail.com</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-wrap">
            <div class="container">
                <div class="row gy-2 align-items-center">
                    <div class="col-md-6">
                        <p class="copyright-text">Copyright <i class="fal fa-copyright"></i> <?= new DateTime()->format(
                                'Y'
                            ); ?> <a
                                    href="/">Frutin</a>. Все права защищены.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</main>


<!-- Scroll To Top -->
<div class="scroll-top">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
              style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
    </svg>
</div>


<?php
$this->endBody() ?>
</body>
</html>
<?php
$this->endPage() ?>
