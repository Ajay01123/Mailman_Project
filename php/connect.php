<?php
class Model
{
    public $host = 'localhost';
    public $username = 'tse';
    public $password = '0wi&lbRuPuv';
    public $dbname = 'Ajay';
    public $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);
        if (mysqli_connect_errno()) {
            echo "connection failed  ";
        }
    }
    public function search($input)
    {

        $sql = "SELECT * FROM Send_Msg Where `Inbox_detete`=1 AND `To` LIKE '{$input}%' OR `From` LIKE '{$input}%' OR Cc LIKE '{$input}%' OR Msg LIKE '{$input}%' ";
        $query = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($query) > 0) {
        } else {
            echo "<span class='text-danger'>Data Not Found</span>";
        }
        return $query;
    }
    public function forget_password($password, $token)
    {
        $update = "UPDATE `Register_tb` SET `password`= '$password', reset_date =NULL  WHERE reset_token= '$token'";
        if (mysqli_query($this->conn, $update)) {
            $_SESSION['user'] = "Password Updated Successfully";
            //header('location:../mailman/index.php');
        } else {
            echo "not updated";
        }
    }
}

$db = new Model();