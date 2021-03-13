<?php

namespace Lib;

class Output
{
    public function out(string $message): void
    {
        echo $message;
    }

    public function newLine(): void
    {
        $this->out(PHP_EOL);
    }

    public function title($title): void
    {
        $this->out($title);
        $this->newLine();
        $this->out("======");
        $this->newLine();
    }
}
