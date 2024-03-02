<?php

namespace Src\Game;

use Src\Game\Level\Winner;
use Src\Game\Level\ChooseDistance;
use Src\Game\Level\ChooseName;
use Src\Game\Level\ChooseVehicle;

class Game
{
    public const int NUMBER_OF_PLAYERS = 2;

    /**
     * @var \Src\Game\Player[]
     */
    private array $players;

    public function handle(): void
    {
        // Define levels and how game should proceed
        // Using chain of responsibilities pattern
        $chooseName = make(ChooseName::class);
        $chooseVehicle = make(ChooseVehicle::class);
        $chooseDistance = make(ChooseDistance::class);
        $winner = make(Winner::class);

        $chooseName->setNext($chooseVehicle);
        $chooseVehicle->setNext($chooseDistance);
        $chooseDistance->setNext($winner);

        $chooseName->handle($this);
    }

    public function addPlayer(bool|string $name): void
    {
        $this->players[] = new Player($name);
    }

    /**
     * @return \Src\Game\Player[]
     */
    public function getPlayers(): array
    {
        return $this->players;
    }

    public function vehiclesPath(): string
    {
        return base_path(env('VEHICLES_PATH'));
    }
}