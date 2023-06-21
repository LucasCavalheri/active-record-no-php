<?php

namespace app\database\models;

use app\database\activerecord\ActiveRecord;

class User extends ActiveRecord
{
    protected $table = 'users';
}
