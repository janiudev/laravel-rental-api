<?php

namespace App\Values\Enum;

enum PeriodUnitEnum: string
{
    case DAY = 'day';
    case WEEK = 'week';
    case MONTH = 'month';
    case YEAR = 'year';
}
