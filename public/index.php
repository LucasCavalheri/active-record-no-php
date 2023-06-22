<?php
require '../vendor/autoload.php';

use app\database\activerecord\Delete;
use app\database\activerecord\FindAll;
use app\database\activerecord\FindBy;
use app\database\activerecord\Insert;
use app\database\activerecord\Update;
use app\database\models\User;

$user = new User;

$user->firstName = 'Mel';
$user->lastName = 'Carvalho Cavalheri';

var_dump($user->execute(new FindAll(where: ['id' => 2])));
