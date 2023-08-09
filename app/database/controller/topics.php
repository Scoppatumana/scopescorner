<?php
    include(ROOT_PATH . "/app/database/db.php");
    include(ROOT_PATH . "/app/helpers/validateTopic.php");
    $table = 'topics';
    $id = '';
    $name = '';
    $description = '';
    $errors = array();

    $topics = selectAll($table);

    if(isset($_POST['add-topic'])){
        $errors = validateTopic($_POST);
        if (count($errors) === 0) {
            unset($_POST['add-topic']);
            create($table, $_POST);
            $_SESSION['message'] = "Topic Created Successfully";
            $_SESSION['type'] = "cess";
            header('location: ' . BASE_URL . '/admin/topics/index.php');
            exit();
        }else{
            $name = $_POST['name'];
            $description = $_POST['description'];
        }
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $topic = selectOne($table, ['id' => $id]);
        $id = $topic['id'];
        $name = $topic['name'];
        $description = $topic['description'];
    }

    if(isset($_POST['update-btn'])){
        $errors = validateTopic($_POST);

        if (count($errors) === 0) {
            $id = $_POST['id'];
            printResult($_POST);
            unset($_POST['update-btn'], $_POST['id']);
            $topic_id = update($table, $_POST, $id);
            $_SESSION['message'] = "Topic Updated Successfully";
            $_SESSION['type'] = "success";
            header('location: ' . BASE_URL . '/admin/topics/index.php');
            exit();
        }else{
            $id = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];
        }
        
    }

    if(isset($_GET['del_id'])){
        $id = $_GET['del_id'];
        $count = delete($table, $id);
        $_SESSION['message'] = "Topic Deleted Successfully";
        $_SESSION['type'] = "success";
        header('location: ' . BASE_URL . '/admin/topics/index.php');
        exit();
    }

?>