<?php

namespace Src\Game;

class Player
{
    private string $name;

    private Vehicle $vehicle;

    private float $finishTime;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getVehicle(): Vehicle
    {
        return $this->vehicle;
    }

    public function setVehicle(Vehicle $vehicle): void
    {
        $this->vehicle = $vehicle;
    }

    public function calculateFinishTime(int $distance): void
    {
        $this->finishTime = $this->vehicle->calculateTravelTime($distance);
    }

    public function winMessage(): string
    {
        $hours = (int)$this->finishTime;
        $minutes = (int)((($this->finishTime - $hours) * 60));
        $seconds = (int)((($this->finishTime - $hours) * 60 - $minutes) * 60);

        return "$this->name WON! it took $hours hours, $minutes minutes, and $seconds seconds.";
    }

    public function getFinishTime(): float
    {
        return $this->finishTime;
    }
}