<?php 
    include("path.php");
    include(ROOT_PATH . "/app/database/controller/posts.php");

    if(isset($_GET['id'])){
        $post = selectOne('posts', ['id'=> $_GET['id']]);
    }

    $posts = selectAll('posts', ['published'=> 1]);
    $topics =  selectAll('topics');
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
    <title><?php echo $post['title']; ?> | ScopesCorner</title>
</head>

<body>
<?php include(ROOT_PATH . "/app/includes/header.php"); ?>
    <!-- Page Wrapper starts -->
    <div class="page-wrapper">





        <!-- Content Section Starts -->
        <div class="content-wrapper clearfix">
            <div class="main-content-wrapper">
                <section class="recent-posts-section single">

                    <h3>
                        <?php echo $post['title']; ?> 
                    </h3>

                    <div class="post-content">
                        <?php echo html_entity_decode($post['body']); ?> 
                    </div>
                </section>
            </div>

            <section class="topics-section single">
                <div class="section popular">
                    <h2 class="section-title">
                        Popular
                    </h2>

                    <?php
                        foreach ($posts as $key => $p) {
                    ?>
                    <div class="post clearfix">
                        <img src="<?php echo BASE_URL . '/assets/images/' . $p['image'] ?>" alt="Popular Image">
                        <a href="" class="title">
                            <h2><?php echo $p['title']; ?></h2>
                        </a>
                    </div>
                    <?php
                        }
                    ?>


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
    </div>

    <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>







    <script src="assets/slick/slick.min.js"></script>
    <script></script>
    <script src="assets/Javascript/script.js"></script>



</body>

</html>