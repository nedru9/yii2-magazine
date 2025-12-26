<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;


/**
 * This is the model class for table "order_item".
 *
 * @property int $id
 * @property int $orderId Id заказа
 * @property int $productId Id товара
 * @property double $price Цена
 * @property int $count Количество
 * @property double $total Общая сумма
 *
 * @property Product $product Товар
 */
class OrderItem extends ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'order_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['orderId', 'productId', 'price', 'count', 'total'], 'required'],
            [['orderId', 'productId', 'count'], 'integer'],
            [['price', 'total'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'orderId' => 'Id заказа',
            'productId' => 'Id товара',
            'price' => 'Цена',
            'count' => 'Количество',
            'total' => 'Общая сумма',
        ];
    }

    /**
     * Получение товара
     *
     * @return ActiveQuery
     *
     * @see product
     */
    public function getProduct(): ActiveQuery
    {
        return $this->hasOne(Product::class, ['id' => 'productId']);
    }
}
