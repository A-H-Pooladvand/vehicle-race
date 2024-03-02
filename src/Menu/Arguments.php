<?php

namespace Src\Menu;

class Arguments extends \cli\Arguments
{
    public function validCommands(): array
    {
        return array_filter(
            $this->getArguments(),
            static fn($arg) => $arg === true
        );
    }

    public function countValidCommands(): int
    {
        return count($this->validCommands());
    }

    public function isEmptyCommands(): bool
    {
        return empty($this->validCommands());
    }

    public function hasInvalidArguments(): bool
    {
        return !empty($this->getInvalidArguments());
    }

    public function hasArgument(string $key): bool
    {
        return $this->getArguments()[$key] === true;
    }

    public function command(): string
    {
        foreach ($this->validCommands() as $command => $value) {
            return $command;
        }

        return '';
    }
}