<?php

namespace app\database\interfaces;

interface ActiveRecordInterface
{
    public function execute(ActiveRecordExecuteInterface $activeRecordExecuteInterface);
    public function __set(string $attribute, string $value): void;
    public function __get(string $attribute): string;
    public function getTable(): string;
    public function getAttributes(): array;
}
