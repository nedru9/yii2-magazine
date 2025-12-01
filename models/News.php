<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $title Название
 * @property string $content Описание
 * @property string $status Статус
 * @property string $categoryId Id категории
 */
class News extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['title', 'content', 'status', 'categoryId'], 'required'],
            [['status'], 'boolean', 'default', 'value' => true],
            [['categoryId'], 'integer'],
            [['content'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'content' => 'Описание',
            'status' => 'Статус',
            'categoryId' => 'Id категории',
        ];
    }

    /**
     * Получение категории
     *
     * @return ActiveQuery
     *
     * @see category
     */
    public function getCategory(): ActiveQuery
    {
        return $this->hasOne(CategoryNews::class, ['id' => 'categoryId']);
    }
}
