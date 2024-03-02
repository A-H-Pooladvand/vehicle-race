<?php

namespace Src\Game\Level;

use cli\Streams;
use Src\Game\Game;
use Src\Game\AbstractGame;

class ChooseDistance extends AbstractGame
{
    public function handle(Game $game):void
    {
        do {
            $distance = Streams::prompt('Please choose the distance (KM)', 100);
        } while (!is_numeric($distance));

        foreach ($game->getPlayers() as $player) {
            $player->calculateFinishTime($distance);
        }

        $this->next($game);
    }
}