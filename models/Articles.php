<?php

namespace App\Models;

use App\Services\Database;

class Articles
    extends Model
{
    public $articleId;

    public $data;

    protected static function getTable()
    {
        return 'articles';
    }

    public function insert()
    {
        $columns = [];
        $values = [];
        foreach ($this->data as $key => $value) {
            $columns[] = $key;
            $values[$key] = $value;
        }

        $sql = 'INSERT INTO ' . static::getTable() . ' (' . implode(', ', $columns) . ', articleDate)
                VALUES (:' . implode(', :', $columns) . ', NOW())';
        $db = new Database();
        return $db->execute($sql, $values);
    }

    public function update()
    {
        $columns = [];
        $values = [];
        foreach ($this->data as $key => $value) {
            $columns[] = $key . ' = :' . $key;
            $values[$key] = $value;
        }

        $sql = 'UPDATE ' . static::getTable() . ' SET articleDate = NOW(), ' . implode(', ', $columns) . ' WHERE articleId=' . $this->articleId;
        $db = new Database();
        return $db->execute($sql, $values);
    }

    public function delete()
    {
        $sql = 'DELETE FROM ' . static::getTable() . ' WHERE articleId = :articleId';
        $db = new Database();
        $result = $db->execute($sql, [':articleId' => $this->articleId]);
        if ($result == false) {
            throw new MyException('E404');
        } else {
            return $result;
        }
    }
}