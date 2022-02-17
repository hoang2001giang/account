<?php
// 'user' object
class User {
    // database connection and table name
    private $conn;
    private $table_name = "users";

    // object properties
    public $id;
    public $first_name;
    public $last_name;
    public $email;
    public $password;

    public function __construct($conn){
        $this->conn = $conn;
    }

    function readAll() {
        $query = "SELECT * FROM " . $this->table_name;

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

}