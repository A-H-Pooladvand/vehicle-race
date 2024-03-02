<?php

namespace Src\Game;

use InvalidArgumentException;

enum SpeedUnit: string
{
    case KM_H  = 'Km/h';
    case KNOTS = 'knots';
    case KKNS  = 'Kts'; // Assuming KKNS is a typo for Kts

    public function convertTo(SpeedUnit $targetUnit, float $value): float
    {
        $conversionRates = [
            self::KM_H->value  => [
                self::KM_H->value  => 1,
                self::KNOTS->value => 0.539956,
                self::KKNS->value  => 0.539956,
            ],
            self::KNOTS->value => [
                self::KM_H->value  => 1.852,
                self::KNOTS->value => 1,
                self::KKNS->value  => 1,
            ],
            self::KKNS->value  => [
                self::KM_H->value  => 1.852,
                self::KNOTS->value => 1,
                self::KKNS->value  => 1,
            ],
        ];

        if (!isset($conversionRates[$this->value][$targetUnit->value])) {
            throw new InvalidArgumentException("Conversion between '$this->value' and '$targetUnit->value' is not supported");
        }

        return $value * $conversionRates[$this->value][$targetUnit->value];
    }
}