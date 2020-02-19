<?php declare(strict_types = 1);

namespace App\Services;

use DateTime;
use stdClass;

class DatetimeService
{
    public function now(): string
    {
        return date('d-m-Y H:i:s', strtotime('now'));
    }

    public function custom(string $format, string $date): string
    {
        return date($format, strtotime($date));
    }

    public function addDays(string $format, string $date, int $additionalDays): string
    {
        $timeWithInterval = sprintf('%s +%s days', $date, $additionalDays);

        return $this->custom($format, $timeWithInterval);
    }

    public function subDays(string $format, string $date, int $additionalDays): string
    {
        $timeWithInterval = sprintf('%s +%s days', $date, $additionalDays);

        return $this->custom($format, $timeWithInterval);
    }

    public function diffDate(string $firstDate = '1-1-2000', string $lastDate = '1-1-2020 13:37:21'): object
    {
        $dateOne = new DateTime($firstDate);
        $dateTwo = new DateTime($lastDate);

        return $dateOne->diff($dateTwo) ?? new stdClass();
    }
}
