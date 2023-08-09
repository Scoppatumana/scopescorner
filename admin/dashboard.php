<?php 
    include("../path.php"); 
    include(ROOT_PATH . "/app/database/controller/posts.php");
    adminOnly();
    $user = selectOne('users', ['id' => $_SESSION['id']]);
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/awesome-font/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/admin.css" type="text/css">
    <script src="../assets/Javascript/jquery-library.js"></script>
    <script src="../assets/Javascript/jquery.min.js"></script>
    <script src="https://cdnjs.cloudfare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script> 
    <title>Blog -- Administrative Dashboard</title>
</head>

<body>
  <!-- start of header -->

  

  <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>

  <!-- End of header -->
  <div class="dashboard-main-div">
    <!-- Start of Admin Reference -->
    <div class="left-sided-div animated animated fadeInLeft animated">

      <!-- PROFILE INDEX -->
      <div class="profile-div">



        <div class="picture-div">
          <img src="<?php echo BASE_URL . '/assets/images/' . $user['image']; ?>" alt="Passport">
        </div>



        <h6>
          <?php echo $user['username'];  ?>
        </h6>
        <p> <i>User ID</i><span>: <?php echo $user['id']; ?> </span></p>
        <input class="hiddeninput" type="file" style="display:none;">

        <input type="hidden" name="del_passport" value="" />

        <button name="submitpassport" type="submit"> Upload Image</button>


      </div>




      <!-- DASHBOARD INDEX -->
      <div class="dashboard-list">
        <ul>
          <a href="<?php echo BASE_URL . "/admin/posts/index.php" ?>">
            <li class="active"><i class="fa fa-sticky-note-o"></i> Manage Posts</li>
          </a>
          <a href="<?php echo BASE_URL . "/admin/users/index.php" ?>">
            <li><i class="fa fa-users"></i> Manage Users</li>
          </a>
          <a href="<?php echo BASE_URL . "/admin/topics/index.php" ?>">
            <li><i class="fa fa-tasks"></i> Manage Topics</li>
          </a>
         
          <a href="../index.html">
            <li><i class="fa fa-sign-out"></i> Sign-out</li>
          </a>
        </ul>
      </div>
      <li><a href=""></a></li>
        <li><a href="<?php echo BASE_URL . "/admin/users/index.php" ?>"></a></li>
        <li><a href="<?php echo BASE_URL . "/admin/topics/index.php" ?>"></a></li>
    </div>
    <!-- End of admin reference -->


    <div class="right-sided-div">
      <div class="bg-image-div">
        <div class="bg-cover">
          <div class="dashboard-overall">
            <div class="dashboard-admin-text">
              <span class="dashboard">
                <i class="fa fa-dashboard"></i>
                Dashboard
              </span>
              <br />
              <span class="admin-portal"> Administrative Portal </span>
            </div>

            <div class="current-time">
              <span class="text"> Current Time </span><br />
              <span class="time" id="clock"> </span><br />
              <span class="text" id="date"> </span>


            </div>

            <div class="user-details">
              <div class="picture-div">
                <img src="<?php echo BASE_URL . '/assets/images/' . $user['image']; ?>" alt="Passport" />
              </div>
              <div class="welcome-text">
                Welcome Back!
                <h1>
                <?php echo $user['username'];  ?>
                </h1>
                <span class="login-date"><i class="fa fa-clock"></i>
                  Last Login Date
                  <span> | </span>
                  2021-11-04 18:52:11
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>



      <div class="main-displayed-div">
      <?php include(ROOT_PATH . "/app/includes/message.php"); ?>
         
      </div>
      


</body>

</html>





