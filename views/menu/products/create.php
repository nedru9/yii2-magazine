<?php
/** @var Product $product */

use app\models\Category;
use app\models\Product;
use kartik\select2\Select2;
use yii\bootstrap\Html;
use yii\widgets\ActiveForm;

$this->title = 'Создание товара';

$form = ActiveForm::begin(
    [
        'id' => 'create-product-form',
        'action' => ['/products/create'],
        'options' => ['enctype' => 'multipart/form-data']
    ]
);

echo $form->field($product, 'title')->textInput();
echo $form->field($product, 'price')->textInput();
echo $form->field($product, 'description')->textInput();
echo $form->field($product, 'imageFile')->fileInput();
echo $form->field($product, 'categoryId')->widget(Select2::class, [
                    'data' => Category::getList(),
                ])->label(false);
echo Html::submitButton('Оформить');
ActiveForm::end();
