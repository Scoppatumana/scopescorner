<?php  
    include("../../path.php"); 
    include(ROOT_PATH . "/app/database/controller/posts.php");
    adminOnly();
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
    <title>Admin Dashboard -- Manage Posts</title>
</head>

<body>
    <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>
        <!-- Page Wrapper starts -->
        <div class="admin-wrapper">
        
        <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>


        <div class="admin-content">
            <div class="button-group">
                <a href="create.php" class="big-btn">Add Post</a>
                <a href="index.php" class="big-btn">Manage Post</a>
            </div>

            <div class="content">
                <h2 class="page-title">
                    Manage Post
                </h2>
                <?php include(ROOT_PATH . "/app/includes/message.php"); ?>

                <table>
                    <thead>
                        <th>S/N</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th colspan="3">Action</th>
                    </thead>

                    <tbody>
                        <?php
                            foreach ($posts as $key => $post) {
                                $author = selectOne('users', ['id' => $post['user_id']]);
                        ?>
                        <tr>
                            <td><?php echo $key + 1; ?></td>
                            <td><?php echo $post['title']; ?></td>
                            <td><?php $author['username']; ?></td>
                            <td><a href="edit.php?id=<?php echo $post['id']; ?>" class="edit">Edit</a></td>
                            <td><a href="edit.php?del_id=<?php echo $post['id']; ?>" class="delete">Delete</a></td>
                            <?php
                                if ($post['published']) {
                            ?>
                                <td><a style="color: orange;" href="edit.php?published=0&p_id=<?php echo $post['id']; ?>" class="unpublish">Unpublish</a></td>
                            <?php
                                }else{
                            ?>
                                <td><a style="color: blue;" href="edit.php?published=1&p_id=<?php echo $post['id']; ?>" class="publish" >Publish</a></td>
                            <?php
                                }
                            ?>
                        </tr>
                        <?php
                            }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!--Admin Page Wrapper Ends -->
    <script src="../../assets/Javascript/script.js"></script>
</body>

</html>