<?php

namespace Src\Game;

use Src\File\File;

class Vehicles
{
    /**
     * @var \Src\Game\Vehicle[]|array $vehicles
     */
    private array $vehicles;

    public function load($path): static
    {
        $vehicles = json_decode(File::getContents($path), true, 512, JSON_THROW_ON_ERROR);

        foreach ($vehicles as $vehicle) {
            $name = $vehicle['name'];
            $speed = $vehicle['maxSpeed'];
            $unit = $vehicle['unit'];

            $this->vehicles[$name] = new Vehicle($name, $speed, $unit);
        }

        return $this;
    }

    public function toArray(): array
    {
        return array_column($this->vehicles, 'name', 'name');
    }

    public function get(string $vehicleName): Vehicle
    {
        return $this->vehicles[$vehicleName];
    }
}