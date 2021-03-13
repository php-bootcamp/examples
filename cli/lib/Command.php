<?php

namespace Lib;

abstract class Command
{
    protected Application $app;

    abstract public function run(array $arguments): void;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }
}