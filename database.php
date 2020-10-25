<?php
class Dbh{
    
    private $server = 'localhost';
    private $user = 'root';
    private $password = '';
    private $database = 'testing';
    public $con;

    public function connect() {
        $dsn = "mysql:host=" .$this->server. ";dbname=" .$this->database;
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try{
            $this->con = new PDO($dsn, $this->user, $this->password, $options);
        }
        catch(PDOException $e){
            echo "Connection Error". $e->getMessage();
        }
        
        return $this->con;
    }
}

