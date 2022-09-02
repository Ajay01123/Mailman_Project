 <?php
  if (!isset($_SERVER['HTTP_REFERER'])) {

    header("Location:../mailman/dashboard.php");

    exit;
  }
  include_once '../php/database.php';
  if ($_GET['id']) {
    $getdata = $obj->update($_GET['id']);
  }
  if (isset($_POST['update'])) {
    $updates = $obj->updatedata($_GET['id']);
    if ($updates) {
      $_SESSION['status'] = "Data Updated Successfully";
    } else {
      echo "Data not updated ";
    }
  }


  ?>

 <html>

 <head>

   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <link rel="stylesheet" href="../css/main.css">

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">


   <title>Profile_edit</title>
   <style>
     /* .input{
        margin-left:60%;
        
  
       
      } */
   </style>
 </head>

 <body>
   <div class="container">
     <div class="row mt-5">
       <div class="col-sm-12" style="background:white; border:2px solid red;">

         <h1>Profile Update</h1>
         <span> </span>
         <div class="col-sm-10">
           <?php
            if (isset($_SESSION['status'])) {
            ?>
             <div class="alert alert-success alert-dismissible fade show" id="flash-msg" role="alert">
               <strong>Holy guacamole!</strong> <?php echo $_SESSION['status']; ?>
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>

           <?php
              unset($_SESSION['status']);
            }
            ?>

           <form action="#" method="POST" enctype="multipart/form-data" onsubmit="return validation()">
             <div class="row  ">


               <div class="col-md-2 order-md-last mb-3" id="preview">
                 <img src="<?php echo '../Register_image/' . $getdata['image']; ?>" id="default-preview" class="text-center" width="150" height="150" style="border-radius: 50%;">

                 <div id="imgpreview"></div>
                 <input type="file" id="image" name="image">
                 <input type="hidden" name="id" value="<?php echo $getdata['id']; ?>">
                 <span class="text-danger" id="InpImg"></span>

               </div>
               <div class="input">

               </div>


               <div class="col-md-10 ">
                 <div class="row">
                   <div class="col-md-8">
                     <input type="text" class="form-control" placeholder="Enter your first name" id="fname" name="fname" value="<?php echo $getdata['fname']; ?>">
                     <span class="text-danger" id="txtname"></span><br>
                     <input type="text" class="form-control" placeholder="Last Name" id="lname" name="lname" value="<?php echo $getdata['lname']; ?>">
                     <span class="text-danger" id="lastname"></span><br>

                     <div>

                       <input type="email" class="form-control" name="remail" placeholder="Enter your Email" id="remail" value="<?php echo $getdata['recovery_email']; ?>">
                       <!-- <span <?php echo $msg ?>></span> -->
                     </div>
                     <span class="text-danger" id="useremail"></span><br>

                   </div>



                 </div>
                 <div class="row ">
                   <div class="col-md-8">


                     <br><br>
                     <button type="submit" class="btn btn-success" id="btn" name="update">Update</button>
                     <a href="../mailman/dashboard.php" class="btn btn-success">dashboard</a>
                   </div>
                 </div>
               </div>
           </form>


         </div>
       </div>
       <script src="https://code.jquery.com/jquery-3.2.1.js"></script>

       <!-- <script  src="../Js/javascript.js"></script> -->
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
       <script>
         if (window.history.replaceState) {
           window.history.replaceState(null, null, window.location.href);
         }
       </script>
 </body>

 </html>