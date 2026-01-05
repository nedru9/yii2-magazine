<?php
/** @var AuthItem $role */

use app\models\rbac\AuthItem;
use kartik\select2\Select2;
use yii\bootstrap\Html;
use yii\widgets\ActiveForm;

if ($role->name !== null) {
    $this->title = 'Изменение роли';
} else {
    $this->title = 'Создание роли';
}
?>

<div class="container">
    <h1><?= $this->title; ?></h1>
    <?php
    $form = ActiveForm::begin(
        [
            'id' => 'create-role-form',
        ]
    );
    ?>
    <?= $form->field($role, 'name')->textInput(); ?>
    <?= $form->field($role, 'description')->textInput(); ?>
    <?= $form->field($role, 'type')->widget(Select2::class, [
        'data' => AuthItem::getList(),
        'pluginOptions' => [
            'allowClear' => true,
            'minimumResultsForSearch' => 'Infinity',
        ],
    ]); ?>
    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']); ?>
    <?php
    ActiveForm::end(); ?>
</div>
