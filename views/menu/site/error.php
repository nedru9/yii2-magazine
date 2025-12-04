<?php

/** @var yii\web\View $this */
/** @var errorHandler $errorHandler */

use yii\web\ErrorHandler;

$this->title = 'Ошибка';
$this->params['breadcrumbs'][] = $this->title;

?>


<div class="container">
    <h1>Ошибка</h1>
    <p><?= Yii::$app->errorHandler->exception->getMessage(); ?></p>
    <a class="btn btn-primary" href="/">Вернуться на главную</a>
</div>




