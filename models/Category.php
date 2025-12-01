<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property int|null $parent_id id категории (для подкатегорий)
 * @property string $title Название
 * @property string|null $description Описание
 * @property int|null $status Статус
 */
class Category extends ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['parent_id', 'description'], 'default', 'value' => null],
            [['status'], 'default', 'value' => 1],
            [['parent_id', 'status'], 'integer'],
            [['title'], 'required'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'parent_id' => 'id категории (для подкатегорий)',
            'title' => 'Название',
            'description' => 'Описание',
            'status' => 'Статус',
        ];
    }

    public static function getList(): array
    {
        $categories = self::find()->all();

        return ArrayHelper::map($categories, 'id', 'title');
    }

    /**
     * Получение категории
     *
     * @param int $categoryId
     *
     * @return self|null
     */
    public static function getCategory(int $categoryId): ?self
    {
        return self::find()->where(['id' => $categoryId])->one();
    }
}
