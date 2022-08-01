<?php

require_once 'Model.php';

class Document extends Model
{
    protected static string $table = "documents";

    protected $name;
    protected $file;
    protected $status;

    public function __construct($name, $file)
    {
        $this->name = $name;
        $this->file = $file;
        $this->status = "Pending";
    }

    public static function all(Connection $connection)
    {
        $con = $connection->get_connection();
        $stmt = $con->prepare("SELECT id, name, file, status FROM ".self::$table);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function save(Connection $connection)
    {
        $connection = $connection->get_connection();

        $stmt = $connection->prepare("INSERT INTO documents (name, file, status) 
            VALUES (:name, :file, :status)");

        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":file", $this->file);
        $stmt->bindParam(":status", $this->status);

        return $stmt->execute();
    }

    public static function find(Connection $connection, int $id)
    {
        $con = $connection->get_connection();
        $stmt = $con->prepare("SELECT id, name, file, status FROM documents WHERE id= ?");
        $stmt->execute(array($id));
        return $stmt->fetch();
    }


}