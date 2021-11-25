<?php
//creates user on the database with username, email and, password and contact credentials set to empty


  session_start();
  include_once "database_connection.php";
  

  $user_name = $_POST["user_name"];
  $user_email = $_POST["email"];
  $phone = $_POST["phone"];
  $location = $_POST["location"];
  $user_password = $_POST["password"];
  $confirm_password = $_POST["confirm_password"];

 
    // check if passwords are same.
   
    if($user_password == $confirm_password)
    {
    
        echo "passwords same";
        //INSERT USER DATA INTO THE USERS TABLE

        //hash user password
        
        // $hashed_password = hash('sha512', $user_password);
            $sql_insert = "INSERT INTO eurofarm_users (
                    
                username,
                user_email,
                phone_number,
                user_password,
                location,
                reviews,
                user_role,
                date_joined
                
                
                ) VALUES (
                    '$user_name',
                    '$user_email',
                    '$phone',
                    '$user_password',
                    '$location',
                    '1',
                    'farmer',
                     CURRENT_TIMESTAMP
                     
                    )";

        if(mysqli_query($conn, $sql_insert)){
            echo "farmer succesfully inserted";
            // echo $hashed_password;

            //after succesful registration login farmer to create a session and direct to home page
            $sql_select_user = "SELECT * FROM eurofarm_users WHERE user_email ='".$user_email."' AND user_password ='".$user_password."' limit 1";
            $user_result = mysqli_query($conn, $sql_select_user);
            $row = mysqli_fetch_array($user_result);

            if(mysqli_num_rows($user_result) == 1 ){

                $_SESSION['user_id'] = $row['id'];
                $_SESSION['register_message'] = 'Successfully logged in!';
                $_SESSION['register_msg_type'] = 'success';
                header('location: ../users/index.php');
                
            }else{
                echo 'user not found';
                $_SESSION['register_message'] = 'If you have registered continue to login';
                $_SESSION['register_msg_type'] = 'danger';
                header('location: ../users/register.php');

                
            }
            
            
            

        
        }else{
            echo "ERROR: Could not insert data" . mysqli_error($conn);
        }
    }else{
            echo 'Passwords did not match';
            $_SESSION['register_message'] = 'Paaswords did not match';
            $_SESSION['register_msg_type'] = 'danger';
            header('location: ../farmers/register.php');
    }
?>
