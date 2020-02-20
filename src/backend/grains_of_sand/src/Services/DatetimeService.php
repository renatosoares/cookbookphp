<?php declare(strict_types = 1);

namespace App\Services;

use DateInterval;
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

    public function addInterval(string $date, int $interval, string $spec, string $type): DateTime
    {
        $dateTime = new DateTime($date);

        $intervalSpec = sprintf('%s%s%s',$spec, $interval, $type);

        $interval = new DateInterval($intervalSpec);

        return $dateTime->add($interval);
    }

    public function format(string $format, DateTime $dateTime): string
    {
        return $dateTime->format($format);
    }

    public function addMinutes(string $date, int $aditionalMinutes): DateTime
    {
        return $this->addInterval($date, $aditionalMinutes, 'PT', 'M');
    }

    public function addWeek(string $date, int $aditionalWeek): DateTime
    {
        return $this->addInterval($date, $aditionalWeek, 'P', 'W');
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
