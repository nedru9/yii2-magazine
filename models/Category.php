<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property int|null $parentId id категории (для подкатегорий)
 * @property string $title Название
 * @property string|null $description Описание
 * @property string|null $image Изображение
 * @property int|null $status Статус
 */
class Category extends ActiveRecord
{
    use UploadImageTrait;

    public $imageFile;

    public const string DIR_IMAGE = 'categories';

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

            [['parentId', 'description'], 'default', 'value' => null],
            [['status'], 'default', 'value' => 1],
            [['parentId', 'status'], 'integer'],
            [['title'], 'required'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 255],
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
            'parentId' => 'Категория',
            'title' => 'Название',
            'description' => 'Описание',
            'status' => 'Статус',
            'imageFile' => 'Изображение',
        ];
    }

    /**
     * Получение списка категорий
     *
     * @return array
     */
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
