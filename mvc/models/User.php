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

    function create() {
        $query = "INSERT INTO " . $this->table_name . 
                " SET first_name = :first_name, last_name = :last_name, email = :email, password = :password";
        
        $stmt = $this->conn->prepare($query);

        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->email = htmlspecialchars(strip_tags($this->email));

        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':first_name', $this->first_name);
        $stmt->bindParam(':last_name', $this->last_name);

        $password_hash = password_hash($this->password, PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $password_hash);
        
        $res = false;

        if ($stmt->execute()) {
            $res = true;
        }

        return $res;
    }

}