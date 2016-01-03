<?php

namespace App\Models;

use App\Services\Database;

class Users
    extends Model
{
    public $userId;

    protected static function getTable()
    {
        return 'users';
    }

    public static function login($user)
    {
        $columns = [];
        $values = [];
        foreach ($user as $key => $value) {
            $columns[] = $key . ' = :' . $key;
            $values[':' . $key] = strip_tags($value);
        }

        $sql = 'SELECT userId FROM ' . static::getTable() . ' WHERE ' . implode(' AND ', $columns);
        $db = new Database();
        return $db->selectOne(static::class, $sql, $values);
    }

    public function setSess($sess)
    {
        $sql = 'UPDATE ' . static::getTable() . ' SET userSess = :userSess WHERE userId = :userId';
        $db = new Database();
        return $db->execute($sql, [':userSess' => $sess, ':userId' => $this->userId]);
    }

    public static function checkSess()
    {
        $sql = 'SELECT userId FROM ' . static::getTable() . ' WHERE userSess = :userSess';
        $db = new Database();
        return $db->selectOne(static::class, $sql, [':userSess' => $_SESSION['sess']]);
    }
}