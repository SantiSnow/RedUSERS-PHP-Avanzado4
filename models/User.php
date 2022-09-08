<?php

require_once 'Model.php';
require_once 'Role.php';
require_once 'auth/Authenticable.php';

class User extends Model implements Authenticable
{
    protected int $id;
    protected string $name;
    protected string $email;
    protected string $password;
    protected int $role_id;
    protected bool $email_verified;
    protected static string $table = "users";

    public function __construct($id, $name, $email, $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->role_id = 2;
        $this->email_verified = false;
    }

    public function save(Connection $connection)
    {
        $connection = $connection->get_connection();

        $stmt = $connection->prepare("INSERT INTO users (name, email, password, role_id, email_verified) 
            VALUES (:name, :email, :password, :role_id, :email_verified)");

        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":role_id", $this->role_id);
        $stmt->bindParam(":email_verified", $this->email_verified);

        return $stmt->execute();
    }

    public static function login(Connection $connection, $email, $password)
    {
        $con = $connection->get_connection();

        $stmt = $con->prepare("SELECT * FROM users WHERE email= ?");
        $stmt->execute(array($email));
        $user = $stmt->fetch();

        if($user && password_verify($password, $user['password']))
        {
            return new User($user['id'], $user['name'], $user['email'], $user['password']);
        }
        return null;
    }

    public static function logout()
    {

    }

    public static function find(Connection $connection, int $id)
    {
        $con = $connection->get_connection();
        $stmt = $con->prepare("SELECT id, name, email, role_id, email_verified FROM users WHERE id= ?");
        $stmt->execute(array($id));

        return $stmt->fetch();
    }

    public static function getRole(Connection $connection, int $id)
    {
        $con = $connection->get_connection();
        $stmt = $con->prepare("SELECT role_id FROM users WHERE id= ?");
        $stmt->execute(array($id));
        $user = $stmt->fetch();

        $stmt = $con->prepare("SELECT * FROM roles WHERE id= ?");
        $stmt->execute(array($user['role_id']));

        $role = $stmt->fetch();
        return new Role($role['title']);
    }

    public static function all(Connection $connection)
    {
        $con = $connection->get_connection();
        $stmt = $con->prepare("SELECT id, name, email, role_id FROM ".self::$table);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

}