<?php
session_start();
 if(isset($_POST['login'])){
    $email = addslashes($_POST["email"]);
    $password = addslashes($_POST["password"]);

    if($email == "admin@gmail.com" && $password == "admin1234"){
        $_SESSION['admin'] = 'Admin';
        $_SESSION['login_message'] = 'Successfully logged in!';
        $_SESSION['login_msg_type'] = 'success';
        header('location: ../admin/index.php');
    }else{
        $_SESSION['login_message'] = 'Incorrect admin details!';
        $_SESSION['login_msg_type'] = 'danger';

        header('location: ../admin/login.php');
    }
 }

?>