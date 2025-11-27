<?php

namespace app\models;

use app\exceptions\ExceptionFactory;
use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

use function PHPUnit\Framework\throwException;

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
 *
 * @property Category $category Категория
 */
class Product extends ActiveRecord
{
    public $imageFile;


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
            [['category_id', 'description', 'image'], 'default', 'value' => null],
            [['status'], 'default', 'value' => 1],
            [['category_id', 'status'], 'integer'],
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
            'category_id' => 'Id категории',
            'title' => 'Название',
            'price' => 'Цена',
            'description' => 'Описание',
            'image' => 'Изображение',
            'status' => 'Статус',
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
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * Сохранение изображения товара
     *
     * @return bool
     */
    public function uploadImage(): bool
    {
        if (empty($this->imageFile)) {
            return false;
        }

        $fileName = uniqid() . '.' . $this->imageFile->extension;
        $uploadPath = Yii::getAlias('@upload');
        $filePath = $uploadPath . DIRECTORY_SEPARATOR . $fileName;

        if ($this->imageFile->saveAs($filePath)) {
            if (!empty($this->image)) {
                $oldFile = $uploadPath . DIRECTORY_SEPARATOR . $this->image;

                if (file_exists($oldFile)) {
                    @unlink($oldFile);
                }
            }

            $this->image = '/upload/' . $fileName;

            return true;
        }

        return false;
    }


    /**
     * Поиск товара по Id
     *
     * @param int|null $id
     *
     * @return Product
     */
    public static function getProduct(?int $id): Product
    {
        if ($id === null) {
            throw  ExceptionFactory::entityException('Не задан Id товара');
        }

        $product = self::findOne($id);

        if (empty($product)) {
            throw  ExceptionFactory::entityException('Товар не найден');
        }

        return $product;
    }

}
