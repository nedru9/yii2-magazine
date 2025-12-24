<?php

namespace app\entities;

use Yii;
use yii\web\Cookie;

class Favorite
{
    /**
     * Проверка, находится ли товар в избранном
     *
     * @param int $productId
     * @param $request
     *
     * @return bool
     */
    public static function isFavorite(int $productId, $request = null): bool
    {
        if ($request === null) {
            $request = Yii::$app->request;
        }

        return in_array($productId, self::getFavorites($request));
    }

    /**
     * Переключение состояния товара в избранном
     *
     * @param int $productId
     * @param $response
     *
     * @return void
     */
    public static function toggleFavorite(int $productId, $response): void
    {
        if (self::isFavorite($productId, Yii::$app->request)) {
            self::removeFromFavorites($productId);
        } else {
            self::addToFavorites($productId);
        }
    }

    /**
     * Получение списка избранных товаров
     *
     * @param $request
     *
     * @return array
     */
    public static function getFavorites($request = null): array
    {
        if ($request === null) {
            $request = Yii::$app->request;
        }

        $favorites = $request->cookies->getValue('favorites', '[]');

        return json_decode($favorites, true) ?: [];
    }

    /**
     * Добавление товара в избранное
     *
     * @param int $productId
     *
     * @return void
     */
    protected static function addToFavorites(int $productId): void
    {
        $favorites = self::getFavorites();

        if (!in_array($productId, $favorites)) {
            $favorites[] = $productId;
            self::editFavorites($favorites);
        }
    }

    /**
     * Удаление товара из избранного
     *
     * @param int $productId
     *
     * @return void
     */
    public static function removeFromFavorites(int $productId): void
    {
        $favorites = self::getFavorites();
        $favorites = array_filter($favorites, fn($id) => $id !== $productId);
        self::editFavorites(array_values($favorites));
    }

    /**
     * Изменение списка избранного
     *
     * @param array $favorites
     *
     * @return void
     */
    private static function editFavorites(array $favorites): void
    {
        $cookie = new Cookie([
            'name' => 'favorites',
            'value' => json_encode($favorites),
            'expire' => time() + 86400 * 30,
        ]);
        Yii::$app->response->cookies->add($cookie);
    }
}
