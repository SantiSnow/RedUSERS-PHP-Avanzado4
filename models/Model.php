<?php

abstract class Model
{
    public abstract function save(Connection $connection);

    public abstract static function find(Connection $connection, int $id);

    public function getProperties()
    {
        foreach ($this as $key => $value)
        {
            print "$key => $value, type:" . gettype($value) . ".\n";
        }
    }
}