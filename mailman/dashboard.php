<?php

include '../php/composer.php';
include_once '../php/login.php';

$record = $db->inbox($_SESSION['email']);
$em = $_SESSION['email'];

$mt = $_SESSION['username'];

$query = "SELECT * FROM Register_tb where username ='$mt' or email='$em'";
$obj->profile($query);
foreach ($obj->data as $row) {
}

if ($_SESSION['email'] == "") {
    header("Location:../mailman/index.php");
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
            if (isset($_SESSION['name'])) {
            ?>
            <div class="alert alert-success alert-dismissible fade show" id="flash-msg" role="alert">
                <strong>Success!</strong> <?php echo $_SESSION['name']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <?php
                unset($_SESSION['name']);
            }
            ?>
            <?php
            if (isset($_SESSION['status'])) {
            ?>
            <div class="alert alert-success alert-dismissible fade show" id="flash-msg" role="alert">
                <strong></strong><?php echo $_SESSION['status']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <?php
                unset($_SESSION['status']);
            }
            ?>
            <?php
            if (isset($_SESSION['msg'])) {
            ?>
            <div class="alert alert-danger alert-dismissible fade show" id="flash-msg" role="alert">
                <strong></strong><?php echo $_SESSION['msg']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <?php
                unset($_SESSION['msg']);
            }
            ?>
            <?php
            if (isset($_SESSION['user'])) {
            ?>
            <div class="alert alert-danger alert-dismissible fade show" id="flash-msg" role="alert">
                <strong>!</strong><?php echo $_SESSION['user']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <?php
                unset($_SESSION['user']);
            }
            ?>
            <span id="success"></span>
            <div class="col-sm-3" style="min-height: 80px; background:antiquewhite;">
                <div class="span1">
                    <img src="../images/emai.jpg" width="50">
                    <span class="span">MailMan</span>
                </div>
            </div>
            <div class="col-sm-5" style="min-height: 80px; background:antiquewhite;">
                <form class="">
                    <input class=" mt-3 search" type="search" id="search1" placeholder="  Search">
                    <!-- <sapn ><i class="fa-brands fa-sistrix"></i></sapn> -->

                </form>
            </div>
            <div class="col-sm-4 " style="min-height: 80px; background:antiquewhite;">
                <div class="dropdown mt-2 mx-5">
                    <a class="btn btn-light btn-lg dropdown-toggle" id="dropdownMenuLink" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <?php echo $_SESSION['username']; ?>
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

            <div class="col-sm-2 text-center " style="min-height:600px;background:antiquewhite;">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-secondary mt-5" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop" class="mt-3">
                    <span class="text"><i class="fa fa-pen"></i> Compose </span>
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

                                <form action="../php/composer.php" method="POST" enctype="multipart/form-data"
                                    onsubmit="return validation()">
                                    <input type="email" class="form-control" placeholder="TO" name="to"><br>
                                    <input type="email" class="form-control" placeholder="CC" name="cc"><br>
                                    <input type="email" class="form-control" placeholder="BCC" name="bcc"><br>
                                    <input type="text" class="form-control" placeholder="Subject" name="sub"><br>
                                    <textarea class="form-control" rows="5" cols="3" placeholder="Message"
                                        name="msg"></textarea><br>
                                    <input type="file" class="form-control" name="Image[]" id="image" multiple>
                                    <span class="text-danger" id="Img"></span>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal" name="close"
                                    id='close'>Close</button>
                                <button type="submit" class="btn btn-primary" name="submit" id="submit">Sent</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <nav class="nav flex-column ">
                    <a class="nav-link active" aria-current="page" href="#">
                        <i class="fa-solid fa-inbox"></i> Inbox</a>

                    <a class="nav-link" href="../mailman/sent.php">
                        <i class="fa fa-paper-plane" aria-hidden="true"></i> Sent</a>
                    <a class="nav-link" href="../mailman/draft.php"><i class="fa-regular fa-file"></i> Draft</a>
                    <a class="nav-link" href="../mailman/trash.php"><i class="fa-solid fa-trash"></i> Trash</a>

                </nav>


            </div>

            <div class="col-sm-10" id="inbox">
                <div id="search_result1"></div>
                <br>
                <div class="card" style="width: 100%;">
                    <div class="card-header">
                        <h4> Inbox</h4>
                    </div>
                    <div class="table-responsive" id="no-more-tables">
                        <form action="../php/inbox_delete.php" method="POST" id="my-form">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            <input type="checkbox" id="checkall" class="checkItem check">
                                        </th>


                                        <th>
                                            <button type="submit" form="my-form" name="update" class="btn btn-danger"
                                                id="btn" disabled="true">Delete</button>
                                            <button type="button" id="read" class="btn btn-dark" name="Read"
                                                disabled="false">Read</button>

                                        </th>
                                    </tr>
                                </thead>


                                <?php

                                foreach ($record as $row) {

                                ?>
                                <tr id="table">

                                    <td style="width:5px;">
                                        <input type="checkbox" class="checkItem Item1" name=" delete_data[]"
                                            value=" <?php echo $row['Id']; ?>">
                                    </td>
                                    <div>

                                        <td class="<?php echo $row['Id']; ?>"><?php echo $row['From']; ?></td>
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
                        </form>


                    </div>
                </div>
                <br>
                <?php
                include '../php/dbconnect.php';
                error_reporting(0);
                $page =  $_GET['page'];
                $start_per = 20;
                $sql = " SELECT * FROM Send_Msg where  Inbox_detete= 1  ";
                $result = mysqli_query($conn, $sql);
                $total = mysqli_num_rows($result);

                $total_page = ceil($total / $start_per);

                ?>

                <nav aria-label="Page navigation example">
                    <ul class='pagination text-center' id="pagination">

                        <?php if ($page > 1) : ?>

                        <li class="page-item"><a class="page-link"
                                href='dashboard.php?page=<?php echo $page - 1; ?>'>Previous</a></li>
                        <?php endif ?>
                        <?php for ($i = 1; $i <= $total_page; $i++) :  ?>
                        <li class="page-item" id="<?php echo $i; ?>"><a class="page-link"
                                href='dashboard.php?page=<?php echo $i; ?>'><?php echo $i; ?></a></li>
                        <?php endfor; ?>
                        <?php if ($total_page > $page) : ?>
                        <li class="page-item"><a class="page-link"
                                href='dashboard.php?page=<?php echo $page + 1; ?>'>Next</a></li>
                        <?php endif ?>

                    </ul>
                </nav>

            </div>

        </div>

        <div class="row">
            <div class="col-sm-12" style="min-height:88px; background:black"></div>
        </div>
    </div>
    <div class="row">

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="../php/reply.php" method="POST" id="myfrom">
                            <input type="email" class="form-control" name="to" id="to_modal" readonly>

                            <br>
                            <input type="text" class="form-control" name="subject" id="sub-data">

                            <br>

                            <textarea class="form-control" rows="5" cols="3" placeholder="Message"
                                name="msg"></textarea><br>


                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="save" id="reply">Send</button>
                    </div>

                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="static-Backdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="../php/reply.php" method="POST" id="myfrom1">
                            <input type="email" class="form-control" name="to" id="to_modal1" readonly>

                            <br>
                            <input type="email" class="form-control" name="CC" id="CC_modal1" readonly>

                            <br>
                            <input type="email" class="form-control" name="Bcc" id="Bcc_modal1" readonly>
                            <!-- <br> -->
                            <input type="text" class="form-control" name="subject" id="sub-data1">

                            <br>

                            <textarea class="form-control" rows="5" cols="3" placeholder="Message"
                                name="msg"></textarea><br>


                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="reply-all" name="save">Send</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../Js/dashboard.js"></script>

    <script>
    function validation() {

        var image = document.getElementById('image');

        var size = parseFloat(image.files[0].size / (1024 * 25)).toFixed(2);
        if (size > 25) {
            document.getElementById("Img").innerHTML = "please select less then 25MB size";
            return false;
        } else {
            document.getElementById("Img").innerHTML = "";
            return true;
        }
    }

    $(document).on('click', '#reply-btn', function() {
        let to = $('#reply-from').attr('data')
        let sub = $('#reply-sub').attr('subject');
        $('#sub-data').val(sub);
        $("#to_modal").val(to)
        $("#reply").click(function() {

            var msg = jQuery('#myfrom textarea').val();

            $.ajax({
                url: "../php/reply.php",

                type: "POST",
                data: {
                    to: to,
                    sub: sub,
                    msg: msg
                },
                success: function(result) {
                    jQuery('.btn-close').trigger('click');
                    $('#success').html(
                        '<div class="alert alert-warning alert-dismissible fade show" id="flash-msg" role="alert">' +
                        '<strong></strong> Message Send Successfully.' +
                        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                        '</div>');

                }

            });
        })
    })
    $(document).on('click', '#reply-btn', function() {
        let to = $('#reply-from').attr('data')
        let CC = $('#CC-reply').attr('CC');
        let Bcc = $('#Bcc-reply').attr('Bcc');
        let sub = $('#reply-sub').attr('subject');
        $('#sub-data1').val(sub);
        $("#to_modal1").val(to)
        $("#CC_modal1").val(CC)
        $("#Bcc_modal1").val(Bcc)
        $("#reply-all").click(function() {

            var msg = jQuery('#myfrom1 textarea').val();

            $.ajax({
                url: "../php/reply.php",

                type: "POST",
                data: {
                    to: to,
                    sub: sub,
                    CC: CC,
                    Bcc: Bcc,
                    msg: msg
                },
                success: function(result) {
                    jQuery('.btn-close').trigger('click');
                    $('#success').html(
                        '<div class="alert alert-warning alert-dismissible fade show"  id="flash-msg" role="alert">' +
                        '<strong></strong> Message Send Successfully.' +
                        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                        '</div>');

                }

            });
        })
    })
    $(document).ready(function() {
        $("#flash-msg").delay(1000).fadeOut("slow");
    });
    </script>


</body>

</html>