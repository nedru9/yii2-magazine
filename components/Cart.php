<?php

namespace app\components;

use app\models\Product;
use Yii;
use yii\base\Component;

class Cart extends Component
{
    const string SESSION_KEY = 'cart';
    const string SESSION_KEY_PRODUCTS = 'products';

    /**
     * Получение всей корзины
     *
     * @return array
     */
    public function getCart(): array
    {
        return Yii::$app->session->get(self::SESSION_KEY, [
            self::SESSION_KEY_PRODUCTS => [],
            'total' => 0,
        ]);
    }

    /**
     * Получение списка товаров
     *
     * @return array
     */
    public function getProducts(): array
    {
        $cart = $this->getCart();

        return $cart[self::SESSION_KEY_PRODUCTS] ?? [];
    }

    /**
     * Есть ли товары
     *
     * @return bool
     */
    public function hasProducts(): bool
    {
        return !empty($this->getProducts());
    }

    /**
     * Добавление товара в корзину
     *
     * @param Product $product
     * @param int $count
     *
     * @return void
     */
    public function add(Product $product, int $count = 1): void
    {
        $available = $product->count;

        if ($available <= 0) {
            $this->remove($product->id);
            return;
        }

        if ($count < 1) {
            $count = 1;
        }

        $cart = $this->getCart();
        $products = $cart[self::SESSION_KEY_PRODUCTS];
        $currentCount = $products[$product->id]['count'] ?? 0;
        $newCount = $currentCount + $count;

        if ($newCount > $available) {
            $newCount = $available;
        }

        $products[$product->id] = [
            'id' => $product->id,
            'name' => $product->title,
            'price' => $product->price,
            'image' => $product->image,
            'count' => $newCount,
            'max' => $available,
            'total' => $product->price * $newCount
        ];

        $cart[self::SESSION_KEY_PRODUCTS] = $products;
        $cart['total'] = $this->calculateTotal($products);

        Yii::$app->session->set(self::SESSION_KEY, $cart);
    }

    /**
     * Обновление количества товара
     *
     * @param int $productId
     * @param int $count
     *
     * @return void
     */
    public function updateCount(int $productId, int $count): void
    {
        if ($count < 1) {
            $count = 1;
        }

        $cart = $this->getCart();
        $products = $cart[self::SESSION_KEY_PRODUCTS];

        if (!isset($products[$productId])) {
            return;
        }

        $products[$productId]['count'] = $count;
        $products[$productId]['total'] = $products[$productId]['price'] * $count;

        $cart[self::SESSION_KEY_PRODUCTS] = $products;
        $cart['total'] = $this->calculateTotal($products);

        Yii::$app->session->set(self::SESSION_KEY, $cart);
    }

    /**
     * Удаление товара из корзины
     *
     * @param int $productId
     *
     * @return void
     */
    public function remove(int $productId): void
    {
        $cart = $this->getCart();
        $products = $cart[self::SESSION_KEY_PRODUCTS];

        if (isset($products[$productId])) {
            unset($products[$productId]);
        }

        $cart[self::SESSION_KEY_PRODUCTS] = $products;
        $cart['total'] = $this->calculateTotal($products);

        Yii::$app->session->set(self::SESSION_KEY, $cart);
    }

    /**
     * Очистка корзины
     *
     * @return void
     */
    public function clear(): void
    {
        Yii::$app->session->remove(self::SESSION_KEY);
    }

    /**
     * Подсчет общего количества товаров
     *
     * @return int
     */
    public function getTotalCount(): int
    {
        $products = $this->getProducts();

        return array_sum(array_column($products, 'count'));
    }

    /**
     * Итоговая сумма корзины
     *
     * @return int|float
     */
    public function getTotalSum(): int|float
    {
        $products = $this->getProducts();

        return $this->calculateTotal($products);
    }

    /**
     * Подсчет суммы
     *
     * @param array $products
     *
     * @return int|float
     */
    private function calculateTotal(array $products): int|float
    {
        $total = 0;

        foreach ($products as $item) {
            $total += $item['price'] * $item['count'];
        }

        return $total;
    }
}
