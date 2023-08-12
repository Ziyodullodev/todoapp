<?php




class Database {

    private $username = "todoapp";
    private $db_name = "todoapp";
    private $password = "qP5pS8lR9m";
    private $db_host = "todoapp";
    
    public $db;

    function __construct()
    {

        $this->connect();
    }


    function connect()
    {
        try {
            // $dbPath = 'db/db.sqlite3';
            $pdo = new PDO("mysql:host=".$this->db_host.";dbname=".$this->db_name, $this->username, $this->password);
        } catch (PDOException $e) {
            echo "Error connecting to database: " . $e->getMessage();
            die();
        }
        // echo "successfully connected";
        $this->db = $pdo;
    }

}