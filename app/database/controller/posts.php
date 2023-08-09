<?php
    include(ROOT_PATH . "/app/database/db.php");
    include(ROOT_PATH . "/app/helpers/validatePost.php");
    include(ROOT_PATH . "/app/helpers/middleware.php");
    $table = 'posts';
    $id = '';
    $name = '';
    $published = '';
    $errors = array();
    $posts = selectAll($table);
    $topics = selectAll('topics');
    // printResult($posts);
    $title = '';
    $body = '';
    $topic_id = '';


    if(isset($_POST['add-post'])){
        adminOnly();
        // printResult($_FILES['image']['name']);
        $errors = validatePost($_POST);

        if(!empty($_FILES['image']['name'])){
           $imageName = time() . '_' . $_FILES['image']['name'];
           $destination = ROOT_PATH . "/assets/images/" . $imageName;

            $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
        }else{
            array_push($errors, "Image Required");
        }

        if ($result) {
            $_POST['image'] = $imageName;
        } else {
            array_push($errors, "Failed to Upload Image");
        }
        

        if (count($errors) === 0) {
            unset($_POST['add-post']);
            $_POST['user_id'] = $_SESSION['id'];
            $_POST['published'] = isset($_POST['published']) ? 1 : 0;
            $_POST['body'] = htmlentities($_POST['body']);

            $post = create($table, $_POST);
            printResult($post);
            $_SESSION['message'] = "Post Created Successfully";
            $_SESSION['type'] = "success";
            header('location: ' . BASE_URL . '/admin/posts/index.php');
        }else{
            $title = $_POST['title'];
            $body = $_POST['body'];
            $topic_id = $_POST['topic_id'];
            $published = isset($_POST['published']) ? 1 : 0;
            // $image = $_POST['image'];
        }
       


        // $errors = validateTopic($_POST);
        // if (count($errors) === 0) {
        //     unset($_POST['add-topic']);
        //     create($table, $_POST);
        //     $_SESSION['message'] = "Topic Created Successfully";
        //     $_SESSION['type'] = "cess";
        //     header('location: ' . BASE_URL . '/admin/topics/index.php');
        //     exit();
        // }else{
        //     $name = $_POST['name'];
        //     $description = $_POST['description'];
        // }
    }

    if(isset($_GET['id'])){
        
        $post = selectOne($table, ['id' => $_GET['id']]);
        $id = $post['id'];
        $topic_id = $post['topic_id'];
        $title = $post['title'];
        $body = $post['body'];
        $published = $post['published'];

    }

    if(isset($_POST['update-btn'])){
        adminOnly();
        $errors = validatePost($_POST);

        if(!empty($_FILES['image']['name'])){
            $imageName = time() . '_' . $_FILES['image']['name'];
            $destination = ROOT_PATH . "/assets/images/" . $imageName;
 
             $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
         }else{
             array_push($errors, "Image Required");
         }
 
         if ($result) {
             $_POST['image'] = $imageName;
         } else {
             array_push($errors, "Failed to Upload Image");
         }

        if (count($errors) === 0) {
            $id = $_POST['id'];
            unset($_POST['update-btn'], $_POST['id']);
            $_POST['user_id'] = $_SESSION['id'];
            $_POST['published'] = isset($_POST['published']) ? 1 : 0;
            $_POST['body'] = htmlentities($_POST['body']);

            $post_id = update($table, $_POST, $id);
            $_SESSION['message'] = "Post Updated Successfully";
            $_SESSION['type'] = "success";
            header('location: ' . BASE_URL . '/admin/posts/index.php');
            exit();
        }else{
            $title = $_POST['title'];
            $body = $_POST['body'];
            $topic_id = $_POST['topic_id'];
            $published = isset($_POST['published']) ? 1 : 0;
            $id = $_POST['id'];
        }
        
    }

    if(isset($_GET['p_id']) && isset($_GET['published'])){
        adminOnly();
        $published = $_GET['published'];
        $p_id = $_GET['p_id'];
        $count = update($table, ['published' => $published], $p_id);
        $_SESSION['message'] = "Post Published State Changed";
        $_SESSION['type'] = "success";
        header('location: ' . BASE_URL . '/admin/posts/index.php');
        exit();
    }

    if(isset($_GET['publish'])){
        adminOnly();
        $id = $_GET['del_id'];
        $count = delete($table, $id);
        $_SESSION['message'] = "Post Deleted Successfully";
        $_SESSION['type'] = "success";
        header('location: ' . BASE_URL . '/admin/posts/index.php');
        exit();
    }



?>