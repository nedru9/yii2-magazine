<?php

namespace app\helpers\base;

use Exception;
use yii\helpers\Json;

class JsonHelper
{
    /**
     * @param string $needle
     *
     * @return string
     */
    public static function prettyJsonPrint(string $needle): string
    {
        $array = json_decode($needle, true);

        if (is_array($array)) {
            return sprintf('<pre>%s</pre>', json_encode($array, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE));
        }

        return $needle;
    }

    /**
     * @param string $jsonString
     *
     * @return bool
     */
    public static function isJsonValid(mixed $jsonString): bool
    {
        json_decode($jsonString);

        return json_last_error() === JSON_ERROR_NONE;
    }

    /**
     * @param mixed $string
     *
     * @return bool
     */
    public static function isJson(mixed $string): bool
    {
        try {
            $result = Json::decode($string);
        } catch (Exception) {
            return false;
        }

        return $result !== null;
    }
}
