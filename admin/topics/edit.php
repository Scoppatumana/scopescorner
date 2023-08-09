<?php  
include("../../path.php"); 
include(ROOT_PATH . "/app/database/controller/topics.php");
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
    <title>Admin Dashboard -- Add Topic</title>
</head>

<body>
    <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>
        <!-- Page Wrapper starts -->
        <div class="admin-wrapper">
        
        <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>


        <div class="admin-content">
            <div class="button-group">
                <a href="create.php" class="big-btn">Add Topic</a>
                <a href="index.php" class="big-btn">Manage Topic</a>
            </div>

            <div class="content">
                <h2 class="page-title">
                    Edit Topic
                </h2>


                <form action="create.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <div>
                        <label for="">Name</label>
                        <input type="text" name="name" value="<?php echo $name ?>" id="" class="text-input"></input>
                    </div>
                    <div>
                        <label for="">Description</label>
                        <textarea name="description" id="body"><?php echo $description ?></textarea>
                    </div>
                    
                    <div>
                        <button class="big-btn" type="submit" name="update-btn">
                            Update Topic
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