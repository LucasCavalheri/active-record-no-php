<?php

namespace app\database\activerecord;

use app\database\interfaces\UpdateInterface;

class UpdateUser implements UpdateInterface
{
    public function update()
    {
        echo "Update User";
    }
}
