 <?php
    //session_start();
    include_once '../php/connection.php';
    if (!isset($_SERVER['HTTP_REFERER'])) {

        header("Location:../mailman/index.php");

        exit;
    }


    ?>

 <html>

 <head>

     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <link rel="stylesheet" href="../css/main.css">
     <!--- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">


     <title>Mailman</title>

 </head>

 <body>
     <div class="container">
         <div class="row mt-5">
             <?php


                ?>
             <div class="col-sm-12" style="background:white; border:2px solid red;">

                 <h1>Mailman</h1>
                 <span> </span>
                 <div class="col-sm-10">
                     <p>Create your account</p>
                     <form action="" method="POST" enctype="multipart/form-data" onsubmit="return validation()">
                         <div class="row  ">


                             <div class="col-md-2 order-md-last mb-3" id="preview">
                                 <img src="../images/index.png" id="default-preview" class="text-center"
                                     style="width: 150px;">

                                 <div id="imgpreview"></div>
                                 <input type="file" id="image" name="image" accept="image/png, image/jpg, image/jpeg" />
                                 <span class="text-danger" id="InpImg"></span>

                             </div>
                             <div class="input">
                             </div>
                             <div class="col-md-10 ">
                                 <div class="row">
                                     <div class="col-md-8">
                                         <input type="text" class="form-control" placeholder="Enter your first name"
                                             id="fname" name="fname" />
                                         <span class="text-danger" id="txtname"></span><br>
                                         <input type="text" class="form-control" placeholder="Enter your last name"
                                             id="lname" name="lname">
                                         <span class="text-danger" id="lastname"></span><br>
                                         <input type="text" class="form-control" placeholder="Select Username"
                                             name="username" id="user">
                                         <span class="text-danger" id="username"></span><br>
                                         <span id="us" class="d-grid gap-2 d-md-flex justify-content-md-end"></span>
                                         <div>
                                             <input type="text" class="form-control" name="email"
                                                 placeholder="Enter your Mailman" id="email">
                                             <span class="text-danger" id="useremail"></span>
                                             <span id="email_id"></span>
                                             <span
                                                 class="d-grid gap-2 d-md-flex justify-content-md-end">xyz@mailman.com</span>
                                         </div>
                                         <br>
                                     </div>

                                 </div>
                                 <div class="row ">
                                     <div class="col-md-8">
                                         <input type="eamil" class="form-control"
                                             placeholder="Enter your recovery email" id="remail" name="remail">
                                         <span class="text-danger" id="recovery"></span>
                                         &nbsp;
                                         <input type="password" class="form-control"
                                             placeholder="Enter new password here" id="pass" name="password">
                                         <span class="text-danger" id="password"></span>
                                         &nbsp;
                                         <input type="password" class="form-control" placeholder="Confirm password"
                                             id="cpass" name="confirmpassword">
                                         <span class="text-danger" id="cpassword"></span>
                                         &nbsp;<br>
                                         <input type="checkbox" name="agreement" id="agreement" /> I Agreed with the
                                         above Terms & Conditions.<br>
                                         <span class="text-danger" id="agree"></span>
                                         <br><br>
                                         <button type="submit" name="submit" class="btn btn-success"
                                             id="submit">Submit</button>
                                         <a href="index.php" class="btn btn-success">Sign-in-inserted</a>
                                     </div>
                                 </div>
                             </div>
                     </form>
                 </div>
             </div>

             <script src="../Js/home.js"></script>
             <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

             <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
             <script src="../Js/sign-up.js"> </script>



 </body>

 </html>