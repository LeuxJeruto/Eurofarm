
<?php
session_start();
include "database_connection.php";

	$blog_title = addslashes($_POST["blogname"]);
    $blog = addslashes($_POST["blog"]);
    
   
    // Check if farmer is authenticated
	if(isset($_SESSION['admin'])){
        
		$user_id = $_SESSION['farmer_id'];
		echo $user_id;
		
	  }
      else{
          header('location: ../admin/login.php');
      }
	
  

    $output_dir = "../blog_upload_images/";/* Path for file upload */
	$RandomNum   = time();
	$ImageName      = str_replace(' ','-',strtolower($_FILES['blog_image']['name'][0]));
	$ImageType      = $_FILES['blog_image']['type'][0];
 
	$ImageExt = substr($ImageName, strrpos($ImageName, '.'));
	$ImageExt       = str_replace('.','',$ImageExt);
	$ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);

	//create image with blog name as part of image name
	$NewImageName = $user_id.'-blogimg'.$RandomNum.'.'.$ImageExt;
    $ret[$NewImageName] = $output_dir.$NewImageName;
	
	/* Try to create the directory if it does not exist */
	if (!file_exists($output_dir))
	{
		@mkdir($output_dir, 0777);
	}               
 
	move_uploaded_file($_FILES["blog_image"]["tmp_name"][0],$output_dir."/".$NewImageName );
    $sql_insert_blog = "INSERT INTO eurofarm_blogs(
            
        blog_title,
        blog,
        blog_image,
        date_uploaded
    
        ) VALUES (
            '$blog_title',
            '$blog',
            '$NewImageName',
            CURRENT_TIMESTAMP
            )";
		if (mysqli_query($conn, $sql_insert_blog)) {
            echo "successfully inserted blog and image to blog upload images!";
            $_SESSION['blog_message'] = 'Successfully inserted blog to database!';
            $_SESSION['blog_msg_type'] = 'success';
			header('location: ../admin/create_blog.php');
		}
		else {
            $_SESSION['blog_message'] = "Error: " . $sql_insert_blog . "" . mysqli_error($conn);
            $_SESSION['blog_msg_type'] = 'danger';
            header('location: ../admin/create_blog.php');
		echo "Error: " . $sql_insert_blog . "" . mysqli_error($conn);
	 }

?>

