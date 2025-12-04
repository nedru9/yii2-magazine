<?php
/** @var Category $category */

use app\models\Category;
use kartik\select2\Select2;
use yii\bootstrap\Html;
use yii\widgets\ActiveForm;

if ($category->id !== null) {
    $this->title = 'Изменение категории';
} else {
    $this->title = 'Создание категории';
}
?>

<div class="container">
    <h1><?= $this->title; ?></h1>
    <?php
    $form = ActiveForm::begin(
        [
            'id' => 'create-category-form',
            'options' => ['enctype' => 'multipart/form-data']
        ]
    );
    ?>
    <?= $form->field($category, 'title')->textInput(); ?>
    <?= $form->field($category, 'description')->textInput(); ?>
    <?= $form->field($category, 'imageFile')->fileInput(); ?>
    <?= $form->field($category, 'parentId')->widget(Select2::class, [
        'data' => Category::getList(),
        'options' => [
            'placeholder' => 'Нет категории',
        ],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ]); ?>
    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']); ?>
    <?php
    ActiveForm::end(); ?>
</div>
