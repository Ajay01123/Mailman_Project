<?php
if (!isset($_SESSION)) {
    session_start();
}
include '../php/database.php';
if (!isset($_SERVER['HTTP_REFERER'])) {

    header("Location:../mailman/index.php");

    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row">
            <?php
            if (isset($_SESSION['name'])) {
            ?>
            <div class="alert alert-danger alert-dismissible fade show" id="flash-msg" role="alert">
                <strong>Send</strong> <?php echo $_SESSION['name']  ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <?php
                unset($_SESSION['name']);
            }
            ?>
            <div class="col-sm-3 "></div>
            <div class="col-sm-5 mt-5 p-4 " style="border:2px solid red ;">
                <h1 class="display-7 p-5"> Recovery Email</h1>
                <form action="../php/smtpmail/mail.php" method="post" onsubmit="return validation()">

                    <input type="email" class="form-control" name="remail" id="remail" placeholder="recovery email">
                    <span class="text-danger" id="spanremail"></span><br>
                    <button type="submit" class="btn btn-primary" name="send">Send</button>

                </form>
            </div>

        </div>
    </div>
    </div>
    <script src="../Js/email.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>