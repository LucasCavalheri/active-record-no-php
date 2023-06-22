<?php
require '../vendor/autoload.php';

use app\database\activerecord\Update;
use app\database\models\User;

$user = new User;

$user->firstName = 'Lucas';
$user->lastName = 'Carvalho Cavalheri';

$user->execute(new Update(field: 'id', value: 1));
