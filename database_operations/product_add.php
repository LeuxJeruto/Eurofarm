
<?php
session_start();
include "database_connection.php";

	$product_name = addslashes($_POST["productname"]);
    $description = addslashes($_POST["description"]);
    $price = addslashes($_POST["price"]);
   
    // Check if farmer is authenticated
	if(isset($_SESSION['farmer_id'])){
        
		$user_id = $_SESSION['farmer_id'];
		echo $user_id;
		
	  }
      else{
          header('location: ../farmers/login.php');
      }
	
      $targetDir = "../products_upload_images/";
      $allowTypes = array('jpg','png','jpeg','gif');
      $fileNames = array_filter($_FILES['files']['name']); 
      $images = [];
      if(!empty($fileNames)){ 
          foreach($_FILES['files']['name'] as $key=>$val){ 
              // File upload path 
              
              $fileName = basename($_FILES['files']['name'][$key]); 
              $targetFilePath = $targetDir . $fileName; 
              if (!file_exists($targetDir))
              {
                  @mkdir($targetDir, 0777);
              }   
              // Check whether file type is valid 
              $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
              if(in_array($fileType, $allowTypes)){ 
                  // Upload file to server 
                  if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                      // Image db insert sql 
                    //   $insertValuesSQL .= "('".$fileName."', NOW()),"; 
                    array_push($images, $_FILES["files"]["name"][$key]);
                  }else{ 
                    //   $errorUpload .= $_FILES['files']['name'][$key].' | '; 
                  } 
              }else{ 
                //   $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
              } 
          } 
        }     
        
          $sql_insert_product = "INSERT INTO eurofarm_products(
            
            product_name,
            product_description,
            price,
            product_ratings,
            
            product_image1,
            product_image2,
            product_image3,
            product_owner,
            date_uploaded
        
            ) VALUES (
                
                '$product_name',
                '$description',
                '$price',
                '1',
                '$images[0]',
                '$images[1]',
                '$images[2]',
                '$user_id',
                CURRENT_TIMESTAMP
                )";
            if (mysqli_query($conn, $sql_insert_product)) {
                echo "successfully inserted product and image to product upload images!";
                $_SESSION['product_message'] = 'Successfully inserted product to database!';
                $_SESSION['product_msg_type'] = 'success';
                header('location: ../farmers/add_products.php');
            }
            else {
                $_SESSION['product_message'] = "Error: " . $sql_insert_product . "" . mysqli_error($conn);
                $_SESSION['product_msg_type'] = 'danger';
                 header('location: ../farmers/add_products.php');
            echo "Error: " . $sql_insert_product . "" . mysqli_error($conn);
        }

?>

