<?php
 //handles database conection and is used in all files that need the database
 //Also creates the database itself and all the required tables only if they do not exist

//  Table created
        // 1. Users table
        // 2. Blogs table
        // 3. Advertisements
        // 4. Products table

 $servername = "localhost";
 $dBusername = "root";
 $password = "";
 $dbname = "eurofarm";
 
 // Create connection
 $connection = new mysqli($servername, $dBusername, $password);
 // Check connection
 if ($connection->connect_error) {
   die("Connection failed: " . $connection->connect_error);
 }
 
 // Create database if it does not exist
 $sql_create_user_table = "CREATE DATABASE IF NOT EXISTS eurofarm";

 if ($connection->query($sql_create_user_table) === TRUE) {
   
  // echo "database created";
 } else {
   echo "Error creating database: " . $conn->error;
 }
 $conn = new mysqli($servername, $dBusername, $password, $dbname);

//  Create database for all the users
$sql_table = "CREATE TABLE IF NOT EXISTS eurofarm_users(
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(250) NOT NULL,
    user_email VARCHAR(250) NOT NULL,
    phone_number VARCHAR(20),
    user_password VARCHAR(250) NOT NULL,
    location VARCHAR(200),
    reviews INT,
    user_role VARCHAR(20),
    date_joined DATETIME NOT NULL
  )";

  if(mysqli_query($conn, $sql_table)){
      // echo"successfully created users table";
  }else{
    //  echo'error: Could not execute sql CREATE users table' . mysqli_error($link);
  }
 // create products table if it does not exist.
 $create_producttable_query = "CREATE TABLE IF NOT EXISTS eurofarm_products(
    id INT PRIMARY KEY AUTO_INCREMENT,
    product_name VARCHAR(600) NOT NULL,
    product_description VARCHAR(1200) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    product_ratings INT,
    product_image1 VARCHAR(100) NOT NULL,
    product_image2 VARCHAR(100),
    product_image3 VARCHAR(100),
    product_owner INT,
    date_uploaded DATETIME NOT NULL
  )";

  if(mysqli_query($conn, $create_producttable_query)){
      //echo"successfully created products table";
  }else{
      // echo'error: Could not execute sql CREATE available_food_query ' . mysqli_error($conn);
  }

  // create blogs table if it does not exist.
 $create_blogtable_query = "CREATE TABLE IF NOT EXISTS eurofarm_blogs(
  id INT PRIMARY KEY AUTO_INCREMENT,
  blog_title VARCHAR(600) NOT NULL,
  blog TEXT NOT NULL,
  blog_image VARCHAR(100) NOT NULL,
  date_uploaded DATETIME NOT NULL
)";

if(mysqli_query($conn, $create_blogtable_query)){
    //echo"successfully created blogs table";
}else{
    // echo'error: Could not execute sql CREATE available_food_query ' . mysqli_error($conn);
}

?>