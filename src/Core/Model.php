<?php

namespace Wes\Mvc\Core;

use Exception;
use PDO;

abstract class Model
{
    static $db = null;
    private $_table;

    public function __construct($table_name)
    {

        if (static::$db === null) {

            $connectionString = 'sqlite:' . __DIR__ . '/../../data/database.sqlite';
            $db = new \PDO($connectionString);

            // Throw an Exception when an error occurs
            $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            static::$db = $db;
        }

        $this->_table = $table_name;
    }

    abstract function getAll(): iterable;


    /**
     * @throws Exception
     */
    public function insert(array $data): int
    {

        if ($this->_table === "") {
            throw new Exception("Attribute _table is empty string!");
        }

        // Question marks
        $marks = array_fill(0, count($data), '?');
        // Fields to be added.
        $fields = array_keys($data);
        // Fields values
        $values = array_values($data);

        // Prepare statement
        $stmt = $this->DB()->prepare("
            INSERT INTO " . $this->_table . "(" . implode(",", $fields) . ")
            VALUES(" . implode(",", $marks) . ")
        ");

        // Execute statement with values
        $stmt->execute($values);

        // Return last inserted ID.
        return $this->DB()->lastInsertId();
    }

    public function update(int $recordID, array $data): int
    {

        if ($this->_table === "") {
            throw new Exception("Attribute _table is empty string!");
        }

        // Fields to be added.
        $fields = array_keys($data);
        // Fields values
        $values = array_values($data);

        $test = array_merge([$recordID], $values);

        $sql = "UPDATE " . $this->_table . "SET " . implode(",", $fields) . " WHERE id = :id";

        // Prepare statement
        $stmt = $this->DB()->prepare($sql);

        // Execute statement with values
        $stmt->execute($stmt);

        // Return last inserted ID.
        return $this->DB()->lastInsertId();
    }


    protected function DB(): PDO
    {

        return static::$db;
    }

}