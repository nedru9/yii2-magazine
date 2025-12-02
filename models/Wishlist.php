<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Exception;

/**
 * This is the model class for table "wishlist".
 *
 * @property int $id
 * @property int $productId Id товара
 * @property int $userId Id пользователя
 */
class Wishlist extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'wishlist';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['productId', 'userId'], 'required'],
            [['productId', 'userId'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'productId' => 'Id товара',
            'userId' => 'Id пользователя',
        ];
    }

    /**
     * @param int $productId
     *
     * @return self|null
     */
    public static function findFavorite(int $productId): self|null
    {
        return self::findOne([
            'productId' => $productId,
//            'userId' => Yii::$app->user->id
            'userId' => 1
        ]);
    }

    /**
     * @param int $productId
     * @return bool
     *
     * @throws Exception
     */
    public static function addFavorite(int $productId): bool
    {
        $favorite = new self([
            'productId' => $productId,
//            'userId' => Yii::$app->user->id
        'userId' => 1
        ]);

        return $favorite->save();
    }

    /**
     * @return bool
     */
    public function delete(): bool
    {
        try {
            parent::delete();
        } catch (\Throwable) {
            return false;
        }

        return true;
    }
}
