<?php

namespace Src\Game\Level;

use cli\Streams;
use Src\Game\Game;
use Src\Game\AbstractGame;

class ChooseName extends AbstractGame
{
    public function handle(Game $game): void
    {
        for ($i = 1; $i <= $game::NUMBER_OF_PLAYERS; $i++) {
            $name = Streams::prompt("Player $i name:", "Player $i");

            $game->addPlayer($name);
        }

        $this->next($game);
    }
}