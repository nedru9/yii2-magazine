<?php

namespace app\helpers;

use app\helpers\base\JsonHelper;
use Exception;
use Yii;
use yii\base\InvalidRouteException;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\Response;

class WebResponse
{
    public const string DEFAULT_ERROR_MESSAGE = 'Ошибка сервера';

    /**
     * @param string|array $message
     * @param string|null $trace
     *
     * @return string
     */
    public static function ajaxError(
        string|array $message = self::DEFAULT_ERROR_MESSAGE,
        string $trace = null
    ): string
    {
        if (JsonHelper::isJson($message)) {
            $message = static::prepareModelValidationError($message);
        }

        return Json::encode(['message' => $message, 'error' => true, 'trace' => $trace]);
    }

    /**
     * @param Exception $exception
     *
     * @return string
     */
    public static function ajaxExceptionError(Exception $exception): string
    {
        return Json::encode([
            'message' => $exception->getMessage(),
            'error' => true,
            'trace' => $exception->getTraceAsString()
        ]);
    }

    /**
     * @param mixed $data
     * @param string $message
     *
     * @return string
     */
    public static function ajaxSuccess(mixed $data, string $message = ''): string
    {
        $response = [
            'data' => $data,
            'error' => false
        ];

        if ($message !== '') {
            $response['message'] = $message;
        }

        return Json::encode($response);
    }

    /**
     * @param string $message
     *
     * @return void
     */
    public static function setError(string $message): void
    {
        Yii::$app->session->setFlash('error', $message);
    }

    /**
     * @param string $message
     *
     * @return void
     */
    public static function setSuccess(string $message): void
    {
        Yii::$app->session->setFlash('success', $message);
    }

    /**
     * @param string $filePath
     *
     * @return string
     */
    public static function filePreview(string $filePath): string
    {
        $fileInfo = pathinfo($filePath);

        $webPath = Url::base(true) . Url::to("/upload/loaded/{$fileInfo['basename']}");

        return Yii::$app->controller->render('@app/views/menu/file-viewer/file-preview.php', [
            'realPath' => $filePath,
            'webPath' => $webPath,
            'ext' => $fileInfo['extension'],
            'baseName' => $fileInfo['basename'],
        ]);
    }

    /**
     * @param string $filePath
     *
     * @return string
     */
    public static function ajaxFilePreview(string $filePath): string
    {
        Yii::$app->session->set('agreementPreviewFilePath', $filePath);

        return static::ajaxSuccess([
            'redirect' => true,
            'url' => Url::to('/file-viewer/preview')
        ]);
    }

    /**
     * @param string|array $message
     *
     * @return string
     */
    public static function prepareModelValidationError(string|array $message): string
    {
        if (is_string($message)) {
            $errors = Json::decode($message);
        } else {
            $errors = $message;
        }


        if (static::isArrayModelValidation($errors)) {
            $formedMessage = '<ul>';

            foreach ($errors as $attributeName => $attribute) {
                foreach ($attribute as $errorNum => $attributeError) {
                    $formedMessage .= sprintf('<li>%s(%s) - %s</li>',
                        $attributeName,
                        $errorNum,
                        $attributeError,
                    );
                }
            }

            $formedMessage .= '</ul>';

            return $formedMessage;
        }

        return $message;
    }

    /**
     * Является ли массив результатом валидации модели
     *
     * @param array|string|null $errors
     *
     * @return bool
     */
    public static function isArrayModelValidation(mixed $errors): bool
    {
        return is_array($errors) && is_string(array_key_first($errors)) && isset($errors[array_key_first($errors)][0]);
    }

    /**
     * @param array $errors
     * @param Model|null $model
     *
     * @return string
     */
    public static function modelErrorsView(array $errors, Model|null $model = null): string
    {
        $errorsHtml = '<ul>';

        foreach ($errors as $attributeCode => $attribute) {
            $attributeName = $model !== null ? $model->getAttributeLabel($attributeCode) : $attributeCode;

            foreach ($attribute as $errorNum => $attributeError) {
                $errorsHtml .= sprintf('<li>%s(%s) - %s</li>',
                    $attributeName,
                    $errorNum,
                    $attributeError,
                );
            }
        }

        $errorsHtml .= '</ul>';

        return $errorsHtml;
    }

    /**
     * @param string $errorMessage
     *
     * @return Response|string
     *
     * @throws InvalidRouteException
     */
    public static function sendErrorByRequestType(string $errorMessage): Response|string
    {
        if (Yii::$app->request->isAjax) {
            return WebResponse::ajaxError($errorMessage);
        } else {
            WebResponse::setError($errorMessage);

            return Yii::$app->response->redirect(Yii::$app->request->referrer);
        }
    }
}
