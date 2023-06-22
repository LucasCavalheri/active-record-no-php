<?php

namespace app\database\interfaces;

interface ActiveRecordInterface
{
    public function update(UpdateInterface $updateInterface);
    // public function insert();
    // public function delete();
    // public function find();
    // public function findBy();
    // public function all();

    public function getTable(): string;
    public function getAttributes(): array;
}
