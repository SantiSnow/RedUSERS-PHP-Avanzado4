<?php

require_once 'Model.php';

class User extends Model
{
    protected string $name;
    protected string $email;
    protected string $password;
    protected int $role_id;
    protected bool $email_verified;

    public function __construct($name, $email, $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->role_id = 2;
        $this->email_verified = false;
    }

    public function save(Connection $connection)
    {
        $connection = $connection->get_connection();

        $stmt = $connection->prepare("INSERT INTO users (name, email, password, role_id, email_verified) 
            VALUES (:name, :email, :password, :role_id, :email_verified)");

        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":mail", $this->email);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":role_id", $this->role_id);
        $stmt->bindParam(":mail_verified", $this->email_verified);

        return $stmt->execute();
    }

    public static function login(Connection $connection,$email, $password)
    {
        $con = $connection->get_connection();

        $stmt = $con->prepare("SELECT * FROM users WHERE mail= ?");
        $stmt->execute(array($email));
        $user = $stmt->fetch();

        if($user && password_verify($password, $user['password']))
        {
            return true;
        }
        return false;
    }

    public static function find(Connection $connection, int $id)
    {
        $con = $connection->get_connection();
        $stmt = $con->prepare("SELECT id, name, email, role_id, email_verified FROM users WHERE id= ?");
        $stmt->execute(array($id));

        return $stmt->fetch();
    }
}