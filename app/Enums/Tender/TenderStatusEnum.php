<?php

namespace App\Enums\Tender;

class TenderStatusEnum
{
    public const OPEN = 'Открыто';
    public const CLOSED = 'Закрыто';
    public const CANCELED = 'Отменено';

    public static function getStatuses(): array
    {
        return [
            self::OPEN,
            self::CLOSED,
            self::CANCELED,
        ];
    }

}
