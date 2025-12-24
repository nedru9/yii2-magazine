<?php

namespace app\enums;

enum PaymentMethod: int
{
    case Cash = 0;

    /**
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::Cash => 'Наличные',
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
