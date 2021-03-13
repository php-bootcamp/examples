<?php

namespace Lib;

class Application
{
    protected $output;
    protected $registry;

    public function __construct()
    {
        $this->output = new Output();
        $this->registry = new Registry();
    }

    public function add($name, $callback)
    {
        $this->registry->add($name, $callback);
    }

    public function addCommand($name, Command $command)
    {
        $this->registry->addCommand($name, $command);
    }

    public function getOutput(): Output
    {
        return $this->output;
    }

    public function run(array $arguments): void
    {
        $commandName = $arguments[1] ?? "info";

        $command = $this->registry->getCallback($commandName);

        call_user_func($command, $arguments);
    }
}
