<?php  include("../../path.php");
 include(ROOT_PATH . "/app/database/controller/users.php");
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../assets/awesome-font/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="../../assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="../../assets/css/admin.css" type="text/css">
    <script src="../../assets/Javascript/jquery-library.js"></script>
    <script src="../../assets/Javascript/jquery.min.js"></script>
    <!-- <script src="https://cdnjs.cloudfare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script> -->
    <title>Admin Dashboard -- Add Users</title>
</head>

<body>
    <!-- <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?> -->
       <!-- Page Wrapper starts -->
       <div class="admin-wrapper">
        
        <!-- <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?> -->


        <div class="admin-content">
            <div class="button-group">
                <a href="create.php" class="big-btn">Add Users</a>
                <a href="index.php" class="big-btn">Manage Users</a>
            </div>

            <div class="content">
                <h2 class="page-title">
                    Edit Users
                </h2>


                <form action="edit.php" method="post" enctype="multipart/form-data">
                    <?php include(ROOT_PATH . '/app/helpers/formErrors.php'); ?>
                    <input type="hidden" value="<?php echo $id ?>" name="id" class="text-input"></input>
                    <div>
                        <label for="">Username</label>
                        <input type="text" name="username" value="<?php echo $username ?>" id="" class="text-input"></input>
                    </div>
                    <div>
                        <label for="">Email Address</label>
                        <input type="email" name="email" value="<?php echo $email ?>" id="" class="text-input"></input>
                    </div>

                    <div>
                        <label for="">Image</label>
                        <input type="file" name="image" id="" class="text-input"></input>
                    </div>

                    <div>
                        <label for="">Password</label>
                        <input type="password" name="create_password" id="" class="text-input"></input>
                    </div>
                    <div>
                        <label for="">Password Confirmation</label>
                        <input type="password" name="password" id="" class="text-input"></input>
                    </div>
                    <div>
                        <?php
                         if(empty($admin)){
                            ?>
                            <label for="">
                            <input type="checkbox" name="admin" ></input>
                            Admin</label>
                            <?php
                                }else{
                            ?>
                            <label for="">
                            <input type="checkbox" name="admin" checked></input>
                            Admin</label>
                            
                            <?php
                                }
                            ?>
                        
                    </div>
                   
                    
                    <div>
                        <button type="submit" name="update-user" class="big-btn">
                            Update User
                        </button>
                    </div>
                </form>

                
            </div>
        </div>
    </div>

    <!--Admin Page Wrapper Ends -->

    <script src="../../assets/ckeditor5-build-classic/ckeditor.js"></script>
    <script src="../../assets/Javascript/script.js"></script>
</body>

</html>