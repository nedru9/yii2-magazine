<?php
/** @var Product $product */

use app\models\Category;
use app\models\Product;
use kartik\select2\Select2;
use yii\bootstrap\Html;
use yii\widgets\ActiveForm;

if ($product->id !== null) {
    $this->title = 'Изменение товара';
} else {
    $this->title = 'Создание товара';
}
?>

<div class="container">
    <h1><?= $this->title; ?></h1>
    <?php
    $form = ActiveForm::begin(
        [
            'id' => 'create-product-form',
            'options' => ['enctype' => 'multipart/form-data']
        ]
    );
    ?>
    <?= $form->field($product, 'title')->textInput(); ?>
    <?= $form->field($product, 'price')->textInput(['type' => 'number']); ?>
    <?= $form->field($product, 'description')->textInput(); ?>
    <?= $form->field($product, 'count')->textInput(['type' => 'number']); ?>
    <?= $form->field($product, 'categoryId')->widget(Select2::class, [
        'data' => Category::getList(),
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ]); ?>
    <?= $form->field($product, 'imageFile')->fileInput(); ?>

    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']); ?>
    <?php
    ActiveForm::end(); ?>
</div>
