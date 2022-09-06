<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SERVER['HTTP_REFERER'])) {

    header("Location:../mailman/dashboard.php");

    exit;
}

include '../php/database.php';
if (isset($_POST['update'])) {
    $old_password = $_POST['password'];
    $old_password = md5($old_password);
    $email = $_SESSION['email'];
    $New_Password = md5($_POST['New_password']);
    $obj->update_password($old_password, $email, $New_Password);
}


?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Forget Password</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row mt-5">
            <?php
            if (isset($_SESSION['old'])) {
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>!</strong><?php echo $_SESSION['old']   ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <?php
                unset($_SESSION['old']);
            }
            ?>
            <div class="col-sm-4"></div>

            <div class="col-sm-4 mt-5" style="border:2px solid red ;"><br>

                <form action="edit_password.php" method="POST" onsubmit="return validation()">
                    <input type="password" class="form-control" placeholder="Old Password" name="password"
                        id="old_password">
                    <span class="text-danger" id="change"></span><br><br>
                    <input type="password" class="form-control" placeholder="New Password" name="New_password"
                        id="pass">
                    <span class="text-danger" id="password"></span><br><br>
                    <input type="password" class="form-control" placeholder="Comfrim Password" id="cpass">
                    <span class="text-danger" id="cpassword"></span><br>
                    <button type="submit" class="btn btn-success" name="update">Submit</button>
                    <input type="hidden" name="remail" />
                </form>
            </div>



        </div>
    </div>

    <script src="../Js/change_password.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


</body>

</html>
<?php
// }
?>