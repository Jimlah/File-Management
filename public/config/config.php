<?php
//database.php  
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'file_db');
class Database
{

    public $dbh;
    public $error;


    public function __construct()
    {
        try {
            $this->dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        } catch (PDOException $e) {
            exit("Error: " . $e->getMessage());
        }
        if (!$this->dbh) {
            echo 'Database Connection Error ' . mysqli_connect_error($this->dbh);
        }
    }

    public function checkMail($email, $username)
    {
        try {
            $sql = 'SELECT * FROM `user` WHERE username = :username OR email=:email';
            $query = $this->dbh->prepare($sql);
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->bindParam(':username', $username, PDO::PARAM_STR);
            $query->execute();
            $query->fetchAll(PDO::FETCH_OBJ);

            if ($query->rowCount() != 0) {
                return 'Username or Email Already Exist';
            } else {
                return 'present';
            }
        } catch (PDOException $e) {
            exit("Error: " . $e->getMessage());
        }
    }

    public function registerUser($name, $username, $email, $password)
    {
        $password = md5($password);

        $sql = 'INSERT INTO `user`(`name`, `username`, `email`, `password`) VALUES (:name, :username, :email, :password)';
        $query = $this->dbh->prepare($sql);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':username', $username, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->execute();
    }

    public function sign_in($email, $username, $password)
    {
        $password = md5($password);

        try {
            $sql = 'SELECT * FROM `user` WHERE (username = :username OR email=:email) AND password = :password';
            $query = $this->dbh->prepare($sql);
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->bindParam(':username', $username, PDO::PARAM_STR);
            $query->bindParam(':password', $password, PDO::PARAM_STR);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_OBJ);

            if ($result) {
                session_start();
                $_SESSION['id'] = $result->id;
                $_SESSION['name'] = $result->name;
                $_SESSION['username'] = $result->username;
                $_SESSION['email'] = $result->email;
                $_SESSION['password'] = $result->password;
                $_SESSION['timestamp'] = time();
                return 'Login Successful';
            } else {
                return 'Username or Email does not  Exist';
            }
        } catch (PDOException $e) {
            exit('Error :' . $e->getMessage());
        }
        
    }

    public function log_out()
    {
        session_start();
        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 60 * 60,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }
        unset($_SESSION['login']);
        session_destroy(); // destroy session
        header("location:index.php"); 
    }
}

