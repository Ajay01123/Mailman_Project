<?php
if (!isset($_SESSION)) {
    session_start();
}

include '../php/database.php';
if (!isset($_SERVER['HTTP_REFERER'])) {

    header("Location:../mailman/dashboard.php");

    exit;
}

$em = $_SESSION['email'];
$mp = $_SESSION['username'];
$query = "SELECT * FROM Register_tb where  username='$em'||email='$em'";
$obj->profile($query);
foreach ($obj->data as $row) {
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/style.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" rel="stylesheet">
    <title>Profile</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php
            if (isset($_SESSION['user'])) {
            ?>
            <div class="alert alert-success alert-dismissible fade show" id="flash-msg" role="alert">
                <strong></strong> <?php echo $_SESSION['user']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <?php
                unset($_SESSION['user']);
            }
            ?>
            <div class="col-sm-3" style="min-height: 80px; background:antiquewhite;">
                <div class="span1">
                    <img src="../images/emai.jpg" width="50">
                    <span class="span">MailMan</span>
                </div>
            </div>
            <div class="col-sm-5" style="min-height: 80px; background:antiquewhite;">
                <form class="">
                    <input class=" mt-3 search" type="search" placeholder="  Search">
                    <!-- <sapn ><i class="fa-brands fa-sistrix"></i></sapn> -->

                </form>
            </div>
            <div class="col-sm-4 " style="min-height: 80px; background:antiquewhite;">
                <div class="dropdown mt-2 mx-4">
                    <a class=" btn btn-light btn-lg dropdown-toggle" id="dropdownMenuLink" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <?php echo $_SESSION['email']; ?>
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="../php/logout.php">Logout</a></li>

                    </ul>
                    <img src="<?php echo '../Register_image/' . $row->image; ?>" width="80" height="80"
                        style="border-radius: 50%;">
                </div>

            </div>
        </div>
        <div class="row mt-5 ">
            <div class="col-sm-3"></div>
            <div class="col-sm-6" style="background:white; border:2px solid red;">

                <h1>Profile</h1>
                <span> </span>
                <div class="col-sm-10">

                    <form action="#" method="POST" enctype="multipart/form-data" onsubmit="return validation()">
                        <div class="row ">
                            <?php



                            ?>

                            <div class="col-md-2 order-md-last mb-3" id="preview">
                                <!-- <img src="../images/index.png" id="default-preview" class="text-center"style="width: 150px;"   > -->
                                <img src="<?php echo '../Register_image/' . $row->image; ?>" width="150" height="150"
                                    style="border-radius: 50%;">
                                <div id="imgpreview"></div>

                                <span class="text-danger" id="InpImg"></span>
                            </div>
                            <div class="input">
                            </div>
                            <div class="col-md-10 ">
                                <div class="row">
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" placeholder="Enter your first name"
                                            id="fname" name="fname" value="<?php echo $row->fname; ?>">
                                        <span class="text-danger" id="txtname"></span><br>
                                        <input type="text" class="form-control" placeholder="email(Primary)" id="email"
                                            name="email" value="<?php echo $row->email; ?>">
                                        <span class="text-danger" id="lastname"></span><br>
                                        <div>
                                            <input type="email" class="form-control" name="remail"
                                                placeholder="Enter your Email" id="remail"
                                                value="<?php echo $row->recovery_email; ?>">
                                            <!-- <span <?php echo $msg ?>></span> -->
                                        </div>
                                        <span class="text-danger" id="useremail"></span><br>
                                        <input type="text" class="form-control" placeholder="Select Username"
                                            name="username" id="user" value="<?php echo $row->username; ?>">
                                        <span class="text-danger" id="username"></span><br>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-8">

                                        <a href="../mailman/profile _edit.php?id=<?php echo $row->id ?>">Edit
                                            Profile</a>&nbsp;&nbsp;&nbsp;
                                        <a href="../mailman/edit_password.php?id=<?php echo $row->id ?>">Change
                                            Password</a>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>

</body>

</html>