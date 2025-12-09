<?php

namespace app\models;

use app\exceptions\ExceptionFactory;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $title Название
 * @property string $content Описание
 * @property string $status Статус
 * @property string|null $image Изображение
 * @property string $categoryId Id категории
 *
 * @property CategoryNews $category Категория
 */
class News extends ActiveRecord
{
    public $imageFile;

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
            [['image'], 'default', 'value' => null],
            [['title', 'content', 'status', 'categoryId'], 'required'],
            [['status'], 'boolean', 'default', 'value' => true],
            [['categoryId'], 'integer'],
            [['content'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'extensions' => 'png, jpg, jpeg', 'maxSize' => 5 * 1024 * 1024],
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

    /**
     * Поиск новости по Id
     *
     * @param int $id
     *
     * @return self
     */
    public static function getNew(int $id): self
    {
        $new = self::findOne($id);

        if (empty($new)) {
            throw ExceptionFactory::entityException('Новость не найден');
        }

        return $new;
    }
}
