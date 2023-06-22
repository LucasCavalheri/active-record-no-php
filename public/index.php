<?php
require '../vendor/autoload.php';

use app\database\activerecord\Insert;
use app\database\activerecord\Update;
use app\database\models\User;

$user = new User;

$user->firstName = 'Mel';
$user->lastName = 'Carvalho Cavalheri';

echo $user->execute(new Insert);
