<?php

namespace Src\Game;

abstract class AbstractGame
{
    private AbstractGame $next;

    abstract public function handle(Game $game): void;

    public function setNext(AbstractGame $next): void
    {
        $this->next = $next;
    }

    public function next(Game $game): void
    {
        $this->next->handle($game);
    }
}