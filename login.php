<?php
  include 'app/database/connection.php';
  include("path.php");
  include 'app/database/controller/users.php';
  guestOnly();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="assets/awesome-font/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/style.css" type="text/css">
  <link rel="stylesheet" href="assets/css/admin.css" type="text/css">
  <script src="assets/Javascript/jquery-library.js"></script>
  <script src="assets/Javascript/jquery.min.js"></script>
  <!-- <script src="https://cdnjs.cloudfare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script> -->
  <title>Blog</title>
</head>

<body>
<?php include(ROOT_PATH . "/app/includes/header.php"); ?>
   <div class="page-wrapper">
   <div class="auth-content">
   <form action="login.php" method="POST">
          <h2 class="form-title">
            Login
          </h2>

          <?php include 'app/helpers/formErrors.php'; ?>
            <div>
              <label for="">Username</label>
              <input type="text" class="text-input" name="username" value ="<?php echo $username ?>" placeholder="Username">
            </div>

            <div>
              <label for="">Email Address</label>
              <input type="password" class="text-input" name="password" value ="<?php echo $password ?>" placeholder="Enter Password">
            </div>
          
          <div>
            <button type="Submit" name="login-btn" class="big-btn" style="font-size: 1.08em">
            <i class="fa fa-sign-in"></i>  Log in
            </button>

            <p>Or <a href="register.php">Sign Up</a></p>
          </div>
         
         
          
    </form>
   </div>
   </div>
  <script src="assets/Javascript/script.js"></script>



</body>

</html>