<?php
if (!isset($_SERVER['HTTP_REFERER'])) {

    header("Location:../mailman/dashboard.php");

    exit;
}
include '../php/composer.php';
include '../php/login.php';
$record = $db->trash();
$sendrecord = $db->send();
$result = $db->draft_trash();
$em = $_SESSION['email'];
$query = "SELECT * FROM Register_tb where email='$em'";
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
    <title>dashboard</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php
            if (isset($_SESSION['user'])) {
            ?>
            <div class="alert alert-danger alert-dismissible fade show" id="flash-msg" role="alert">
                <strong></strong><?php echo $_SESSION['user']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <?php
                unset($_SESSION['user']);
            }
            ?>
            <?php
            if (isset($_SESSION['name'])) {
            ?>
            <div class="alert alert-info alert-dismissible fade show" id="flash-msg" role="alert">
                <strong></strong><?php echo $_SESSION['name']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <?php
                unset($_SESSION['name']);
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
                        <li><a class="dropdown-item" href="./profile.php">Profile</a></li>
                        <li><a class="dropdown-item" href="../php/logout.php">Logout</a></li>
                    </ul>
                    <!-- <img src="../images/profile.jpg" width="80" class="image"> -->
                    <img src="<?php echo '../Register_image/' . $row->image; ?>" width="60" height="60"
                        style="border-radius:50px;">
                </div>
            </div>
        </div>
        <div class="row ">

            <div class="col-sm-2 text-center " style="min-height:590px;background:antiquewhite;">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-secondary mt-5" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop" class="mt-3">
                    <span class="text"><i class="fa fa-pen"> </i> Compose </span>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog  modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">

                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <form action="../php/composer.php" method="POST" enctype="multipart/form-data">
                                    <input type="text" class="form-control" placeholder="TO" name="to"><br>
                                    <input type="text" class="form-control" placeholder="CC" name="cc"><br>
                                    <input type="text" class="form-control" placeholder="BCC" name="bcc"><br>
                                    <input type="text" class="form-control" placeholder="Subject" name="sub"><br>
                                    <textarea class="form-control" rows="5" cols="3" placeholder="Message"
                                        name="msg"></textarea><br>
                                    <input type="file" class="form-control" placeholder="Subject" name="Image[]"
                                        multiple><br>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="submit">Sent</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <nav class="nav flex-column">
                    <a class="nav-link active" aria-current="page" href="../mailman/dashboard.php"> <i
                            class="fa-solid fa-inbox"></i> Inbox</a>

                    <a class="nav-link" href="../mailman/sent.php"><i class="fa fa-paper-plane" aria-hidden="true"></i>
                        Sent</a>
                    <a class="nav-link" href="../mailman/draft.php"><i class="fa-regular fa-file"></i> Draft</a>
                    <a class="nav-link" href="../mailman/trash.php"><i class="fa-solid fa-trash"></i> Trash</a>
                </nav>
            </div>
            <div class="col-sm-10" id="inbox">
                <div class="table-responsive" id="no-more-tables">

                    <table class="table table-hover">

                        <tr>
                            <th>
                                <input type="checkbox" id="all" class="check">
                            </th>

                            <th>
                                <button type="submit" name="delete" form="my-form" id="btn" disabled="true"
                                    class="btn btn-danger">
                                    Delete</button>
                                <button type="submit" form="my-form" name="update" class=" btn btn-info" id="restore"
                                    disabled="true">Restore</button>

                            </th>

                        </tr>
                        </thead>

                        <form action="../php/trash_delete.php" method="POST" id="my-form">

                            <?php
                            while ($row = mysqli_fetch_array($record)) {
                            ?>
                            <tr id="table">
                                <td style="width:5px;">
                                    <input type="checkbox" class="check " name="delete_data[]"
                                        value="<?php echo $row['Id']; ?>" />
                                </td>
                                <div>

                                    <?php if ($row['Draft'] == 3  && $row['Send_delete'] == 0 && $row['Inbox_detete'] == 0) {
                                        ?>
                                    <td class="<?php echo $row['Id']; ?>"><?php echo $row['To']; ?></td>
                                    <?php

                                        } elseif ($row['Inbox_detete'] != 0) {
                                        ?>
                                    <td class="<?php echo $row['Id']; ?>"><?php echo $row['From']; ?></td>
                                    <?php } else {
                                        ?> <td class="<?php echo $row['Id']; ?>"><?php echo $row['From']; ?></td>
                                    <?php
                                        } ?>

                                    <td class="<?php echo $row['Id']; ?>"><?php echo $row['Subject']; ?></td>
                                    <td class="<?php echo $row['Id']; ?>"><?php echo $row['DateTime']; ?></td>
                                </div>

                            </tr>
                            <?php
                            }
                            ?>
                            <?php
                            while ($row = mysqli_fetch_array($sendrecord)) {
                            ?>
                            <tr id="table">
                                <td style="width:5px;">
                                    <input type="checkbox" class="check " name="delete_data[]"
                                        value="<?php echo $row['Id']; ?>" />
                                </td>
                                <div>

                                    <?php if ($row['Send_delete'] == 0) {
                                        ?>
                                    <td class="<?php echo $row['Id']; ?>"><?php echo $row['To']; ?></td>
                                    <?php

                                        } elseif ($row['Inbox_detete'] != 0) {
                                        ?>
                                    <td class="<?php echo $row['Id']; ?>"><?php echo $row['From']; ?></td>
                                    <?php } else {
                                        ?> <td class="<?php echo $row['Id']; ?>"><?php echo $row['To']; ?></td>
                                    <?php
                                        } ?>

                                    <td class="<?php echo $row['Id']; ?>"><?php echo $row['Subject']; ?></td>
                                    <td class="<?php echo $row['Id']; ?>"><?php echo $row['DateTime']; ?></td>
                                </div>

                            </tr>
                            <?php
                            }
                            ?>
                            <?php
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <tr id="table">
                                <td style="width:5px;">
                                    <input type="checkbox" class="check " name="delete_data[]"
                                        value="<?php echo $row['Id']; ?>" />
                                </td>
                                <div>

                                    <?php if ($row['Draft'] == 3) {
                                        ?>
                                    <td class="<?php echo $row['Id']; ?>"><?php echo $row['To']; ?></td>
                                    <?php

                                        } elseif ($row['Inbox_detete'] != 0) {
                                        ?>
                                    <td class="<?php echo $row['Id']; ?>"><?php echo $row['From']; ?></td>
                                    <?php } else {
                                        ?> <td class="<?php echo $row['Id']; ?>"><?php echo $row['To']; ?></td>
                                    <?php
                                        } ?>

                                    <td class="<?php echo $row['Id']; ?>"><?php echo $row['Subject']; ?></td>
                                    <td class="<?php echo $row['Id']; ?>"><?php echo $row['DateTime']; ?></td>
                                </div>

                            </tr>
                            <?php
                            }
                            ?>
                            <tbody>
                                <tr>
                                </tr>
                            </tbody>
                    </table>
                    <?php
                    include '../php/dbconnect.php';
                    $page =  $_GET['page'];

                    $start_per = 20;
                    $query = " SELECT * FROM Send_Msg where Trash_delete =1  ";
                    $result = mysqli_query($conn, $query);
                    $total = mysqli_num_rows($result);
                    $total_page = ceil($total / $start_per);
                    ?>
                    <nav aria-label="Page navigation example">
                        <ul class='pagination text-center' id="pagination">
                            <?php if ($page > 1) : ?>
                            <li class="page-item"><a class="page-link"
                                    href='trash.php?page=<?php echo $page - 1; ?>'>Previous</a></li>
                            <?php endif ?>
                            <?php for ($i = 1; $i <= $total_page; $i++) :  ?>
                            <li class="page-item" id="<?php echo $i; ?>"><a class="page-link"
                                    href='trash.php?page=<?php echo $i; ?>'><?php echo $i; ?></a></li>
                            <?php endfor; ?>
                            <?php if ($total_page > $page) : ?>
                            <li class="page-item"><a class="page-link"
                                    href='trash.php?page=<?php echo $page + 1; ?>'>Next</a></li>
                            <?php endif ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12" style="min-height:98px; background:black"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../Js/trash.js"></script>
    <script>

    </script>
</body>

</html>