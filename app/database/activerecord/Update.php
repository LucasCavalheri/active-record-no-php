<?php

namespace app\database\activerecord;

use app\database\interfaces\ActiveRecordInterface;
use app\database\interfaces\UpdateInterface;

class Update implements UpdateInterface
{
    public function update(ActiveRecordInterface $activeRecordInterface)
    {
        var_dump($activeRecordInterface->getAttributes());
    }
}
