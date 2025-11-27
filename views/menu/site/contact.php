<?php

$this->title = 'Контакты';
$this->params['breadcrumbs'][] = $this->title;
?>
<!--==============================
Contact Info Area  
==============================-->
<div class="space">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-7">
                <div class="title-area text-center">
                    <h2 class="sec-title">Контактная информация</h2>
                    <p class="sec-text">Органические продукты питания, как правило, сертифицируются регулирующими органами, чтобы гарантировать их соответствие
                        определенным органическим стандартам.</p>
                </div>
            </div>
        </div>
        <div class="row gy-4 justify-content-center">
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="contact-feature">
                    <div class="box-icon">
                        <i class="fa-light fa-location-dot"></i>
                    </div>
                    <div class="media-body">
                        <h3 class="box-title">Наш адрес</h3>
                        <p class="box-text">г. Москва, ул. Неглинная, д. 12</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="contact-feature">
                    <div class="box-icon bg-theme2">
                        <i class="fa-light fa-phone"></i>
                    </div>
                    <div class="media-body">
                        <h3 class="box-title">Номер телефона</h3>
                        <p class="box-text">
                            <a href="tel:+73012777777">+7 (3012) 77-77-77</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="contact-feature">
                    <div class="box-icon bg-title">
                        <i class="fa-light fa-envelope"></i>
                    </div>
                    <div class="media-body">
                        <h3 class="box-title">Email</h3>
                        <p class="box-text">
                            <a href="mailto:777777@mail.com">777777@mail.com</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="contact-feature">
                    <div class="media-body">
                        <h3 class="box-title">Социальные сети</h3>
                        <div class="th-social">
                            <a target="_blank" href="https://facebook.com/"><i class="fab fa-telegram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!--==============================
Contact Area   
==============================-->
<div class="space-bottom">
    <div class="container">
        <form action="mail.php" method="POST" class="contact-form input-smoke ajax-contact">
            <h2 class="sec-title">Связаться</h2>
            <div class="row">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Имя*">
                    <i class="fal fa-user"></i>
                </div>
                <div class="form-group col-md-6">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email*">
                    <i class="fal fa-envelope"></i>
                </div>
                <div class="form-group col-md-12">
                    <input type="tel" class="form-control" name="number" id="number" placeholder="Номер телефона*">
                    <i class="fal fa-phone"></i>
                </div>
                <div class="form-group col-12">
                    <textarea name="message" id="message" cols="30" rows="3" class="form-control"
                              placeholder="Сообщение"></textarea>
                    <i class="fal fa-pencil"></i>
                </div>
                <div class="form-btn col-12">
                    <button class="th-btn btn-fw">Отправить<i class="fas fa-chevrons-right ms-2"></i></button>
                </div>
            </div>
            <p class="form-messages mb-0 mt-3"></p>
        </form>
    </div>
</div><!--==============================
Map Area  
==============================-->
<div class="space-bottom">
    <div class="contact-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3644.7310056272386!2d89.2286059153658!3d24.00527418490799!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fe9b97badc6151%3A0x30b048c9fb2129bc!2sAngfuztheme!5e0!3m2!1sen!2sbd!4v1651028958211!5m2!1sen!2sbd"
                allowfullscreen="" loading="lazy"></iframe>
    </div>
</div>
