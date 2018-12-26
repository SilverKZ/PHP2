<?php

namespace App\Core;

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

        try {
            $this->dbh = new \PDO($dsn, $config['user'], $config['pass']);
        } catch (\PDOException $ex) {
            throw new DBException('Нет соединения с БД', $ex->getCode());
        }
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

        if (false === $sth->execute($params)) {
            throw new DBException('Неверный запрос к БД', 42);
        }

        if (empty($class)) {
            $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
         } else {
             $result = $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }

        if (empty($result)) {
            throw new BaseException('Ошибка 404 - не найдено', 42);
        } else {
            return $result;
        }
    }

    /**
     * Выполняет подготовленный запрос к БД (без получения данных)
     *
     * @param string $sql    Запрос sql
     * @param array $params  Значения подставляемых переменных
     */
    public function execute(string $sql, array $params = [])
    {
        $sth = $this->dbh->prepare($sql);

        if (false === $sth->execute($params)) {
            throw new DBException('Неверный запрос к БД', 42);
        }
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

