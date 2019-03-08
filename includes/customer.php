<?php
require_once('../../includes/database.php');

class Customer{
    private $firstname;
    private $lastname;
    private $adress;
    private $city;
    private $phoneNr;
    private $email;
    private $connection;
    private $database;

    function __construct($firstname, $lastname, $adress, $city, $phoneNr, $email)    {
        $this->database = new Database();
        $this->connection = $this->database->connect();
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->adress = $adress;
        $this->city = $city;
        $this->phoneNr = $phoneNr;
        $this->email = $email;   
    }
    function shipping(){
        try {
            $sql = "SELECT COUNT(EmailAdress) AS num FROM customer WHERE EmailAdress = :email";
            $statement = $this->connection->prepare($sql);
            $statement->bindParam(':email', $this->email);
            $statement->execute();

            $emailExists = $statement->fetch(PDO::FETCH_ASSOC);
            if($emailExists['num'] == 0) {
                $statement = $this->connection->prepare("INSERT INTO customer (Firstname, Lastname, Adress, City, PhoneNr, EmailAdress) VALUES ( :firstname, :lastname, :adress, :city, :phoneNr, :email)");
                $statement->bindParam(':firstname', $this->firstname);
                $statement->bindParam(':lastname', $this->lastname);
                $statement->bindParam(':adress', $this->adress);
                $statement->bindParam(':city', $this->city);
                $statement->bindParam(':phoneNr', $this->phoneNr);
                $statement->bindParam(':email', $this->email);
                $statement->execute();
            }

            
        }   catch (EXCEPTION $err) {
            throw new Exception($err);
        }
    }
}
?>