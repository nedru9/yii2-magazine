<?php

namespace app\helpers\base;

use app\exceptions\ExceptionFactory;
use JetBrains\PhpStorm\NoReturn;
use yii\base\DynamicModel;
use yii\base\InvalidConfigException;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\helpers\Json;
use yii\web\HttpException;
use yii\validators\DefaultValueValidator;

class BaseHelper
{

    /**
     * @param mixed $data
     *
     * @return void
     */
    #[NoReturn] public static function prettyDataExport(mixed $data): void
    {
        echo '<pre>' . var_export($data, true) . '</pre>'; exit();
    }

    /**
     * @param mixed $amount
     * @param string $currency
     *
     * @return string
     */
    public static function displayAmountString(float $amount, string $currency = ''): string
    {
        $decimals = self::hasAfterPoint($amount) ? 2 : 0;
        return number_format($amount, $decimals, ',', ' ') . $currency;
    }

    /**
     * @param string $searchString
     *
     * @return float
     */
    public static function stringToFloat(string $searchString): float
    {
        $searchString = str_replace(',', '.', $searchString);

        return floatval($searchString);
    }


    /**
     * Получение числа после запятой
     *
     * @param mixed $amount
     *
     * @return int
     */
    public static function afterPointFromNumber(mixed $amount): int
    {
        $amountString = (string)$amount;
        $amountString = str_replace(',', '.', $amountString);
        $amountArray = explode('.', $amountString);

        return $amountArray[1] ?? 0;
    }

    /**
     * Целое значение из дробного числа
     *
     * @param mixed $amount
     *
     * @return int
     */
    public static function integerFromNumber(mixed $amount): int
    {
        return round(self::toFloat($amount), PHP_ROUND_HALF_DOWN);
    }

    /**
     * @param mixed $search
     *
     * @return float
     */
    public static function toFloat(mixed $search): float
    {
        if (is_string($search)) {
            $floatNum = self::stringToFloat($search);
        } elseif (is_integer($search)) {
            $floatNum = (floatval($search));
        } else {
            $floatNum = $search;
        }

        return $floatNum;
    }

    /**
     * Есть ли числа после запятой
     *
     * @param float $amount
     *
     * @return bool
     */
    public static function hasAfterPoint(float $amount): bool
    {
        $amountString = (string)$amount;
        $amountArray = explode('.', $amountString);

        return isset($amountArray[1]);
    }

    /**
     * @param array $array
     *
     * @return array
     */
    public static function cleanEmptyArray(array $array): array
    {
        foreach ($array as $key => $value) {
            if (empty($value)) {
                unset($array[$key]);
            }
        }

        return $array;
    }

    /**
     * Приводит "12,34 руб" к числу
     *
     * @param string $amount
     *
     * @return string
     */
    public static function cleanAmountString(string $amount): string
    {
        return self::toFloat(str_replace([' ', 'руб', 'usd'], '', $amount));
    }

    /**
     * @param string $fio
     *
     * @return array
     */
    public static function divideFullFIOToArray(string $fio): array
    {
        $fioArray = explode(' ',  $fio);

        return [
            'surname' => $fioArray[0] ?? '',
            'name' => $fioArray[1] ?? '',
            'patronymic' => $fioArray[2] ?? '',
        ];
    }

    /**
     * Получение суммы в копейках
     *
     * @param float $amount
     *
     * @return int
     */
    public static function calcPennies(float $amount): int
    {
        return $amount * 100;
    }

    /**
     * Получение измененных параметров модели
     *
     * @param ActiveRecord $model
     *
     * @return array
     */
    public static function getModelChangedAttributes(ActiveRecord $model): array
    {
        $changedAttributes = [];

        foreach ($model->attributes as $attributeName => $attribute) {
            $newAttributeValue = $model->getAttribute($attributeName);
            $oldAttributeValue = $model->getOldAttribute($attributeName);

            if (is_array($newAttributeValue)) {
                $oldAttributeValue = Json::decode($oldAttributeValue);
            }

            if (is_string($oldAttributeValue)) {
                $oldAttributeValue = str_replace(' 00:00:00', '', $oldAttributeValue);
            }

            if ($newAttributeValue != $oldAttributeValue) {
                $changedAttributes[$model::tableName()][$attributeName] = [
                    'label' => $model->getAttributeLabel($attributeName),
                    'oldValue' => $oldAttributeValue,
                    'newValue' => $newAttributeValue,
                ];
            }
        }

        return $changedAttributes;
    }

    /**
     * @param string $string
     *
     * @return bool
     */
    public static function isJson(string $string): bool
    {
        return is_array(json_decode($string, true));
    }

    /**
     * @param array $paramsToValid
     * @param array $validateRules
     * @param bool $errorAsJson
     *
     * @return DynamicModel
     *
     * @throws InvalidConfigException
     * @throws HttpException
     */
    public static function dynamicValidate(
        array $paramsToValid,
        array $validateRules,
        bool  $errorAsJson = false
    ): DynamicModel
    {
        $model = DynamicModel::validateData($paramsToValid, $validateRules);

        if ($model->hasErrors()) {
            $exceptionMessage = $errorAsJson === true ? $model->errors : self::errorAsUl($model->errors);

            throw ExceptionFactory::entityException($exceptionMessage);
        }

        return $model;
    }

    /**
     * @param array $errors
     *
     * @return string
     */
    private static function errorAsUl(array $errors): string
    {
        $errorList = '';

        foreach ($errors as $attributeName => $attributeErrors) {
            foreach ($attributeErrors as $error) {
                $errorList .= sprintf('<li>%s - %s</li>', $attributeName, $error);
            }
        }

        if ($errorList !== '') {
            $errorList = sprintf('<ul>%s</ul>', $errorList);
        }

        return $errorList;
    }

    /**
     * @param object $model
     *
     * @return object
     */
    public static function cloneModel(object $model): object
    {
        $clonedModel = clone $model;

        $clonedModel->isNewRecord = true;
        $clonedModel->id = null;

        return $clonedModel;
    }

    /**
     * @param Model $model
     *
     * @return void
     */
    public static function loadModelDefaults(Model &$model): void
    {
        $validationRules = $model->validators->getIterator();

        for ($i = 1; $i <= $validationRules->count(); $i++) {
            $rule = $validationRules->current();

            if ($rule instanceof DefaultValueValidator) {
                foreach ($rule->attributes as $attribute) {
                    if (in_array($model->{$attribute}, [false, '', null, 0])) {
                        $model->{$attribute} = $rule->value;
                    }
                }
            }

            $validationRules->next();
        }
    }

    /**
     * Сравнение двух параметров
     *
     * @param string $oldValue
     * @param string $newValue
     *
     * @return bool
     */
    public static function hasChanged(string $newValue, string $oldValue): bool
    {
        return $newValue != $oldValue;
    }

    /**
     * @param string|array|null $value
     *
     * @return string
     */
    public static function formatAttributeValue(string|array|null $value): string
    {
        if (empty($value)) {
            return 'Пусто';
        }

        return is_array($value) ? Json::encode($value) : $value;
    }
}
