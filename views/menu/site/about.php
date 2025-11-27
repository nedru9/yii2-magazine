<?php

$this->title = 'О нас';
$this->params['breadcrumbs'][] = $this->title; //товар
?>
<!--==============================
About Area  
==============================-->
<div class="overflow-hidden overflow-hidden space" id="about-sec">
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
                        <p class="year-counter_text">Многолетний опыт работы</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="ps-xxl-5 ps-xl-2 ms-xl-1 text-center text-xl-start">
                    <div class="title-area mb-32">
                        <span class="sub-title"><img src="<?= Yii::getAlias('@web') ?>/img/theme-img/title_icon.svg" alt="shape">О нашей компании</span>
                        <h2 class="sec-title">Правильное питание Начните с Органических Продуктов</h2>
                        <p class="sec-text">Органические продукты производятся с помощью фермерской системы, которая позволяет избежать использования
                            синтетических пестицидов, гербицидов, генетически модифицированных организмов (ГМО) и искусственных
                            удобрений. Вместо этого фермеры-органики полагаются на естественные методы, такие как севооборот.
                            компостирование и биологическая борьба с вредителями.</p>
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
                        <a href="about.html" class="th-btn">Узнайте больше<i class="fas fa-chevrons-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--==============================
Process Area  
==============================-->
<section class="space bg-smoke2" id="process-sec">
    <div class="shape-mockup" data-top="0" data-left="0"><img src="<?= Yii::getAlias('@web') ?>/img/shape/vector_shape_7.png" alt="shape">
    </div>
    <div class="shape-mockup" data-bottom="0" data-right="0"><img src="<?= Yii::getAlias('@web') ?>/img/shape/vector_shape_6.png" alt="shape">
    </div>
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title"><img src="<?= Yii::getAlias('@web') ?>/img/theme-img/title_icon.svg" alt="Icon">Как мы готовим качественные продукты</span>
            <h2 class="sec-title">Как Мы Это Делаем?</h2>
        </div>
        <div class="row gy-4 justify-content-center">
            <div class="col-xl-3 col-md-6 process-box-wrap">
                <div class="process-box">
                    <div class="box-icon">
                        <img src="<?= Yii::getAlias('@web') ?>/img/icon/process_box_1.svg" alt="icon">
                    </div>
                    <div class="box-img" data-mask-src="assets/img/bg/process_bg_shape.png">
                        <img src="<?= Yii::getAlias('@web') ?>/img/normal/process_box_1.jpg" alt="image">
                    </div>
                    <p class="box-number">Шаг - 01</p>
                    <h3 class="box-title">Планирование работы</h3>
                    <p class="box-text">Начните с проведения тщательных анализов почвы, чтобы понять ее состав,
                        уровень рН и питательных веществ.</p>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 process-box-wrap">
                <div class="process-box">
                    <div class="box-icon">
                        <img src="<?= Yii::getAlias('@web') ?>/img/icon/process_box_2.svg" alt="icon">
                    </div>
                    <div class="box-img" data-mask-src="assets/img/bg/process_bg_shape.png">
                        <img src="<?= Yii::getAlias('@web') ?>/img/normal/process_box_2.jpg" alt="image">
                    </div>
                    <p class="box-number">Шаг - 02</p>
                    <h3 class="box-title">Выращивание на ферме</h3>
                    <p class="box-text">Начните с проведения тщательных анализов почвы, чтобы понять ее состав,
                        уровень рН и питательных веществ.</p>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 process-box-wrap">
                <div class="process-box">
                    <div class="box-icon">
                        <img src="<?= Yii::getAlias('@web') ?>/img/icon/process_box_3.svg" alt="icon">
                    </div>
                    <div class="box-img" data-mask-src="assets/img/bg/process_bg_shape.png">
                        <img src="<?= Yii::getAlias('@web') ?>/img/normal/process_box_3.jpg" alt="image">
                    </div>
                    <p class="box-number">Шаг - 03</p>
                    <h3 class="box-title">Сбор урожая</h3>
                    <p class="box-text">Начните с проведения тщательных анализов почвы, чтобы понять ее состав,
                        уровень рН и питательных веществ.</p>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 process-box-wrap">
                <div class="process-box">
                    <div class="box-icon">
                        <img src="<?= Yii::getAlias('@web') ?>/img/icon/process_box_4.svg" alt="icon">
                    </div>
                    <div class="box-img" data-mask-src="assets/img/bg/process_bg_shape.png">
                        <img src="<?= Yii::getAlias('@web') ?>/img/normal/process_box_4.jpg" alt="image">
                    </div>
                    <p class="box-number">Шаг - 04</p>
                    <h3 class="box-title">Пищевая промышленность</h3>
                    <p class="box-text">Начните с проведения тщательных анализов почвы, чтобы понять ее состав,
                        уровень рН и питательных веществ.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--==============================
Counter Area  
==============================-->
<div class="counter-sec11" data-bg-src="assets/img/bg/counter_bg_1_1.jpg">
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
</div><!--==============================
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
                    <p class="sec-text">Правительства устанавливают правила, гарантирующие соответствие продукции, обозначенной как органическая
                        , определенным стандартам. Для поддержания целостности органической этикетки проводятся регулярные проверки и аудиты
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
Testimonial Area  
==============================-->
<section class="overflow-hidden bg-smoke2" id="testi-sec">
    <div class="shape-mockup testi-shape1" data-top="0" data-left="0"><img src="<?= Yii::getAlias('@web') ?>/img/normal/testi_shape.png"
                                                                           alt="shape"></div>
    <div class="shape-mockup" data-bottom="0" data-right="0"><img src="<?= Yii::getAlias('@web') ?>/img/shape/vector_shape_5.png" alt="shape">
    </div>
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
                                <p class="testi-card_text">“Наши методы ведения органического сельского хозяйства работают в гармонии с природой.
                                    Избегая синтетических химикатов, мы помогаем защитить полезных насекомых, птиц и
                                    других представителей дикой природы, которые жизненно важны для сбалансированной экосистемы.
                                    Органические продукты часто обладают более насыщенным вкусом.”</p>
                                <div class="testi-card_profile">
                                    <div class="testi-card_avater">
                                        <img src="<?= Yii::getAlias('@web') ?>/img/testimonial/testi_1_1.jpg" alt="Avater">
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
                                <p class="testi-card_text">“Методы выращивания свежих продуктов работают в гармонии с природой.
                                    Избегая синтетических химикатов, мы помогаем защитить полезных насекомых, птиц и других
                                    представителей дикой природы, которые жизненно важны для сбалансированной экосистемы.
                                    Органические продукты помогают поддерживать себя в форме.”</p>
                                <div class="testi-card_profile">
                                    <div class="testi-card_avater">
                                        <img src="<?= Yii::getAlias('@web') ?>/img/testimonial/testi_1_2.jpg" alt="Avater">
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
Team Area  
==============================-->
<section class="space">
    <div class="container z-index-common">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-md-8">
                <div class="title-area text-center">
                    <span class="sub-title"><img src="<?= Yii::getAlias('@web') ?>/img/theme-img/title_icon.svg"
                                                 alt="Icon">Члены команды</span>
                    <h2 class="sec-title">У Нас здесь потрясающая Команда, которая поможет Вам!</h2>
                </div>
            </div>
        </div>
        <div class="row gy-40 justify-content-center">
            <!-- Single Item -->
            <div class="col-xl-4 col-md-6">
                <div class="th-team team-card">
                    <div class="img-wrap">
                        <div class="shape" data-mask-src="<?= Yii::getAlias('@web') ?>/img/bg/team_card_bg.png"></div>
                        <div class="team-img">
                            <img src="<?= Yii::getAlias('@web') ?>/img/team/team_1_1.jpg" alt="Team">
                        </div>
                    </div>
                    <div class="box-content">
                        <span class="team-desig">Старшие фермеры</span>
                        <h3 class="box-title"><a href="team-details.php">Алхандо Роберт</a></h3>
                        <div class="social-links">
                            <a target="_blank" href="https://facebook.com/"><i class="fab fa-telegram"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Item -->
            <div class="col-xl-4 col-md-6">
                <div class="th-team team-card">
                    <div class="img-wrap">
                        <div class="shape" data-mask-src="assets/img/bg/team_card_bg.png"></div>
                        <div class="team-img">
                            <img src="<?= Yii::getAlias('@web') ?>/img/team/team_1_2.jpg" alt="Team">
                        </div>
                    </div>
                    <div class="box-content">
                        <span class="team-desig">Молодые фермеры</span>
                        <h3 class="box-title"><a href="team-details.php">Элиана Беллингем</a></h3>
                        <div class="social-links">
                            <a target="_blank" href="https://facebook.com/"><i class="fab fa-telegram"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Item -->
            <div class="col-xl-4 col-md-6">
                <div class="th-team team-card">
                    <div class="img-wrap">
                        <div class="shape" data-mask-src="assets/img/bg/team_card_bg.png"></div>
                        <div class="team-img">
                            <img src="<?= Yii::getAlias('@web') ?>/img/team/team_1_3.jpg" alt="Team">
                        </div>
                    </div>
                    <div class="box-content">
                        <span class="team-desig">Старшие фермеры</span>
                        <h3 class="box-title"><a href="team-details.php">Эмануэль Макуле</a></h3>
                        <div class="social-links">
                            <a target="_blank" href="https://facebook.com/"><i class="fab fa-telegram"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
