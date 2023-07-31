<?php
    include(ROOT_PATH . "/app/database/db.php");
    include(ROOT_PATH . "/app/helpers/validateUser.php");

    function loginUser($user){
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['admin'] = $user['admin'];
        $_SESSION['message'] = "You're Logged In";
        $_SESSION['type'] = "Success";
        // header('location: ' . BASE_URL . '/index.php');

        if ($_SESSION['admin']) {
            header('location: ' . BASE_URL . '/admin/dashboard.php');
        }else{
            header('location: ' . BASE_URL . '/index.php');
        }
        // printResult($_SESSION);
        exit();  
    }
    $table = 'users';
    $errors = array();
    $username = '';
    $email = '';
    $create_password = '';
    $password = '';


    if(isset($_POST["register-btn"])){
        $errors = validateUser($_POST);
        

        // printResulat($errors);


        if(count($errors) === 0){
            unset($_POST['register-btn'], $_POST['create_password']);
            $_POST['admin'] = 0;
            $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $user_id = create($table, $_POST);
            $user = selectOne($table, ['id' => $user_id]);
            loginUser($user);
        }else{
            $username = $_POST['username'];
            $email = $_POST['email'];
            $create_password = $_POST['create_password'];
            $password = $_POST['password'];
        }
      }

    if(isset($_POST['login-btn'])){
        $errors = validateLogin($_POST);

        if(count($errors) === 0){
            $user = selectOne($table, ['username' => $_POST['username']]);

            if($user && password_verify($_POST['password'], $user['password'])){
                loginUser($user);
            }else{
                array_push($errors, "Wrong Credentials");
               
            }
        }
    }
    $username = $_POST['username'];
    $password = $_POST['password'];

?>