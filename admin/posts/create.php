<?php  include("../../path.php"); ?>
<?php  
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
    <title>Admin Dashboard -- Add Users</title>
</head>

<body>
    
    <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>
    <!-- Page Wrapper starts -->
    <div class="admin-wrapper">
        
    <!-- <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?> -->

        <div class="admin-content">
            <div class="button-group">
                <a href="create.php" class="big-btn">Add Post</a>
                <a href="index.php" class="big-btn">Manage Post</a>
            </div>

            <div class="content">
                <h2 class="page-title">
                    Manage Post
                </h2>
                

                <form action="create.php" method="post" enctype="multipart/form-data">
                <?php include(ROOT_PATH . '/app/helpers/formErrors.php'); ?>
                    <div>
                        <label for="">Title</label>
                        <input type="text" value="<?php echo $title ?>" name="title" id="" class="text-input"></input>
                    </div>
                    <div>
                        <label for="">Body</label>
                        <textarea name="body" id="body"> <?php echo $body ?> </textarea>
                    </div>
                    <div>
                        <label for="">Topic</label>
                        <select name="topic_id" id="" class="text-input">
                            <option value="">Select Topic</option>
                            <?php
                                foreach ($topics as $key => $topic) {
                                    if(!empty($topic_id) && $topic_id = $topic['id']){
                            ?>
                                    <option selected value="<?php echo $topic['id']; ?>"> <?php echo $topic['name']; ?> </option>
                                    
                            <?php
                            }else{
                            ?>
                                <option value="<?php echo $topic['id']; ?>"> <?php echo $topic['name']; ?> </option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div>
                        <label for="">Image</label>
                        <input type="file" value="<?php echo $image ?>" name="image" id="" class="text-input"></input>
                    </div>

                    <div>
                        <?php
                            if(empty($published)){
                        ?>
                        <label for="">
                        <input type="checkbox" name="published" ></input>
                        Publish</label>
                        <?php
                            }else{
                        ?>
                        <label for="">
                        <input type="checkbox" name="published" checked></input>
                        Publish</label>
                        
                        <?php
                            }
                        ?>
                    </div>

                    <div>
                        <button class="big-btn" type="submit" name="add-post">
                            Add Post
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