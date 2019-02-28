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
        $result  = $this->mysqli->query("SELECT * FROM `{$table}`");

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

    public function find_where($table, $where)
    {
        $records = array();
        $result  = $this->mysqli->query("SELECT * FROM `{$table}` WHERE ".$where);

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
}

?>