<?php
abstract class Connection {
    protected $host;
    protected $db;
    protected $username;
    protected $password;
    protected $connection;

    public function __construct() {
        $this->host = 'localhost';
        $this->db = 'lesson8';
        $this->username = 'root';
        $this->password = '';
        $this->connection = $this->connect();
    }

    public function connect() {
        try {
            $conn = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->username, $this->password);

            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $conn;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function prepareSQL($sql) {
        return $this->connection->prepare($sql);
    }
}

class CategoryConnection extends Connection {
    public function getData() {
        $sql = "SELECT * FROM category";
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }

    public function getOneData($data) {
        $sql = "SELECT * FROM category WHERE id = :id";
        $select = $this->prepareSQL($sql);
        $select->execute($data);
        return $select->fetchAll();
    }

    public function createNewData($data) {
        $sql = "INSERT INTO category (name) VALUES (:name)";
        $create = $this->prepareSQL($sql);
        $create->execute($data);
    }

    public function updateData($data) {
        $sql = "UPDATE category SET name = :name WHERE id = :id";
        $update = $this->prepareSQL($sql);
        $update->execute($data);
    }

    public function deleteData($data) {
        $sql = "DELETE FROM category WHERE id = :id";
        $update = $this->prepareSQL($sql);
        $update->execute($data);
    }
}

?>