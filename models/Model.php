<?php

namespace models;

abstract class Model
{
    /**
     * @var null|\PDO
     */
    protected $db = null;

    /**
     * @return mixed
     */
    public abstract function table();

    /**
     * Model constructor.
     */
    public function __construct($db)
    {
        $this->db = $db;
    }

    /**
     * @return array
     */
    public function all()
    {
        return $this->queryAll()->fetchAll(\PDO::FETCH_CLASS);
    }

    /**
     * @return \PDOStatement
     */
    protected function queryAll()
    {
        return $this->db->query("SELECT * FROM {$this->table()}");
    }

    /**
     * @param $fields
     * @return array|string
     */
    public function getValues ($fields)
    {
        $values = array_values($fields);

        $values = join("', '", $values);

        return $values;
    }

    /**
     * @param $fields
     * @return array|string
     */
    public function getKeys($fields)
    {
        $keys = array_keys($fields);

        $keys = implode(',', $keys);

        return $keys;
    }

    /**
     * @param array $fields
     * @return \PDOStatement
     */
    public function create(Array $fields)
    {
        $values = $this->getValues($fields);

        $keys = $this->getKeys($fields);

        $this->db->query("INSERT INTO {$this->table()} ({$keys}) VALUES ('{$values}')");

        return $this->db->lastInsertId();
    }

    /**
     * @return int
     */
    public function count()
    {
        return $this->queryAll()->rowCount();
    }
}