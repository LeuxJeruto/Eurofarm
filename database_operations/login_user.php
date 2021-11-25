
 <?php      
        session_start();
        include_once "database_connection.php";
       
        $farmname = $_POST['email'];  
        $password = $_POST['password'];  
          
            if(isset($_POST['email']) && isset($_POST['password'])){
                $farmname = $_POST['email'];  
                $password = $_POST['password'];  
                // $hashed_password = hash('sha512', $password);
             
                $sql_select_user = "SELECT * FROM eurofarm_users WHERE user_email ='".$farmname."' AND user_password ='".$password."' limit 1";
                $user_result = mysqli_query($conn, $sql_select_user);
                $row = mysqli_fetch_array($user_result);
            
                if(mysqli_num_rows($user_result) == 1 ){
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['login_message'] = 'Successfully logged in!';
                    $_SESSION['login_msg_type'] = 'success';
                    echo "<br>";
                    echo  $_SESSION['login_msg_type'];
                    echo "<br>";
                    echo  $_SESSION['login_message'];
                    
                    header('location: ../users/index.php');
                    
                }else{
                    echo 'farm not found';
                    echo $hashed_password;
                    echo '<br>';
                    echo $user_password;
                    $_SESSION['login_message'] = 'Incorrect credentials';
                    $_SESSION['login_msg_type'] = 'danger';
                    echo  $_SESSION['login_message'];
                    header('location: ../users/login.php');
                }
            }
            
    ?>  