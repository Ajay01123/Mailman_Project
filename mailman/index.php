<?php

if (!isset($_SESSION)) {
    session_start();
}

include '../php/login.php ';
include '../php/database.php';
error_reporting(0);
if ($_SESSION['email'] != "") {

    header("Location:../mailman/dashboard.php");
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

    <title>Sign-in-page</title>
</head>

<body>

    <div class="container">
        <div class="row mt-5 " style="border:2px solid red;">
            <?php
            if (isset($_SESSION['status'])) {

            ?>
            <div class="alert alert-primary alert-dismissible fade show" id="flash-msg" role="alert">
                <strong>Send</strong> <?php echo $_SESSION['status']  ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <?php
                unset($_SESSION['status']);
            }
            ?>
            <?php
            if (isset($_SESSION['name'])) {
            ?>
            <div class="alert alert-danger alert-dismissible fade show" id="flash-msg" role="alert">
                <strong>ERROR!</strong> <?php echo $_SESSION['name']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <?php
                unset($_SESSION['name']);
            }
            ?>
            <?php
            if (isset($_SESSION['user'])) {
            ?>
            <div class="alert alert-secondary alert-dismissible fade show" id="flash-msg" role="alert">
                <strong>Success</strong> <?php echo $_SESSION['user']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <?php
                unset($_SESSION['user']);
            }

            ?>

            <div class="col-sm-5 my-4">
                <img src="../images/emai.jpg" class="img-fluid" width="500">
            </div>
            <div class="col-sm-6 my-5 ">
                <h1>Login to your account</h1>
                <div id="mt"></div>
                <form action="../php/login.php" method="post" onsubmit="return validation()" id="myfrom">
                    <br><br>

                    <input type="text" class="form-control" placeholder="Email/Username" name="email" id="email"
                        value="<?php if (isset($_SESSION['errorEmail']) !== null) echo $_SESSION['errorEmail'];
                                                                                                                        unset($_SESSION['errorEmail']) ?>">
                    <span class="text-danger" id="semail"></span><br><br>
                    <input type="password" class="form-control" placeholder="Password" name="password" id="password"
                        value="<?php if (isset($_SESSION['errorPassword']) !== null) echo $_SESSION['errorPassword'];
                                                                                                                            unset($_SESSION['errorPassword']) ?>">
                    <span class="text-danger" id="pass"></span><br><br>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" name="submit" class="btn btn-outline-secondary  btn-lg float-right"
                            id="login">Sign-in
                        </button>
                    </div>
                    <a href="../mailman/send_email.php">Forget Password</a>
                    <p>Don`t have an account yet?</p>
                    <a href="Sign-up.php">Create one </a>

                </form>
            </div>
        </div>
    </div>



    <script src="../Js/style.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</body>

</html>

<script>
$(document).ready(function() {
    $("#flash-msg").delay(3000).fadeOut("slow");
});


$(document).ready(function() {
    $("#login1").click(function(e) {
        e.preventDefault();
        var email = $('#email').val();
        var password = $('#password').val();

        $.ajax({
            url: "../php/login.php",
            type: "POST",
            data: {
                email: email,
                password: password
            },
            success: function(result) {

            }


        });
        //e.preventDefault();
    })
})
</script>
</script>

</body>

</html>