<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION)) {
  session_start();
}
class Register
{

  public $host = "localhost";
  public $username = "tes";
  public $password = "0wi&lbRuPuv";
  public $dbname =  "Ajay";
  public $conn;

  public function __construct()
  {
    $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);
    if (mysqli_connect_errno()) {
      echo "connection failed ";
    }
  }

  public function insert($data)
  {

    $success = $this->conn->query($data);
    if ($success) {
      return true;
    } else {
      return false;
    }
  }
  public function login($email, $password)
  {
    $password = md5($password);
    if ($email != "" && $password != "") {
      $query = "SELECT * FROM Register_tb WHERE (email = '$email' or username ='$email')and `password`='$password'";
      $result = mysqli_query($this->conn, $query);
      if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $_SESSION['email'] = ($row['email']);
        $_SESSION['username'] = ($row['username']);
        header('location:../mailman/dashboard.php');
      } else {
        $_SESSION['errorEmail'] = $email;
        $_SESSION['errorPassword'] = $password;
        $_SESSION['name'] = "Username or password not matched";
        header("Location:../mailman/index.php");
      }
    } else {
      echo "<span class='text-danger'>Plaese fill the data </span>";
    }
  }
  public function profile($get)
  {
    $sql = $this->conn->query($get);
    $value = $sql->fetch_object();
    $this->data[] = $value;
    return $this->data;
  }
  public function logout()
  {
    unset($_SESSION['email']);

    header("Location:../mailman/index.php");
  }

  public function url($url)
  {
    header('location:' . $url);
  }

  public function getdata()
  {
    $sql = "SELECT * FROM Register_tb";
    $result = mysqli_query($this->conn, $sql);
    $arr = array();
    while ($data = mysqli_fetch_array($result)) {
      $arr[] = $data;
    }
    return $arr;
  }
  public function update($id)
  {
    $sql = "SELECT * FROM Register_tb where id='" . $id . "' ";
    $result = mysqli_query($this->conn, $sql);
    $data = mysqli_fetch_array($result);
    return  $data;
  }
  public function update_password($old_password, $email, $New_Password)
  {

    $sql = "SELECT `password` FROM `Register_tb` where `password` ='$old_password' && email='$email'";
    $query = mysqli_query($this->conn, $sql);

    $num = mysqli_fetch_array($query);

    if ($num > 0) {
      $sql = "UPDATE Register_tb SET `password`='$New_Password' where email='$email'";
      $query = mysqli_query($this->conn, $sql);

      $_SESSION['user'] = "Password Updated Successfully";
      header("Location:../mailman/profile.php");
    } else {
      echo "<script> alert('Old Password Not Matched')</script>";
    }
  }

  public function updatedata()
  {
    extract($_POST);
    $file = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = "../Register_image/"  . $file;

    if ($tempname != "") {
      move_uploaded_file($tempname, $folder);
      $query = "UPDATE  Register_tb SET `image`='$file', `Fname`='$fname',Lname='$lname',recovery_email='$remail' where id='$id'";
    } else {
      $query = "UPDATE  Register_tb SET  `Fname`='$fname',Lname='$lname',recovery_email='$remail' where id='$id'";
    }

    $queryget = mysqli_query($this->conn, $query);
    if ($queryget) {
      return true;
    } else {
      return false;
    }
  }
}


$obj = new Register();