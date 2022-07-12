<?php

class Connection
{
    protected $connection;
    protected $servername;
    protected $username;
    protected $password;
    protected $db;

    public function __construct()
    {
        $dotenv = Dotenv\Dotenv::createImmutable('./');
        $dotenv->load();

        try {
            $this->username = $_ENV['DB_USER'];
            $this->password = $_ENV['DB_PASSWORD'];
            $this->servername = $_ENV['DB_HOST'];
            $this->db = $_ENV['DB_NAME'];

            $this->connection = new PDO(
                "mysql:host=$this->servername;dbname=$this->db",
                $this->username,
                $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function get_connection()
    {
        return $this->connection;
    }

    public function close_connection()
    {
        $this->connection = null;
    }
}