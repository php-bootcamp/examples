<?php

namespace Lib;

class Registry
{
    protected $registry = [];
    protected $registryCommands = [];

    public function add($name, $callback): void
    {
        $this->registry[$name] = $callback;
    }

    public function addCommand($name, Command $command): void
    {
        $this->registryCommands[$name] = $command;
    }

    public function get($name)
    {
        return $this->registry[$name] ?? null;
    }

    public function getCommand($name)
    {
        return $this->registryCommands[$name] ?? null;
    }

    public function getCallback($command)
    {
        $commandClass = $this->getCommand($command);

        if ($commandClass instanceof Command) {
            return [$commandClass, 'run'];
        }

        $command = $this->get($command);
        if (!$command)
            throw new \Exception("Komut bulunamadı!");

        return $command;
    }
}
