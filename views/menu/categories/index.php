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

$this->title = 'Категории';
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
        <div class="th-sort-bar">
            <div class="row justify-content-between align-items-center">
                <div class="col-md">
                    <a class="btn btn-primary" href="/categories/create">Создать категорию</a>
                </div>
            </div>
        </div>
        <?php
        if (!empty($dataProvider->models)): ?>
            <div class="row gy-40">
                <?php
                foreach ($dataProvider->models as $category): ?>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="th-product product-grid">
                            <div class="product-img">
                                <img src="<?= !empty($category->image) ? $category->image : Yii::getAlias(
                                        '@web'
                                    ) . '/img/no-photo.png'; ?>" alt="<?= $category->title; ?>">
                                <div class="actions">
                                    <a href="/categories/create?id=<?= $category->id; ?>" class="icon-btn"><i
                                                class="far fa-pen"></i></a>
                                    <a href="/categories/delete?id=<?= $category->id; ?>" class="icon-btn"><i
                                                class="far fa-trash"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3 class="product-title"><?= $category->title; ?>
                                </h3>
                            </div>
                        </div>
                    </div>
                <?php
                endforeach; ?>
            </div>


            <div class="th-pagination text-center pt-50">

                <?= LinkPager::widget([
                    'pagination' => $pages,
                ]); ?>
            </div>

        <?php
        else: ?>
            Нет категорий
        <?php
        endif; ?>
    </div>
</section>
