<?php
require '../vendor/autoload.php';

use app\database\activerecord\Update;
use app\database\models\User;

$user = new User;

$user->firstName = 'Lucas';
$user->lastName = 'Cavalheri';
$user->id = 1;

$user->update(new Update);
