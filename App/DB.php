<?php

namespace App;

class Db
{
    protected $dbh;

    public function __construct()
    {
        $config = Config::instance()->data['db'];
        $dsn = $config['type'] . ':host=' . $config['host'] . ';dbname=' . $config['dbname'];
        $this->dbh = new \PDO($dsn, $config['user'], $config['pass']);
    }

    public function query(string $sql, array $params = [], $class = '')
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);

        if (empty($class)) {
            return $sth->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }
    }

    public function execute(string $sql, array $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);
    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }
}

