<?php

namespace Src\Game;

class Unit
{
    private SpeedUnit $unit;

    private int $value;

    public function __construct(string $unit, int $value)
    {
        $this->unit = SpeedUnit::from($unit);
        $this->value = $value;
    }

    public function asKilometer(): float
    {
        return $this->unit->convertTo(SpeedUnit::KM_H, $this->value);
    }

    public function asKnot(): int
    {
        return $this->unit->convertTo(SpeedUnit::KNOTS, $this->value);
    }
}