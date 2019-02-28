<?php

class Record
{
    private $mysqli;

    public function __construct()
    {
        $mysqli = new mysqli('localhost', 'root', '', 'watson');

        if($mysqli->connect_error)
        {
            die("Connection failed: " . $mysqli->connect_error);
        }

        $this->mysqli = $mysqli;
    }

    public function find_all($table)
    {
        $records = array();
        $result  = $this->mysqli->query("SELECT * FROM `{$this->mysqli->real_escape_string($table)}`");

        if($result)
        {
            while($record = $result->fetch_assoc())
            {
                $records[] = $record;
            }

            $result->free();
        }

        return $records;
    }

    public function find_where($table, $filter)
    {
        $whereArray = array();

        foreach($filter as $field => $value)
        {
            $whereArray[] = "`{$this->escape($field)}` = '{$this->escape($value)}'";
        }

        $whereString = implode(' AND ', $whereArray);

        $records = array();
        $result  = $this->mysqli->query("SELECT * FROM `{$table}` WHERE ".$whereString);

        if($result)
        {
            while($record = $result->fetch_assoc())
            {
                $records[] = $record;
            }

            $result->free();
        }

        return $records;
    }

    public function escape($string)
    {
        return $this->mysqli->real_escape_string($string);
    }
}

?>