<?php

namespace app\database\activerecord;

use app\database\interfaces\ActiveRecordInterface;
use app\database\interfaces\UpdateInterface;
use ReflectionClass;

abstract class ActiveRecord implements ActiveRecordInterface
{
    protected $table = null;

    protected $attributes = [];

    public function __construct()
    {
        if (!$this->table) {
            $this->table = strtolower((new ReflectionClass($this))->getShortName());
            // var_dump($this->table);
        }
    }

    public function __set(string $attributes, string $value): void
    {
        $this->attributes[$attributes] = $value;
    }

    public function __get(string $attributes): string
    {
        return $this->attributes[$attributes];
    }

    public function getTable(): string
    {
        return $this->table;
    }

    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public function update(UpdateInterface $updateInterface)
    {
        return $updateInterface->update($this);
    }
}
