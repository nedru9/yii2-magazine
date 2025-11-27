<?php

namespace app\widgets;

use kartik\alert\Alert as AlertWidget;
use kartik\alert\AlertInterface;
use Yii;
use yii\base\Widget;

class Alert extends Widget
{
    public int $delayTime = 6000;
    public array $alertTypes = [
        'error'   => AlertInterface::TYPE_DANGER,
        'success' => AlertInterface::TYPE_SUCCESS,
        'warning' => AlertInterface::TYPE_WARNING,
    ];

    public array $alertIcons = [
        'error'   => 'fas fa-exclamation-circle',
        'success' => 'far fa-check-circle',
        'warning' => 'fas fa-exclamation',
    ];


    /**
     * {@inheritdoc}
     */
    public function run(): void
    {
        $session = Yii::$app->session;

        foreach (array_keys($this->alertTypes) as $type) {
            $flash = $session->getFlash($type);

            foreach ((array) $flash as $message) {
                echo AlertWidget::widget([
                    'type' => $this->alertTypes[$type],
                    'body' => $message,
                    'icon' => $this->alertIcons[$type],
//                    'delay' => $this->delayTime
                ]);
            }

            $session->removeFlash($type);
        }
    }
}
