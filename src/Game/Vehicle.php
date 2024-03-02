<?php

namespace Src\Game;

class Vehicle
{
    public string $name;

    public Unit $unit;

    public function __construct(
        string $name,
        int    $maxSpeed,
        string $unit,
    )
    {
        $this->unit = new Unit($unit, $maxSpeed);
        $this->name = $name;
    }

    public function calculateTravelTime(int $distance): float
    {
        return $distance / $this->unit->asKilometer();
    }
}