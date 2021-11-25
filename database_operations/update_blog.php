<?php
include_once "database_connection.php";

session_start();
if(isset($_GET['blog_edit'])){
  
    $edit_id = $_GET['blog_edit'];
    $edit_query = "SELECT * FROM eurofarm_blogs WHERE id=$edit_id";
    $edit_result= mysqli_query($conn, $edit_query);
 
    if(isset($_POST['update_blog'])){
 
        
        $blog_title = addslashes($_POST["blogname"]);
        $blog = addslashes($_POST["blog"]);
     
    
          $update_query = "UPDATE eurofarm_blogs SET 
             blog_title = '$blog_title',
             blog = '$blog'
            
          
            WHERE id = $edit_id";
 
       if(mysqli_query($conn, $update_query)){
           echo"successfully Edited database";
           $_SESSION['blog_message'] = 'Info updated successfully!! ';
           $_SESSION['blog_msg_type'] = 'success';
 
           header('location: ../admin/all_products.php ');
         }else{
           $_SESSION['blog_message'] = 'An unknown error has occurred!! ' . mysqli_error($conn);
           $_SESSION['blog_msg_type'] = 'danger';
 
           header('location: ../admin/all_blogs.php ');
             echo'error: Could not execute sql update' . mysqli_error($conn);
         }
        }
      }
 

?>