<?php
@session_start();

class dbConn{
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "coop";
    private $caf = "";

    public function connDB(){
        $conn = mysqli_init();
        try{
        mysqli_real_connect($conn, $this->host, $this->user, $this->pass, $this->db);
        mysqli_set_charset($conn,"utf8");

        if(!$conn){
            die("Connection failed: " . mysqli_connect_error());
            return false;
        }

        //error_reporting(0);
        //ini_set('display_errors', 0);
        return $conn;

        }catch(Exception $e){
            header('Location: ../views/error.php?error='.$e->getMessage().'&type='.$e->getCode().'&errortype=database');
        }
    }

    public function closeDB($conn){
        mysqli_close($conn);
    }
}

$conn = new dbConn();
define('DB_CONN', $conn->connDB());

?>