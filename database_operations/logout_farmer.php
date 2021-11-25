<?php 
 
 session_start();
 if(isset($_SESSION['farmer_id'])){
                
    unset($_SESSION['farmer_id']);
    header('location: ../farmers/login.php');
  }else{
      echo "already logged out";
  }

?>