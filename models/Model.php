<?php

namespace App\Models;

use App\Services\Database;
use App\Services\MyException;

abstract class Model
{
    abstract protected static function getTable();

    public static function findAll()
    {
        $sql = 'SELECT * FROM ' . static::getTable() . ' ORDER BY articleDate DESC';
        $db = new Database();
        $result = $db->selectAll(static::class, $sql);
        if ($result == false) {
            throw new MyException('E404');
        } else {
            return $result;
        }
    }

    public static function findOne($id)
    {
        $sql = 'SELECT * FROM ' . static::getTable() . ' WHERE articleId = :articleId';
        $db = new Database();
        $result = $db->selectOne(static::class, $sql, [':articleId' => $id]);
        if ($result == false) {
            throw new MyException('E404');
        } else {
            return $result;
        }
    }
}