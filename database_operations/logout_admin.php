<?php 
 
 session_start();
 if(isset($_SESSION['admin'])){
                
    unset($_SESSION['admin']);
    header('location: ../admin/login.php');
  }else{
      echo "already logged out";
  }

?>