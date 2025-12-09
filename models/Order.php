<?php

namespace app\models;

use app\exceptions\ExceptionFactory;
use DateTime;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property string $name ФИО
 * @property string $phone Номер телефона
 * @property string $email Email
 * @property string $address Адрес
 * @property double $total Сумма
 * @property int $status Статус
 * @property string $dateCreate Дата создания
 *
 * @property OrderItem[] $items Позиции в заказе
 */
class Order extends ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['name', 'phone', 'email', 'address', 'total', 'status'], 'required'],
            [['comment', 'address'], 'string'],
            [['name', 'phone', 'email'], 'string', 'max' => 255],
            [['email'], 'email'],
            [['total'], 'number'],
            [['status'], 'integer'],
            [['dateCreate'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'name' => 'ФИО',
            'phone' => 'Номер телефона',
            'email' => 'Email',
            'address' => 'Адрес',
            'total' => 'Сумма',
            'status' => 'Статус',
            'dateCreate' => 'Дата создания',
        ];
    }

    /**
     * @param $insert
     * @return bool
     */
    public function beforeSave($insert): bool
    {
        if ($insert) {
            $this->dateCreate = new DateTime()->format('Y-m-d');
        }

        return parent::beforeSave($insert);
    }

    /**
     * @return ActiveQuery
     *
     * @see items
     */
    public function getItems(): ActiveQuery
    {
        return $this->hasMany(OrderItem::class, ['orderId' => 'id']);
    }
}
