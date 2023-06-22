<?php

namespace app\database\connection;

use PDO;
use PDOException;

class Connection
{
    private static $pdo = null;

    public static function connect(): PDO
    {
        try {
            if (!static::$pdo) {
                static::$pdo = new PDO('mysql:host=localhost;dbname=activerecord', 'root', 'root', [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ

                    // com o FETCH_OBJ = $user->firstName, sem o FETCH_OBJ = $user['firstName']
                ]);
            }

            return static::$pdo;
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }
}
