<?php
require '../vendor/autoload.php';

use app\database\activerecord\Find;
use app\database\models\User;

$user = new User;

$user->firstName = 'Lucas';
$user->lastName = 'Cavalheri';
$user->id = 1;

echo $user->execute(new Find);
