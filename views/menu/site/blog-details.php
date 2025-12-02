<?php

use app\models\News;

/* @var News $new ; */
$this->title = $new->title;
$this->params['breadcrumbs'][] = ['url' => '/site/blog', 'label' => 'Блог'];
$this->params['breadcrumbs'][] = ['url' => '/site/blog?categoryId='.$new->categoryId, 'label' => $new->category->title];
$this->params['breadcrumbs'][] = $this->title;
?>

<!--==============================
        Blog Area
    ==============================-->
<section class="th-blog-wrapper blog-details space-top space-extra-bottom">
    <div class="container">
        <div class="row">
            <div class="col-xxl-12 col-lg-12">
                <div class="th-blog blog-single">
                    <div class="blog-img">
                        <img class="w-100" src="<?= $new->image; ?>" alt="<?= $new->title; ?>">
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <a href="blog.php">
                                <i class="far fa-calendar"></i>
                                <?= Yii::$app->formatter->asDate($new->date); ?>
                            </a>
                        </div>
                        <h2 class="blog-title"><?= $new->title; ?></h2>
                        <p><?= $new->content; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
