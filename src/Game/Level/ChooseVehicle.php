<?php

namespace Src\Game\Level;

use cli\Streams;
use Src\Game\Game;
use Src\Game\Vehicles;
use Src\Game\AbstractGame;

class ChooseVehicle extends AbstractGame
{
    public function __construct(
        private readonly Vehicles $vehicles,
    )
    {
    }

    public function handle(Game $game): void
    {
        $vehicles = $this->vehicles->load($game->vehiclesPath());

        foreach ($game->getPlayers() as $player) {
            $vehicle = Streams::menu($vehicles->toArray(), null, "{$player->getName()} choose your vehicle");

            $player->setVehicle(
                $vehicles->get($vehicle)
            );
        }

        $this->next($game);
    }
}