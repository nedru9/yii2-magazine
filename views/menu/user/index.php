<?php

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

$this->title = 'Пользователи';
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
                    <th>ID</th>
                    <th>Email</th>
                    <th>Роль</th>
                    <th>Действие</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($dataProvider->models as $user): ?>
                    <tr>
                        <td><?= $user->id; ?></td>
                        <td><?= $user->email; ?></td>
                        <td><?= !empty($user->getRoleForUser()) ? $user->getRoleForUser()->description : '-'; ?></td>
                        <td>
                            <a href="/user/login-user?id=<?= $user->id; ?>"><i class="fa-regular fa-sign-out-alt"></i></a>
                            <a href="/user/edit?id=<?= $user->id; ?>"><i class="fa-regular fa-edit"></i></a>
                            <a href="/user/delete?id=<?= $user->id; ?>"><i class="fa-regular fa-trash"></i></a></td>
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
            Нет пользователей
        <?php
        endif; ?>
    </div>
</section>
