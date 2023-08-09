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
    $password = '';
    $admin = '';
    $image ='';
    $id='';

    $users= selectAll($table, ['admin' => 1]);
    


    if(isset($_POST["register-btn"])){
        $errors = validateUser($_POST);
        

        // printResulat($errors);


        if(count($errors) === 0){
            unset($_POST['register-btn'], $_POST['create_password'], $_POST['image']);
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
                $username = $_POST['username'];
                $password = $_POST['password'];
               
            }
        }
    }
    





    // Admin Registration
    
    if(isset($_POST["create-admin"])){
       
        // Check if Input fields are empty
        $errors = validateUser($_POST);

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
         

        // If there are no errors
        if(count($errors) === 0){
            // Remove register btn and create password from post array
            unset($_POST['create-admin'], $_POST['create_password']);
            $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $_POST['admin'] = isset($_POST['admin']) ? 1 : 0;
            $user_id = create($table, $_POST);
            $_SESSION['message'] = "Admin User Created Successfully";
            $_SESSION['type'] = "success";
            header('location: ' . BASE_URL . '/admin/users/index.php');
            exit();
        }else{
            $username = $_POST['username'];
            $email = $_POST['email'];
            $create_password = $_POST['create_password'];
            $password = $_POST['password'];
            $admin = isset($_POST['admin']) ? 1 : 0;
        }
      }



      if (isset($_GET['delete_id'])) {
        $count = delete($table, $_GET['delete_id']);
        $_SESSION['message'] = "User Deleted Successfully";
        $_SESSION['type'] = "success";
        header('location: ' . BASE_URL . '/admin/users/index.php');
        exit();
      }




      if (isset($_POST['update-user'])) {
        
       $errors = validateUser($_POST);

        if(!empty($_FILES['image']['name'])){
            $imageName = time() . '_' . $_FILES['image']['name'];
            $destination = ROOT_PATH . "/assets/images/" . $imageName;
            $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
        }else{
             array_push($errors, "Image Required");
        }
 
        if($result) {
            $_POST['image'] = $imageName;
        }else {
            array_push($errors, "Failed to Upload Image");
        }

        
         
        // If there are no errors
        if(count($errors) === 0){
            // Remove register btn and create password from post array
            $id = $_POST['id'];
            unset($_POST['update-user'], $_POST['create_password'], $_POST['id']);
            $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $_POST['admin'] = isset($_POST['admin']) ? 1 : 0;
            printResult($_POST);
            $count = update($table, $_POST, $id);
            $_SESSION['message'] = "Admin User Updated Successfully";
            $_SESSION['type'] = "success";
            
            header('location: ' . BASE_URL . '/admin/users/index.php');
            exit();

        }else{
            $username = $_POST['username'];
            $email = $_POST['email'];
            $create_password = $_POST['create_password'];
            $password = $_POST['password'];
            $id = $_POST['id'];
            $admin = isset($_POST['admin']) ? 1 : 0;
        }
      }

      
      if (isset($_GET['id'])) {

        $user = selectOne($table, ['id'=> $_GET['id']]);
        $id = $user['id'];
        $username = $user['username'];
        $email = $user['email'];
        $admin = isset($user['admin']) ? 1 : 0;

      }


?>