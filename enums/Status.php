<?php

namespace app\enums;

enum Status: int
{
    case NEW = 0;
    case IN_PROCESS = 1;
    case COMPLETE = 2;

    /**
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::NEW => 'Новый',
            self::IN_PROCESS => 'В работе',
            self::COMPLETE => 'Выполнен',
        };
    }

    /**
     * @return array
     */
    public static function list(): array
    {
        $result = [];

        foreach (self::cases() as $case) {
            $result[$case->value] = $case->label();
        }

        return $result;
    }
}
