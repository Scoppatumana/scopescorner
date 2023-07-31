<?php 
    include 'app/database/connection.php';
    include("path.php");
    include 'app/database/controller/users.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/awesome-font/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <script src="assets/Javascript/jquery-library.js"></script>
    <script src="assets/Javascript/jquery.min.js"></script>
    <!-- <script src="https://cdnjs.cloudfare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script> -->
    <title>Blog</title>
</head>

<body>
<?php include(ROOT_PATH . "/app/includes/header.php"); ?>

      <div class="register clearfix">
        
        <section class="signup">
            <div class="wrapper" style="height:300px">

               <form action="login.php" method="POST">
               <h1>Log In</h1>
                <?php include 'app/helpers/formErrors.php'; ?>
                <input type="text" name="username" value ="<?php echo $username ?>" placeholder="Username">
                <input type="password" name="password" value ="<?php echo $password ?>" placeholder="Enter Password">
                <button type="submit" name="login-btn">
                    Log In
                </button>
                <p class="login-request">Don't have an account?<a href="">Sign up</a></p>
               </form>
            </div>
        </section>
      </div>
    
    <script src="assets/slick/slick.min.js"></script>
    <script src="assets/Javascript/script.js"></script>



</body>

</html>