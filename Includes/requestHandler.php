<?php
require_once('databaseClass.php');
class requestHandler {
    private $connection;
    private $database;
    function __construct() {
        $this->database = new Database();
        $this->connection = $this->database->connect();
    }
    function handleRequest() {
        
    }

    function testDatabase() { // displays all data in admin
        $stmt = $this->connection->query("SELECT * FROM admin");
        $data = $stmt->fetch();
        return var_dump($data);
    }
}

?>