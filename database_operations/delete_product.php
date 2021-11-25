<?php
 // deleting food
 include_once "database_connection.php";

 session_start();
 if(isset($_GET['delete_product'])){
   
    $delete_id = $_GET['delete_product'];
    if(isset($_SESSION['farmer_id'])){
      echo "Logged in";
      $user_id = $_SESSION['farmer_id'];
      $password = $_POST['password'];
    
      // Query users table to get owner of room and details
    
      $sql_select_user = "SELECT * FROM eurofarm_users WHERE id ='".$user_id."' limit 1";
      $user_result = mysqli_query($conn, $sql_select_user);
      $row_user = mysqli_fetch_array($user_result);
    
      if(mysqli_num_rows($user_result) == 1 ){
        $farm_name = $row_user['username'];
        $farm_password = $row_user['user_password'];
        if($password == $farm_password){
           // query the user to get password
            $delete_food_query = "DELETE FROM eurofarm_products WHERE id=$delete_id";
            if(mysqli_query($conn, $delete_food_query)){
                echo"product deleted succesfully";
                $_SESSION['delete_product'] = 'Product successfully deleted ';
                $_SESSION['delete_product_type'] = 'success';

                header('location: ../farmers/index.php ');
              }else{
                $_SESSION['delete_product'] = 'An unknown error has occurred deleting product!! ' . mysqli_error($conn);
                $_SESSION['delete_product_type'] = 'danger';

                header('location: ../farmers/index.php ');
                echo'error: Could not execute sql update' . mysqli_error($conn);
              }
              
            }else{
              $_SESSION['delete_product'] = 'Incorrect password ';
              $_SESSION['delete_product_type'] = 'danger';
              header('location: ../farmers/index.php ');
          }

        }
      }
        
      
    }else{
        header('location: ../farmers/login.php');
      }
    

     
      if(isset($_GET['delete_blog'])){
   
          $delete_id = $_GET['delete_blog'];
        
       
          $delete_blog_query = "DELETE FROM eurofarm_blogs WHERE id=$delete_id";
           if(mysqli_query($conn, $delete_blog_query)){
               echo"blog deleted succesfully";
               $_SESSION['delete_blog'] = 'Blog successfully deleted ';
               $_SESSION['delete_blog_type'] = 'success';
    
               header('location: ../admin/all_blogs.php ');
             }else{
               $_SESSION['delete_blog'] = 'An unknown error has occurred deleting blog!! ' . mysqli_error($conn);
               $_SESSION['delete_blog_type'] = 'danger';
    
               header('location: ../admin/all_blogs.php ');
               echo'error: Could not execute sql update' . mysqli_error($conn);
             }
            
          }

?>