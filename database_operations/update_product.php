<?php
include_once "database_connection.php";

session_start();
if(isset($_GET['product_edit'])){
  
    $edit_id = $_GET['product_edit'];
    $edit_query = "SELECT * FROM eurofarm_products WHERE id=$edit_id";
    $edit_result= mysqli_query($conn, $edit_query);
 
    if(isset($_POST['update_product'])){
 
        
        $product_name = addslashes($_POST["productname"]);
        $description = addslashes($_POST["description"]);
        $price = addslashes($_POST["price"]);
     
    
          $update_query = "UPDATE eurofarm_products SET 
             product_name = '$product_name',
             price = '$price', 
             product_description = '$description'
          
            WHERE id = $edit_id";
 
       if(mysqli_query($conn, $update_query)){
           echo"successfully Edited database";
           $_SESSION['edit_message'] = 'Info updated successfully!! ';
           $_SESSION['edit_msg_type'] = 'success';
 
           header('location: ../farmers/index.php ');
         }else{
           $_SESSION['edit_itemdetails_message'] = 'An unknown error has occurred!! ' . mysqli_error($conn);
           $_SESSION['edit_itemdetails_msg_type'] = 'danger';
 
           header('location: ../farmers/index.php ');
             echo'error: Could not execute sql update' . mysqli_error($conn);
         }
        }
      }
 

?>