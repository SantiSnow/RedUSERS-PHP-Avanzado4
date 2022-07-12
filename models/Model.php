<?php

abstract class Model
{
    protected static string $table;
    public abstract function save(Connection $connection);

    public function getProperties()
    {
        foreach ($this as $key => $value)
        {
            print "$key => $value, type:" . gettype($value) . ".\n";
        }
    }

    public static function find(Connection $connection, int $id)
    {
        $con = $connection->get_connection();
        $stmt = $con->prepare("SELECT * FROM ".self::$table." WHERE id= ?");
        $stmt->execute(array($id));
        return $stmt->fetch();
    }
}