<?php


class Role extends Model
{
    protected string $name;
    protected static string $table = "roles";

    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function save(Connection $connection)
    {
        $connection = $connection->get_connection();

        $stmt = $connection->prepare("INSERT INTO roles (name) VALUES (:name)");
        $stmt->bindParam(":name", $this->name);

        return $stmt->execute();
    }

    public static function find(Connection $connection, int $id)
    {
        $con = $connection->get_connection();
        $stmt = $con->prepare("SELECT id, name FROM roles WHERE id= ?");
        $stmt->execute(array($id));

        return $stmt->fetch();
    }



}