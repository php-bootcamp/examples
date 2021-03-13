<?php

namespace App\Command;

use Lib\Command;

class HelloCommand extends Command
{
    public function run(array $arguments): void
    {
        $this->app->getOutput()->title("Hello " . ($arguments[2] ?? "World")."!");
    }
}