<?php

namespace Src\Menu;

use cli\Colors;
use cli\Streams;
use Src\Game\Game;

final class Menu
{
    private array $options = [
        'start' => Game::class,
    ];

    public function __construct(
        private readonly Arguments $args,
    )
    {
    }

    public function start(): void
    {
        $this->args->addFlag(['start', 's'], 'Begin playing the game.');
        $this->args->addFlag(['help', 'h'], 'Display this help information.');

        $this->args->parse();

        // Inform the user about the invalid input and show the help screen
        if ($this->args->hasInvalidArguments()) {
            [$invalidArg] = $this->args->getInvalidArguments();
            $this->error("Invalid input $invalidArg, here is the list available commands:");
            echo $this->args->getHelpScreen();

            return;
        }

        // User didn't provide any command at all
        if ($this->args->isEmptyCommands() || $this->args->hasArgument('help')) {
            $this->warn("here is the list available commands:");

            echo $this->args->getHelpScreen();

            return;
        }

        // For simplicity, we only allow 1 command
        if ($this->args->countValidCommands() > 1) {
            $this->error('Invalid request: Too many arguments provided. Choose one command from the following:');
            echo $this->args->getHelpScreen();

            return;
        }

        $this->execute($this->args->command());
    }

    private function execute(string $command): void
    {
        container()->make($this->options[$command])->handle();
    }

    private function warn(string $message): void
    {
        $this->colored($message, 'yellow');
    }

    private function info(string $message): void
    {
        $this->colored($message, 'blue');
    }

    private function error(string $message): void
    {
        $this->colored($message, 'red');
    }

    private function success(string $message): void
    {
        $this->colored($message, 'green');
    }

    private function colored(string $message, string $color): void
    {
        Streams::line(
            Colors::color($color) . $message . Colors::color('reset') . "\n"
        );
    }
}