<?php
class Model
{
    public $host = 'localhost';
    public $username = 'root';
    public $password = 'hestabit';
    public $dbname = 'mailman';
    public $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);
        if (mysqli_connect_errno()) {
            echo "connection failed ";
        }
    }
    public function search($input)
    {
        $sql = "SELECT * FROM Send_Msg Where `To` LIKE '{$input}%' OR `From` LIKE '{$input}%' OR Cc LIKE '{$input}%' OR Msg LIKE '{$input}%' ";
        $query = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($query) > 0) {
        } else {
            echo "<span class='text-danger'>Data Not Found</span>";
        }
        return $query;
    }
}
$db = new Model();
