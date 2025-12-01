<?php

use app\models\Category;
use yii\data\ActiveDataProvider;
use yii\widgets\LinkPager;

/* @var ActiveDataProvider $dataProvider; */
/* @var Category|null $category; */

$pages = $dataProvider->getPagination();
$sort = $dataProvider->sort;
$start = $pages->offset + 1;
$end = $pages->offset + $pages->limit;

if ($end > $pages->totalCount) {
    $end = $pages->totalCount;
}


$this->title = 'Товары';
$this->params['breadcrumbs'][] = [
    'label' => $this->title,
    'url' => ['/site/shop'],
];

if (!empty($category)) {
    $this->params['breadcrumbs'][] = [
        'label' => $category->title,
    ];
}

?>
<!--==============================
Product Area
==============================-->
<section class="space-top space-extra-bottom">
    <div class="container">
        <div class="th-sort-bar">
            <div class="row justify-content-between align-items-center">
                <div class="col-md">
                    <p class="woocommerce-result-count">Отображено <?= $start; ?>–<?= $end ?> из <?= $pages->totalCount; ?></p>
                </div>

                <div class="col-md-auto">
                    <form class="woocommerce-ordering" method="get">
                        <form method="get">
                            <input type="hidden" name="categoryId" value="<?= Yii::$app->request->get('categoryId') ?>">

                            <label>
                                <select class="orderby" name="sort" onchange="this.form.submit()">
                                    <option value="">Сортировка</option>
                                    <option value="price" <?= Yii::$app->request->get('sort')=='price'?'selected':'' ?>>Цена ↑</option>
                                    <option value="-price" <?= Yii::$app->request->get('sort')=='-price'?'selected':'' ?>>Цена ↓</option>
                                    <option value="title" <?= Yii::$app->request->get('sort')=='title'?'selected':'' ?>>Название ↑</option>
                                    <option value="-title" <?= Yii::$app->request->get('sort')=='-title'?'selected':'' ?>>Название ↓</option>
                                </select>
                            </label>
                        </form>
                    </form>
                </div>
            </div>
        </div>
        <div class="row gy-40">
        <?php foreach ($dataProvider->models as $product): ?>
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="th-product product-grid">
                    <div class="product-img">
                        <img src="<?= !empty($product->image) ? $product->image :  Yii::getAlias('@web').'/img/no-photo.png'; ?>" alt="<?= $product->title; ?>">
                        <div class="actions">
                            <a href="cart.php" class="icon-btn"><i class="far fa-cart-plus"></i></a>
                            <a href="wishlist.php" class="icon-btn"><i class="far fa-heart"></i></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <a href="shop-details.php" class="product-category"><?= !empty($product->category->title) ? $product->category->title : 'Отсутствует'; ?></a>
                        <h3 class="product-title"><a href="shop-details.php"><?= $product->title; ?></a></h3>
                        <span class="price"><?= $product->price; ?>₽</span>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>


        <div class="th-pagination text-center pt-50">

            <?= LinkPager::widget([
            'pagination' => $pages,
            ]); ?>

<!--            <ul>-->
<!--                <li><a href="blog.php">1</a></li>-->
<!--                <li><a href="blog.php">2</a></li>-->
<!--                <li><a href="blog.php">3</a></li>-->
<!--                <li><a href="blog.php"><i class="far fa-arrow-right"></i></a></li>-->
<!--            </ul>-->
        </div>
    </div>
</section>
