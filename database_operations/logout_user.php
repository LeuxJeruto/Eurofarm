<?php 
 
 session_start();
 if(isset($_SESSION['user_id'])){
                
    unset($_SESSION['user_id']);
    header('location: ../users/login.php');
  }else{
      echo "already logged out";
  }

?>