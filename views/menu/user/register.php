<?php


use app\models\RegisterForm;
use app\models\User;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;


/* @var yii\web\View $this  */
/* @var RegisterForm $registerForm  */
/* @var ActiveForm $form  */

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="site-register">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>Пожалуйста, заполните поля для регистрации:</p>

        <div class="row">
            <div class="col-lg-5">
                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($registerForm, 'email')->textInput(['autofocus' => true]) ?>
                <?= $form->field($registerForm, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary', 'name' => 'register-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

