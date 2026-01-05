<?php

use app\enums\PaymentMethod;
use app\enums\Status;
use yii\data\ActiveDataProvider;
use yii\widgets\LinkPager;

/* @var ActiveDataProvider $dataProvider ; */

$pages = $dataProvider->getPagination();
$sort = $dataProvider->sort;
$start = $pages->offset + 1;
$end = $pages->offset + $pages->limit;

if ($end > $pages->totalCount) {
    $end = $pages->totalCount;
}

$this->title = 'Мои заказы';
$this->params['breadcrumbs'][] = [
    'label' => $this->title
];

?>
<!--==============================
Product Area
==============================-->
<section class="space-top space-extra-bottom">
    <div class="container">
        <div class="th-sort-bar">
            <div class="row justify-content-between align-items-center">
                <div class="col-md">
                    <p class="woocommerce-result-count">Отображено <?= $start; ?>–<?= $end ?>
                        из <?= $pages->totalCount; ?></p>
                </div>
            </div>
        </div>
        <?php
        if (!empty($dataProvider->models)): ?>
            <table>
                <thead>
                <tr>
                    <th>№ заказа</th>
                    <th>ФИО заказчика</th>
                    <th>Стоимость заказа</th>
                    <th>Статус заказа</th>
                    <th>Тип оплаты</th>
                    <th>Дата создания</th>
                    <th>Действие</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($dataProvider->models as $order): ?>
                    <tr>
                        <td><?= $order->id; ?></td>
                        <td><?= $order->name; ?></td>
                        <td><?= $order->total; ?>₽</td>
                        <td><?= Status::list()[$order->status]; ?></td>
                        <td><?= PaymentMethod::list()[$order->paymentType]; ?></td>
                        <td><?= Yii::$app->formatter->asDate($order->dateCreate); ?></td>
                        <td>
                            <a href="/orders/view?id=<?= $order->id; ?>"><i class="fa-regular fa-eye"></i></a>
                    </tr>
                <?php
                endforeach; ?>
                </tbody>
            </table>

            <div class="th-pagination text-center pt-50">

                <?= LinkPager::widget([
                    'pagination' => $pages,
                ]); ?>
            </div>

        <?php
        else: ?>
            Нет заказов
        <?php
        endif; ?>
    </div>
</section>
