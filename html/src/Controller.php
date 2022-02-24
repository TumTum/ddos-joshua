<?php

declare(strict_types=1);

namespace joshua\ddos;

abstract class Controller
{
    protected array $data = [];

    abstract public function render(): string;

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }
}
