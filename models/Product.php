<?php

namespace app\models;

use app\exceptions\ExceptionFactory;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int|null $categoryId Id категории
 * @property string $title Название
 * @property float $price Цена
 * @property string|null $description Описание
 * @property string|null $image Изображение
 * @property int|null $status Статус
 * @property int $count Количество
 *
 * @property Category $category Категория
 */
class Product extends ActiveRecord
{
    use UploadImageTrait;

    public $imageFile;

    public const string DIR_IMAGE = 'products';

    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['categoryId', 'description', 'image'], 'default', 'value' => null],
            [['status'], 'default', 'value' => true],
            [['categoryId', 'count'], 'integer'],
            [['status'], 'boolean'],
            [['title', 'price'], 'required'],
            [['price'], 'number'],
            [['description'], 'string'],
            [['title', 'image'], 'string', 'max' => 255],
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
            'categoryId' => 'Категория',
            'title' => 'Название',
            'price' => 'Цена',
            'description' => 'Описание',
            'image' => 'Изображение',
            'status' => 'Статус',
            'count' => 'Количество',
            'imageFile' => 'Изображение',
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
        return $this->hasOne(Category::class, ['id' => 'categoryId']);
    }

    /**
     * Поиск товара по Id
     *
     * @param int $id
     *
     * @return Product
     */
    public static function getProduct(int $id): Product
    {
        $product = self::findOne($id);

        if (empty($product)) {
            throw ExceptionFactory::entityException('Товар не найден');
        }

        return $product;
    }
}
