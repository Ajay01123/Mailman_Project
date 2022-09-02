<?php
session_start();
include 'database.php';
// if(!isset($_SESSION)){

// }
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

if (isset($_POST['submit'])) {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $username = $_POST['username'];
  $email = $_POST['email'];

  $remail = $_POST['remail'];
  $password = $_POST['password'];
  $password = md5($password);

  $file = $_FILES['image']['name'];
  $tempname = $_FILES['image']['tmp_name'];

  $folder = "../Register_image/" . $file;
  move_uploaded_file($tempname,  $folder); {
    $query = "INSERT INTO Register_tb(fname,lname,username,email,recovery_email,`password`,`image`)VALUES('$fname','$lname','$username','$email','$remail','$password','$file')";

    if ($obj->insert($query)) {
      //$_SESSION['msg'] = "Registration Successfully";
      $_COOKIE['msg'] = "Registration Successfully";

      if (isset($_COOKIE['msg'])) {

?>
<div class="alert alert-success alert-dismissible fade show" id="flash-msg" role="alert">
    <strong>Success!</strong><?php echo $_COOKIE['msg'];   ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<?php
        unset($_COOKIE['msg']);
      }
      //header('location:../mailman/index.php');
    } else {
      echo "Your Registration is not Successfully";
    }
  }
}