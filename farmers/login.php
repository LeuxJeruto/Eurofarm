<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="../css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="../css/style.css">

    <title>Login</title>
  </head>
  <body>
  

  
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6 order-md-2">
          <img src="../images/undraw_file_sync_ot38.svg" alt="Image" class="img-fluid">
        </div>
       
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Sign In to <strong>Farmers Ecommerce</strong></h3>
              <p class="mb-4">Where you can easily buy and sell your products</p>
            </div>
            <?php
          session_start();
        if(isset($_SESSION['login_message'])):?>
          <div class="alert alert-<?php echo $_SESSION['login_msg_type']; ?>">
            <?php
              echo $_SESSION['login_message'];
              unset($_SESSION['login_message']);
              unset($_SESSION['login_msg_type']);
            ?>
          </div>
        <?php
      
        endif ?>
            <form action="../database_operations/login_farmer.php" method="post">
              <div class="form-group first">
                <label for="Farmname">FarmName</label>
                <input type="text" require name = "farmname"  class="form-control" id="username">

              </div>
              <div class="form-group last mb-4">
                <label for="password">Password</label>
                <input type="password" require name="password" class="form-control" id="password">
                
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span> 
              </div>

              <input type="submit" name = "login" value="Log In" class="btn text-white btn-block btn-primary">

              
              
            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

  
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>