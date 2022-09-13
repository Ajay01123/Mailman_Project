<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (!isset($_SESSION)) {
  session_start();
}

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
      echo "connection failed ";
      // exit();
    }
  }
  public function insertRecord($to, $cc, $bcc, $sub, $msg, $from, $draft, $file, $draft_delete, $inbox_delete, $send_delete, $read, $Bcc_delete, $Cc_delete, $date)

  {
    $m = serialize($file);
    $query = "INSERT INTO Send_Msg(`To`,Cc,`Bcc`,`Subject`,`Msg`,`From`,`Draft`,`Multiple`,`Draft_delete`,`Inbox_detete`,`Send_delete`,`Read`,`Bcc_delete`,`Cc_delete`,`Datetime`)
    VALUES('$to','$cc','$bcc','$sub','$msg','$from','$draft','$m','$draft_delete','$inbox_delete','$send_delete','$read','$Bcc_delete', '$Cc_delete','$date')";

    $result = mysqli_query($this->conn, $query);
    if ($result) {

      $_SESSION['name'] = "Message Send  Successfully";

      header('location:../mailman/dashboard.php');
    } else {
      echo "not";
    }
  }
  public function closeRecord($to, $cc, $bcc, $sub, $msg, $from, $draft, $file, $draft_delete, $inbox_delete, $send_delete, $date)

  {

    $m = serialize($file);;
    $query = "INSERT INTO Send_Msg(`To`,`Cc`,`Bcc`,`Subject`,`Msg`,`From`,`Draft`,`Multiple`,`Draft_delete`,`Inbox_detete`,`Send_delete`,`Datetime`)
    VALUES('$to','$cc','$bcc','$sub','$msg','$from','$draft','$m','$draft_delete','$inbox_delete','$send_delete','$date')";

    $result = mysqli_query($this->conn, $query);
    if ($result) {

      $_SESSION['msg'] = "Message close";

      header('location:../mailman/dashboard.php');
    } else {
      echo "not";
    }
  }

  public function getdata()
  {
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
    } else {
      $page = 1;
    }
    $start_per = 10;
    $start_from = ($page - 1) * 10;
    $from = $_SESSION['email'];
    $query = "SELECT * FROM Send_Msg  where Send_delete = 1 AND `From` = '$from' ORDER BY Id DESC LIMIT $start_from, $start_per  ";
    $result = mysqli_query($this->conn, $query);

    return  $result;
  }


  public function draft()
  {
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
    } else {
      $page = 1;
    }
    $start_per = 8;
    $start_from = ($page - 1) * 8;
    $from = $_SESSION['email'];
    $sql = "SELECT * FROM Send_Msg where Draft= 2 AND `From` = '$from'  ORDER BY Id DESC LIMIT $start_from, $start_per ";

    $result = mysqli_query($this->conn, $sql);
    $arr = array();
    while ($data = mysqli_fetch_array($result)) {
      $arr[] = $data;
    }
    return $arr;
  }
  public function trash()
  {

    if (isset($_GET['page'])) {
      $page = $_GET['page'];
    } else {
      $page = 1;
    }
    $start_per = 4;
    $start_from = ($page - 1) * 4;
    $from = $_SESSION['email'];

    $sql = "SELECT * FROM Send_Msg where `To`= '$from' AND`Inbox_detete`= 0 or `Cc`= '$from' AND`Cc_delete`=0 or `Bcc`= '$from' AND`Bcc_delete`= 0  ORDER BY Id DESC LIMIT $start_from, $start_per ";
    $result = mysqli_query($this->conn, $sql);
    return $result;
  }
  public function send()
  {
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
    } else {
      $page = 1;
    }
    $start_per = 4;
    $start_from = ($page - 1) * 4;
    $from = $_SESSION['email'];
    $sql = "SELECT * FROM Send_Msg where  `From`='$from' AND `Send_delete` = 0 ORDER BY Id DESC LIMIT $start_from, $start_per ";
    $result = mysqli_query($this->conn, $sql);
    return $result;
  }
  public function draft_trash()
  {
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
    } else {
      $page = 1;
    }
    $start_per = 10;
    $start_from = ($page - 1) * 10;
    $from = $_SESSION['email'];
    $sql = "SELECT * FROM Send_Msg where  `From`='$from' AND `Draft` = 3 ORDER BY Id DESC LIMIT $start_from, $start_per ";
    $result = mysqli_query($this->conn, $sql);
    return $result;
  }
  public function inbox($from)
  {
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
    } else {
      $page = 1;
    }
    $start_per = 10;
    $start_from = ($page - 1) * 10;
    $from = $_SESSION['email'];

    $query = "SELECT * FROM Send_Msg where  `To` = '$from' AND `Inbox_detete`= 1 or `Cc`='$from' AND Cc_delete = 1 or `Bcc`='$from'ORDER BY Id DESC LIMIT $start_from, $start_per ";

    $result = mysqli_query($this->conn, $query);
    $arr = array();
    while ($data = mysqli_fetch_array($result)) {
      $arr[] = $data;
    }
    return $arr;
  }

  public function Draft_delete($id)
  {
    $sql = "UPDATE Send_Msg SET Send_delete= 0 ,Trash_delete=1 WHERE Id=$id";
    $query = mysqli_query($this->conn, $sql);
    if ($query) {
      return true;
    } else {
      return mysqli_errno($this->conn);
    }
  }
  public function read($total)
  {

    $query = " SELECT * FROM Send_Msg where  `read`= 1  ";

    $result = mysqli_query($this->conn, $query);
    $total = mysqli_num_rows($result);
    return $total;
  }
  public function reply($to, $msg, $from, $Inbox_detete, $date, $subject, $CC, $Bcc, $Cc_delete, $Bcc_delete, $Send_delete)
  {
    $query = "INSERT INTO Send_Msg(`To`, `From`,`Msg`,`Inbox_detete`,`Datetime`,`Subject`,`Cc`,`Bcc`,`Cc_delete`,`Bcc_delete`,`Send_delete`) 
    VALUES('$to','$from','$msg','$Inbox_detete ','$date','$subject','$CC','$Bcc','$Cc_delete','$Bcc_delete',$Send_delete)";
    $sql = mysqli_query($this->conn, $query);
    if ($sql) {
      //echo "Send Successfully";
    } else {
      echo "not";
    }
  }
}
$db = new Model();