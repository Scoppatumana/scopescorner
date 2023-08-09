
<?php

    include("path.php");
    include(ROOT_PATH . "/app/database/controller/topics.php");
    
    $posts = array();
    $postTitle = 'Recent Posts';

    if(isset($_GET['t_id'])){
        $posts = getPostsByTopicId($_GET['t_id']);
        if(!empty($posts)){
            $postTitle = "You searched for posts under '" . $_GET['name'] . "'";
        }else{
            $postTitle = "Your Search for '" . $_GET['name'] . "' yielded " . count($posts) . " result(s)";
            $posts = getPublishedPosts();
        }
    }else if(isset($_POST['search-term'])){
        $posts = searchPosts($_POST['search-term']);
        
        if(!empty($posts)){
            $postTitle = "You searched for posts under '" . $_POST['search-term'] . "'";
        }else{
            $postTitle = "Your Search for '" . $_POST['search-term'] . "' yielded " . count($posts) . " result(s)";
            $posts = getPublishedPosts();
        }
    }else{
        $posts = getPublishedPosts();
    }
    
    
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
   <?php include("app/includes/header.php"); ?>

   
   
    <!-- Page Wrapper starts -->
    <div class="page-wrapper">

    <?php include("app/includes/message.php"); ?>
    
        <!-- Start of trending post slider -->
        <div class="post-slider">
            <h1 class="slider-title">
            Trending 
            </h1>
            

            <i class="fa fa-chevron-left prev fa-lg"></i>
            <i class="fa fa-chevron-right next fa-lg"></i>

            <div class="post-wrapper">
                <?php
                    foreach ($posts as $key => $post) {
                    
                ?>

                <div class="post">
                    <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" class="slider-image" alt="Slider Image" title="Slider Image">
                    <div class="post-info">
                        <div class="heading">
                            <h4><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h4>
                        </div>
                        <!-- <i class="fa fa-user-circle"> Omisanya Sodiq</i>
                        &nbsp;
                        <i class="fa fa-user"> Mar 8, 2023.</i> -->
                        <div class="user">
                            <div class="image-container">
                                <img src="<?php echo BASE_URL . '/assets/images/' . $post['userImage']; ?>" alt="User Image">
                            </div>
                            <a href="">
                                <p><?php echo $post['username']; ?></p>
                            </a>
                        </div>
                        <div class="category">
                            <a href=""><?php echo $post['topicName']; ?></a>
                            <span>
                                <i class="fa fa-calender-day"> </i> <?php echo date('F j, Y', strtotime($post['created_at'])); ?>
                            </span>
                        </div>

                    </div>
                </div>
                <?php
                    }

                ?>
            </div>
        </div>

        <!-- End of trending post slider -->

        <!-- Content Section Starts -->
        <div class="content-wrapper clearfix">
            <section class="recent-posts-section">
                <h3>
                    <?php echo $postTitle ?>
                </h3>
                <?php
                    foreach ($posts as $key => $post) {
                    
                ?>
                <div class="posts clearfix">

                    <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" alt="Recent Post Image">


                    <div class="text-container">
                        <h2><?php echo $post['title']; ?></h2>
                        <i class="fa fa-user-circle"></i> <?php echo $post['username']; ?>
                        &nbsp;
                        <i class="fa fa-bookings"></i> <?php echo date('F j, Y', strtotime($post['created_at'])); ?>
                        <p>
                        <?php echo html_entity_decode(substr($post['body'], 0,150) . '...'); ?>
                        </p>
                        <a href="single.php?id=<?php echo $post['id']; ?>" class="btn">Read More</a>
                    </div>
                </div>
                <?php

                    }
                ?>

            </section>
            <section class="topics-section">
                <div class="section search">
                    <h2 class="section-title">
                        Search
                    </h2>
                    <form action="index.php" method="post">
                        <input type="text" name="search-term" class="text-input" placeholder="Search..">
                    </form>
                </div>

                <div class="section topics">
                    <h2 class="section-title">Topics</h2>
                    <ul>
                    <?php
                        foreach ($topics as $key => $topic) {
                    ?>
                        <li> <a href="<?php echo BASE_URL . '/index.php?t_id=' . $topic['id'] . '&name=' . $topic['name']; ?>"><?php echo $topic['name']; ?></a></li>
                    <?php
                        }
                    ?>
                        
                    </ul>
                </div>
            </section>
        </div>
        <!-- Content Section Ends -->



         <!-- Start of Latest Car Deals slider -->
         <div class="post-slider" style="margin-bottom: 30px;">
            <h1 class="slider-title">
                Latest Car Deals
            </h1>

            <i class="fa fa-chevron-left prev fa-lg"></i>
            <i class="fa fa-chevron-right next fa-lg"></i>

            <div class="post-wrapper">
                <div class="post ">
                    <img src="assets/images/body-background2.jpg" class="slider-image" alt="Slider Image" title="Slider Image">
                    <div class="post-info">
                        <h4><a href="single.php?id=<?php echo $post['id']; ?>">One day your life will flash before your eyes</a></h4>
                       
                        <div class="user">
                            <div class="image-container">
                                <img src="assets/images/body-background2.jpg" alt="User Image">
                            </div>

                            <a href="">
                                <p>Omisanya Sodiq</p>
                            </a>
                        </div>
                        <div class="category">
                            <a href="">Entertainment</a>
                            <span>
                                <i class="fa fa-calender-day"> </i>Jun 31, 2023
                            </span>
                        </div>

                    </div>
                </div>

                <div class="post">
                    <img src="assets/images/body-background2.jpg" class="slider-image" alt="Slider Image" title="Slider Image">
                    <div class="post-info">
                        <h4><a href="single.php?id=<?php echo $post['id']; ?>">One day your life will flash before your eyes</a></h4>
                        <!-- <i class="fa fa-user-circle"> Omisanya Sodiq</i>
                        &nbsp;
                        <i class="fa fa-user"> Mar 8, 2023.</i> -->
                        <div class="user">
                            <div class="image-container">
                                <img src="assets/images/body-background2.jpg" alt="User Image">
                            </div>
                            <a href="">
                                <p>Omisanya Sodiq</p>
                            </a>
                        </div>
                        <div class="category">
                            <a href="">Entertainment</a>
                            <span>
                                <i class="fa fa-calender-day"> </i>Jun 31, 2023
                            </span>
                        </div>

                    </div>
                </div>

                <div class="post">
                    <img src="assets/images/body-background2.jpg" class="slider-image" alt="Slider Image" title="Slider Image">
                    <div class="post-info">
                        <h4><a href="single.php?id=<?php echo $post['id']; ?>">One day your life will flash before your eyes</a></h4>
                        <!-- <i class="fa fa-user-circle"> Omisanya Sodiq</i>
                        &nbsp;
                        <i class="fa fa-user"> Mar 8, 2023.</i> -->
                        <div class="user">
                            <div class="image-container">
                                <img src="assets/images/body-background2.jpg" alt="User Image">
                            </div>
                            <a href="">
                                <p>Omisanya Sodiq</p>
                            </a>
                        </div>
                        <div class="category">
                            <a href="">Entertainment</a>
                            <span>
                                <i class="fa fa-calender-day"> </i>Jun 31, 2023
                            </span>
                        </div>

                    </div>
                </div>

                <div class="post">
                    <img src="assets/images/body-background2.jpg" class="slider-image" alt="Slider Image" title="Slider Image">
                    <div class="post-info">
                        <h4><a href="single.php?id=<?php echo $post['id']; ?>">One day your life will flash before your eyes</a></h4>
                        <!-- <i class="fa fa-user-circle"> Omisanya Sodiq</i>
                        &nbsp;
                        <i class="fa fa-user"> Mar 8, 2023.</i> -->
                        <div class="user">
                            <div class="image-container">
                                <img src="assets/images/body-background2.jpg" alt="User Image">
                            </div>
                            <a href="">
                                <p>Omisanya Sodiq</p>
                            </a>
                        </div>
                        <div class="category">
                            <a href="">Entertainment</a>
                            <span>
                                <i class="fa fa-calender-day"> </i>Jun 31, 2023
                            </span>
                        </div>

                    </div>
                </div>

                <div class="post">
                    <img src="assets/images/body-background2.jpg" class="slider-image" alt="Slider Image" title="Slider Image">
                    <div class="post-info">
                        <h4><a href="single.php?id=<?php echo $post['id']; ?>">One day your life will flash before your eyes</a></h4>
                        <!-- <i class="fa fa-user-circle"> Omisanya Sodiq</i>
                        &nbsp;
                        <i class="fa fa-user"> Mar 8, 2023.</i> -->
                        <div class="user">
                            <div class="image-container">
                                <img src="assets/images/body-background2.jpg" alt="User Image">
                            </div>
                            <a href="">
                                <p>Omisanya Sodiq</p>
                            </a>
                        </div>
                        <div class="category">
                            <a href="">Entertainment</a>
                            <span>
                                <i class="fa fa-calender-day"> </i>Jun 31, 2023
                            </span>
                        </div>

                    </div>
                </div>

                <div class="post">
                    <img src="assets/images/body-background2.jpg" class="slider-image" alt="Slider Image" title="Slider Image">
                    <div class="post-info">
                        <h4><a href="single.php?id=<?php echo $post['id']; ?>">One day your life will flash before your eyes</a></h4>
                        <!-- <i class="fa fa-user-circle"> Omisanya Sodiq</i>
                        &nbsp;
                        <i class="fa fa-user"> Mar 8, 2023.</i> -->
                        <div class="user">
                            <div class="image-container">
                                <img src="assets/images/body-background2.jpg" alt="User Image">
                            </div>
                            <a href="">
                                <p>Omisanya Sodiq</p>
                            </a>
                        </div>
                        <div class="category">
                            <a href="">Entertainment</a>
                            <span>
                                <i class="fa fa-calender-day"> </i>Jun 31, 2023
                            </span>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- End of Latest Car Deals slider -->

    </div>

    <!-- Page Wrapper Ends -->



    <?php include("app/includes/footer.php"); ?>






    <script src="assets/slick/slick.min.js"></script>
    <script src="assets/Javascript/script.js"></script>



</body>

</html>