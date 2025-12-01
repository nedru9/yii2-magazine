<?php

use app\models\CategoryNews;
use yii\data\ActiveDataProvider;
use yii\widgets\LinkPager;

/* @var ActiveDataProvider $dataProvider ; */
/* @var CategoryNews[] $categories ; */
/* @var CategoryNews|null $category ; */

$pages = $dataProvider->getPagination();
$start = $pages->offset + 1;
$end = $pages->offset + $pages->limit;

if ($end > $pages->totalCount) {
    $end = $pages->totalCount;
}

$this->title = 'Блог';
$this->params['breadcrumbs'][] = [
    'label' => $this->title,
    'url' => ['/site/blog'],
];

if (!empty($category)) {
    $this->params['breadcrumbs'][] = [
        'label' => $category->title,
    ];
}
?>

<!--==============================
Blog Area
==============================-->
<section class="th-blog-wrapper space-top space-extra-bottom">
    <div class="container">
        <div class="row">
            <div class="col-xxl-8 col-lg-7">
                <?php
                if (!empty($dataProvider->models)): ?>
                    <?php
                    foreach ($dataProvider->models as $new): ?>
                        <div class="th-blog blog-single has-post-thumbnail">
                            <div class="blog-img">
                                <a href="blog-details.php"><img class="w-100" src="<?= $new->image; ?>"
                                                                alt="<?= $new->title; ?>"></a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <a href="/site/blog-details?id=<?= $new->id; ?>"><i
                                                class="far fa-calendar"></i><?= Yii::$app->formatter->asDate(
                                            $new->date
                                        ); ?></a>
                                </div>
                                <h2 class="blog-title"><a
                                            href="/site/blog-details?id=<?= $new->id; ?>"><?= $new->title; ?></a>
                                </h2>
                                <p class="blog-text"><?= $new->content; ?></p>
                                <a href="/site/blog-details?id=<?= $new->id; ?>" class="th-btn btn-sm">Читать больше<i
                                            class="fas fa-chevrons-right ms-2"></i></a>
                            </div>
                        </div>
                    <?php
                    endforeach; ?>
                    <div class="th-pagination text-center">
                        <?= LinkPager::widget([
                            'pagination' => $pages,
                        ]); ?>
                    </div>
                <?php
                else: ?>
                    Новостей нет
                <?php
                endif; ?>
            </div>
            <div class="col-xxl-4 col-lg-5">
                <aside class="sidebar-area">
                    <div class="widget widget_categories  ">
                        <h3 class="widget_title">Категории</h3>
                        <ul>
                            <?php
                            if (!empty($categories)): ?>
                                <?php
                                foreach ($categories as $categoryId => $categoryTitle): ?>
                                    <li>
                                        <a href="/site/blog?categoryId=<?= $categoryId; ?>"><?= $categoryTitle; ?></a>
                                    </li>
                                <?php
                                endforeach; ?>
                            <?php
                            else: ?>
                                Нет категорий
                            <?php
                            endif; ?>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>
