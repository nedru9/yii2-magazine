<?php

namespace app\models;

use app\components\Cart;
use app\enums\PaymentMethod;
use app\enums\Status;
use app\exceptions\ExceptionFactory;
use Exception;
use Yii;
use yii\base\Model;

/**
 * @property string fullName  Полное имя
 */
class OrderForm extends Model
{
    public ?string $firstName = '';
    public ?string $lastName = '';
    public ?string $address = '';
    public ?string $email = '';
    public ?string $phone = '';
    public ?int $paymentMethod = null;

    /**
     * @return string[]
     */
    public function attributeLabels(): array
    {
        return [
            'firstName' => 'Имя',
            'lastName' => 'Фамилия',
            'address' => 'Адрес',
            'email' => 'Email',
            'phone' => 'Номер телефона',
            'paymentMethod' => 'Способ оплаты',
        ];
    }

    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            [['firstName', 'lastName', 'address', 'email', 'phone', 'paymentMethod'], 'required'],
            [['firstName', 'lastName', 'address', 'email', 'phone'], 'string'],
            [['paymentMethod'], 'integer'],
            [
                'paymentMethod',
                'in',
                'range' => array_keys(PaymentMethod::list()),
            ],
            ['email', 'email'],
            ['phone', 'match', 'pattern' => '/^(\+7|7|8)\d{10}$/', 'message' => 'Введите корректный номер телефона РФ'],
        ];
    }

    /**
     * Получение полного имени
     *
     * @return string
     *
     * @see fullName
     */
    public function getFullName(): string
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    /**
     * Сохранение заказа
     *
     * @param Cart $cart
     *
     * @return false|int
     */
    public function saveFullOrder(Cart $cart): false|int
    {
        $transaction = Yii::$app->db->beginTransaction();

        try {
            $order = new Order();
            $order->name = $this->fullName;
            $order->phone = $this->phone;
            $order->email = $this->email;
            $order->address = $this->address;
            $order->total = $cart->getTotalSum();
            $order->status = Status::NEW->value;

            if ($order->save() === false) {
                throw ExceptionFactory::entityException('Ошибка сохранения заказа');
            }

            if ($this->saveCart($cart, $order->id) === false) {
                throw ExceptionFactory::entityException('Ошибка сохранения корзины');
            }

            $transaction->commit();
            $cart->clear();

            return $order->id;
        } catch (Exception) {
            $transaction->rollBack();

            return false;
        }
    }

    /**
     * Сохранение корзины
     *
     * @param Cart $cart
     * @param int $orderId
     *
     * @return bool
     *
     * @throws \yii\db\Exception
     */
    public function saveCart(Cart $cart, int $orderId): bool
    {
        foreach ($cart->getProducts() as $product) {
            $orderItem = new OrderItem();
            $orderItem->orderId = $orderId;
            $orderItem->productId = $product['id'];
            $orderItem->price = $product['price'];
            $orderItem->count = $product['count'];
            $orderItem->total = $product['total'];

            if ($orderItem->save() === false) {
                return false;
            }
        }

        return true;
    }
}
