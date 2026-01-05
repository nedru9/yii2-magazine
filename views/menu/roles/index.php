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

$this->title = 'Список ролей';
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
        <div class="mb-5">
            <a href="/roles/create" class="btn btn-primary">Создать роль</a>
        </div>
        <?php
        if (!empty($dataProvider->models)): ?>
            <table>
                <thead>
                <tr>
                    <th>Наименование</th>
                    <th>Описание</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($dataProvider->models as $role): ?>
                    <tr>
                        <td><?= $role->name; ?></td>
                        <td><?= $role->description; ?></td>
                        <td>
                            <a href="/roles/create?id=<?= $role->name; ?>"><i class="fa-regular fa-edit"></i></a>
                            <a href="/roles/delete?id=<?= $role->name; ?>"><i class="fa-regular fa-trash"></i></a></td>
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
            Нет ролей
        <?php
        endif; ?>
    </div>
</section>
