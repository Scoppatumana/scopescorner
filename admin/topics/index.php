<?php  include("../../path.php"); ?>
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
    <title>Admin Dashboard -- Manage Topics</title>
</head>

<body>
    <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>
        <!-- Page Wrapper starts -->
        <div class="admin-wrapper">
        
        <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>


        <div class="admin-content">
            <div class="button-group">
                <a href="create.php" class="big-btn">Add Topic</a>
                <a href="index.php" class="big-btn">Manage Topics</a>
            </div>

            <div class="content">
                <h2 class="page-title">
                    Manage Topics
                </h2>

                <table>
                    <thead>
                        <th>S/N</th>
                        <th>Title</th>
                        <th colspan="2">Action</th>
                    </thead>

                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>This is the first Post</td>
                            <td><a href="" class="edit">Edit</a></td>
                            <td><a href="" class="delete">Delete</a></td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td>This is the Second Post</td>
                            <td><a href="" class="edit">Edit</a></td>
                            <td><a href="" class="delete">Delete</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!--Admin Page Wrapper Ends -->
    <script src="../../assets/Javascript/script.js"></script>
</body>

</html>