<?php

/** @var User $user */

/** @var Role[] $roles */

use app\models\User;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;
use yii\rbac\Role;
use yii\widgets\ActiveForm;

$this->title = 'Изменение пользователя';

?>

<div class="container">
    <h1><?= $this->title; ?></h1>
    <?php
    $form = ActiveForm::begin(
        [
            'id' => 'edit-order-form',
        ]
    );
    ?>
    <?= $form->field($user, 'email')->textInput(); ?>
    <?= $form->field($user, 'role')->dropDownList(
        ArrayHelper::map($roles, 'name', 'description'),
        ['prompt' => 'Выберите роль']
    ); ?>
    <?= $form->field($user, 'newPassword')->passwordInput(); ?>


    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']); ?>
    <?php
    ActiveForm::end(); ?>
</div>
