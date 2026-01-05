<?php

/** @var Order $order */

use app\enums\PaymentMethod;
use app\enums\Status;
use app\models\Order;
use kartik\select2\Select2;
use yii\bootstrap\Html;
use yii\widgets\ActiveForm;

$this->title = 'Просмотр заказа';

?>

<div class="container">
    <h1><?= $this->title; ?></h1>
    <?php
    $form = ActiveForm::begin(
        [
            'id' => 'view-order-form',
        ]
    );
    ?>
    <?= $form->field($order, 'name')->textInput(['disabled' => true]); ?>
    <?= $form->field($order, 'phone')->textInput(['disabled' => true]); ?>
    <?= $form->field($order, 'email')->textInput(['disabled' => true]); ?>
    <?= $form->field($order, 'address')->textInput(['disabled' => true]); ?>
    <?= $form->field($order, 'total')->textInput(['disabled' => true]); ?>


    <?= $form->field($order, 'paymentType')->radioList(
        PaymentMethod::list(),
        [
            'item' => function ($index, $label, $name, $checked, $value) {
                return <<<HTML
                                <li class="wc_payment_method payment_method_bacs">
                                    <input type="radio" name="{$name}" value="{$value}" checked disabled class="input-radio">
                                    <label for="{$name}">{$label}</label>
                                </li>
                                HTML;
            },
        ]
    ) ?>
    <?= $form->field($order, 'status')->widget(Select2::class, [
        'data' => Status::list(),
        'pluginOptions' => [
            'allowClear' => true,
        ],
        'options' => [
            'disabled' => 'true',
        ],
    ]); ?>

    <div>Состав заказа:</div>
    <table>
        <thead>
        <tr>
            <th>Изображение</th>
            <th>Наименование</th>
            <th>Цена</th>
            <th>Количество</th>
            <th>Общая сумма</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($order->items as $orderItem): ?>
            <tr>
                <td>
                    <img width="100px" src="<?= $orderItem->product->image; ?>"
                         alt="<?= $orderItem->product->title; ?>">
                </td>
                <td>
                    <?= $orderItem->product->title; ?>
                </td>
                <td>
                    <?= $orderItem->price; ?>₽
                </td>
                <td>
                    <?= $orderItem->count; ?>
                </td>
                <td>
                    <?= $orderItem->total; ?>₽
                </td>
            </tr>
        <?php
        endforeach; ?>
        </tbody>
    </table>
    <?php
    ActiveForm::end(); ?>
</div>
