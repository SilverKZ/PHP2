<?php

namespace App;

/**
 * Class Db
 * @package App
 *
 * @property \PDO $dbh Ссылка на созданный объект PDO
 */
class Db
{
    protected $dbh;

    /**
     * Db constructor.
     * Создает объект PDO
     */
    public function __construct()
    {
        $config = Config::instance()->data['db'];
        $dsn = $config['type'] . ':host=' . $config['host'] . ';dbname=' . $config['dbname'];
        $this->dbh = new \PDO($dsn, $config['user'], $config['pass']);
    }

    /**
     * Выполняет подготовленный запрос к БД
     *
     * @param string $sql    Запрос sql
     * @param array $params  Значения подставляемых переменных
     * @param string $class  Ожидаемый класс возвращаемых объектов
     * @return array         Возвращаемые данные
     */
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

    /**
     * Выполняет подготовленный запрос к БД (без получения данных)
     *
     * @param string $sql    Запрос sql
     * @param array $params  Значения подставляемых переменных
     * @return bool
     */
    public function execute(string $sql, array $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);
    }

    /**
     * Возвращает ID последней сохраненной записи
     *
     * @return string
     */
    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }
}

