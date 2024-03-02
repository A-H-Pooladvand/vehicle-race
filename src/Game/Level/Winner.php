<?php

namespace Src\Game\Level;

use cli\Streams;
use Src\Game\Game;
use Src\Game\Player;
use Src\Game\AbstractGame;

class Winner extends AbstractGame
{
    private ?Player $winner = null;

    public function handle(Game $game): void
    {
        foreach ($game->getPlayers() as $player) {
            if (is_null($this->winner)) {
                $this->winner = $player;
                continue;
            }

            if ($player->getFinishTime() < $this->winner->getFinishTime()) {
                $this->winner = $player;
            }
        }

        Streams::line($this->winner->winMessage());
    }
}