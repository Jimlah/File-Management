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

    public function upload($status, $user_id)
    {
        if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) {
            
            $fileName = $_FILES['uploadedFile']['name'];
            $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
            $fileSize = $_FILES['uploadedFile']['size'];
            $fileType = $_FILES['uploadedFile']['type'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
 

            $rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
            // echo var_dump($rootDir . "\File-Management\document");

            $target_dir = $rootDir. "\Projects\File-Management\document\\";
            $target_file = $target_dir . basename($fileName);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            if (move_uploaded_file($fileTmpPath, $target_file)) {
                
                $name = $fileName;
                $user_id = $user_id;
                $status = $status;

                $sql = 'INSERT INTO `file`(`user_id`, `name`, `status`) VALUES (:user_id, :name, :status)';
                $query = $this->dbh->prepare($sql);
                $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
                $query->bindParam(':name', $name, PDO::PARAM_STR);
                $query->bindParam(':status', $status, PDO::PARAM_STR);
                $query->execute();
                return "The file " . htmlspecialchars(basename($fileTmpPath)) . $status . $user_id . " has been uploaded.";
                
            } else {
                return "Sorry, there was an error uploading your file.";
            }
           
        }

        
    }



    public function getAllFiles()
    {
        $sql = 'SELECT * FROM file';
        $query = $this->dbh->prepare($sql);
        $query->execute();
        $result = $query->fetchALL(PDO::FETCH_OBJ);
        $dt = json_encode($result);
        return $dt;
    }


    public function sendRequest($recieve_id, $sent_id, $file_id, $reason)
    {

        $sql = 'INSERT INTO `request`( `receive_id`, `file_id`, `sent_id`, `reason`) VALUES (:receive_id, :file_id, :sent_id, :reason)';
        $query = $this->dbh->prepare($sql);
        $query->bindParam(':receive_id', $recieve_id, PDO::PARAM_STR);
        $query->bindParam(':file_id', $file_id, PDO::PARAM_STR);
        $query->bindParam(':sent_id', $sent_id, PDO::PARAM_STR);
        $query->bindParam(':reason', $reason, PDO::PARAM_STR);
        $query->execute();
    }

}

