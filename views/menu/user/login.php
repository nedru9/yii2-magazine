<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap\ActiveForm $form */

/** @var app\models\LoginForm $model */

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

$this->title = 'Авторизация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="site-login">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>Введите данные:</p>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'class' => 'd-flex flex-column',

                ]); ?>

                <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox([
                    'template' => "<div class=\"custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
                ]) ?>

                <p>Не зарегистрированы? <a href="/user/register">Зарегистрироваться</a></p>

                <div class="form-group">
                    <div>
                        <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

