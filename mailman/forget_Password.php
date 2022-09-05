<?php
if (!isset($_SESSION)) {
  session_start();
}
$obj->forget_password($password, $token);
if (isset($_GET['reset_token'])) {
  $token = $_GET['reset_token'];
  if (isset($_POST['update'])) {
    $password = $_POST['password'];
    $password = md5($password);
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

            <div class="col-sm-4"></div>
            <div class="col-sm-4 mt-5" style="border:2px solid red ;"><br>

                <!-- <div class="col-sm-4">
                    <img src="../images/password.png" width="100%">
                </div> -->
                <br>
                <form action="#" method="POST" onsubmit="return validation()">
                    <input type="password" class="form-control" placeholder="New Password" name="password" id="pass">
                    <span class="text-danger" id="password"></span><br><br>
                    <input type="password" class="form-control" placeholder="Comfrim Password" id="cpass">
                    <span class="text-danger" id="cpassword"></span><br>
                    <button type="submit" class="btn btn-success" name="update">Submit</button>
                    <input type="hidden" name="remail" />
                </form>
            </div>



        </div>
    </div>

    <script src="../Js/password.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


</body>

</html>
<?php
}
?>