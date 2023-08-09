<?php  include("../path.php"); ?>
<?php  include(ROOT_PATH . "/app/database/controller/posts.php");
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
    <!-- <script src="https://cdnjs.cloudfare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script> -->
    <title>Blog -- Administrative Dashboard</title>
</head>

<body>
    
    <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>
    <!-- Page Wrapper starts -->
    <div class="admin-wrapper">
        
    <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>

        <div class="admin-content">
           

            <div class="content">
                <h2 class="page-title">
                    Dashboard
                </h2>
                
                <?php include(ROOT_PATH . '/app/includes/messages.php'); ?>
                
            </div>
        </div>
    </div>

    <!--Admin Page Wrapper Ends -->

    <script src="../assets/ckeditor5-build-classic/ckeditor.js"></script>
    <script src="../assets/Javascript/script.js"></script>
</body>

</html>