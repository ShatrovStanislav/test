<?php

namespace App\Services;

class Database
{
    protected $dbh;

    public function __construct()
    {
        $config = include __DIR__ . '/../Config/dbConfig.php';
        $this->dbh = new \PDO(
            'mysql:localhost=' . $config['localhost'] . ';dbname=' . $config['db'],
            $config['user'],
            $config['pass']
        );
    }

    public function selectAll($class, $sql, $values= [])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($values);
        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    public function selectOne($class, $sql, $values= [])
    {
        return $this->selectAll($class, $sql, $values)[0];
    }

    public function execute($sql, $values = [])
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($values);
    }
}