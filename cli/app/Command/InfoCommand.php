<?php

namespace App\Command;

use Lib\Command;

class InfoCommand extends Command
{
    public function run(array $arguments): void
    {
        $this->app->getOutput()->out("PHP Bootcamp!");
        $this->app->getOutput()->newLine();
        print_r($arguments);
    }
}
