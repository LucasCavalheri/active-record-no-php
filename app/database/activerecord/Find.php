<?php

namespace app\database\activerecord;

use app\database\interfaces\ActiveRecordExecuteInterface;

class Find implements ActiveRecordExecuteInterface
{
    public function execute($activeRecord)
    {
        return 'find';
    }
}
