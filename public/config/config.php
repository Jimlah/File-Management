<?php
//database.php  
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'file_db');
class Databases
{
    
    public $dbh;
    public $error;
    

    public function __construct()
    {
        try {
            $this->dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        } catch (PDOException $error) {
            exit("Error: " . $error->getMessage());
        }
        if (!$this->dbh) {
            echo 'Database Connection Error ' . mysqli_connect_error($this->dbh);
        }
    }


    


}
