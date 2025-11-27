<?php

namespace app\log;

use app\exceptions\ExceptionFactory;
use Throwable;
use Yii;
use yii\helpers\Json;

class ExceptionEntity
{
    private string $exceptionName;

    private array $arguments;

    public string $status;

    public string $message;

    public string $code;
    public Throwable|null $previous;

    public function __construct(string $exceptionName, array $arguments)
    {
        $this->exceptionName = $exceptionName;
        $this->arguments = $arguments;

        $this->status = $this->getStatus();
        $this->message = $this->getMessage();
        $this->code = $this->getCode();
        $this->previous = $this->getPrevious();
    }

    /**
     * @return string
     */
    private function getStatus(): string
    {
        return ExceptionFactory::EXCEPTIONS[$this->exceptionName]['status'];
    }

    /**
     * @return string
     */
    private function getCode(): string
    {
        return ExceptionFactory::EXCEPTIONS[$this->exceptionName]['code'];
    }

    /**
     * @return string
     */
    private function getMessage(): string
    {
        $message =  $this->arguments[0] ?? ExceptionFactory::EXCEPTIONS[$this->exceptionName]['baseMessage'];

        if (is_array($message)) {
            $message = Json::encode($message, JSON_UNESCAPED_UNICODE);
        }

        return $message;
    }

    /**
     * Логирование
     *
     * @return void
     */
    public function logException(): void
    {
        Yii::error($this->message, 'HttpException');
    }

    /**
     * @return mixed|null
     */
    private function getPrevious(): Throwable|null
    {
        return $this->arguments[1] ?? null;
    }
}
