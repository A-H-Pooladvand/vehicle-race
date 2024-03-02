<?php

namespace Src\Game;

class Kilometer
{
    private string $unit;
    private int $value;

    public function __construct(string $unit, int $value)
    {
        $this->unit = $unit;
        $this->value = $value;
    }

    public function convert(): int
    {

    }
}