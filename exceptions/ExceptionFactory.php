<?php

namespace app\exceptions;

use app\log\ExceptionEntity;
use Yii;
use yii\web\HttpException;

/**
 * @method static paymentException($message = '', $previous = null)
 * @method static paymentControlException($message = '', $previous = null)
 * @method static connectionException($message = '', $previous = null)
 * @method static bitrixException($message = '', $previous = null)
 * @method static printException($message = '', $previous = null)
 * @method static entityException($message = '', $previous = null)
 * @method static fileException($message = '', $previous = null)
 */
class ExceptionFactory
{
    private const BASE_CODE = 0;
    private const BASE_MESSAGE = 'Exception %S не поддерживается ';
    private const ERROR_STATUS = 404;

    /**
     * <exceptionName> => ['code' => <code>, 'baseMessage' => <message>, 'status' => <status>],
     */
    public const EXCEPTIONS = [
        'paymentException' => ['code' => 21, 'baseMessage' => 'Ошибка оплаты', 'status' => 503],
        'paymentControlException' => ['code' => 22, 'baseMessage' => 'Заказ на оплату не найден', 'status' => 404],
        'connectionException' => ['code' => 10, 'baseMessage' => 'Неверный тип подключения', 'status' => 503],
        'bitrixException' => ['code' => 71, 'baseMessage' => 'Ошибка при работе с api Bitrix', 'status' => 503],
        'printException' => ['code' => 71, 'baseMessage' => 'Ошибка печати', 'status' => 503],
        'mortgageOrder' => ['code' => 71, 'baseMessage' => 'Ошибка ипотеки', 'status' => 503],
        'entityException' => ['code' => 7, 'baseMessage' => 'Ошибка при загрузке сущности', 'status' => 503],
        'localApiException' => ['code' => 7, 'baseMessage' => 'Ошибка при работе API', 'status' => 503],
        'fileException' => ['code' => 7, 'baseMessage' => 'Ошибка при загрузке файла', 'status' => 503],
        'oracleApiException' => ['code' => 7, 'baseMessage' => 'Ошибка API ORACLE', 'status' => 503],
        'policyException' => ['code' => 1, 'baseMessage' => 'Ошибка при работе с полисом', 'status' => 503],
    ];

    /**
     * Обработка статически вызываемых ошибок
     *
     * Вызов - throw ExceptionFactory::<Название ошибки(описывается в @method)>(<сообщение ошибки(необязательно)>');
     *
     * @param string $exceptionName
     * @param array $arguments
     *
     * @return HttpException
     */
    public static function __callStatic(string $exceptionName, array $arguments): HttpException
    {
        if (!isset(static::EXCEPTIONS['paymentException'])) {
            return new HttpException(self::ERROR_STATUS, static::getBaseMessage($exceptionName), static::BASE_CODE);
        }

        $exception = new ExceptionEntity($exceptionName, $arguments);
        $exception->logException();

        return new HttpException(
            $exception->status,
            $exception->message,
            $exception->code,
            $exception->previous
        );
    }

    /**
     * @param string $exceptionName
     *
     * @return string
     */
    private static function getBaseMessage(string $exceptionName): string
    {
        return sprintf(static::BASE_MESSAGE, $exceptionName);
    }
}
