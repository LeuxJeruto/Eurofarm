<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Register to start shopping</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="../css/bootstrap/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="../css/bootstrap/style.min.css" rel="stylesheet">
  <style type="text/css">
    html,
    body,
    header,
    .carousel {
      height: 60vh;
    }

    @media (max-width: 740px) {

      html,
      body,
      header,
      .carousel {
        height: 100vh;
      }
    }

    @media (min-width: 800px) and (max-width: 850px) {

      html,
      body,
      header,
      .carousel {
        height: 100vh;
      }
    }

  </style>
</head>
<body>
<div class="container my-4">


<hr class="mb-5"/>

 
        <!--Grid column-->
    
        <!--Grid column-->
        <div class="col-md-6 mb-4">

        <?php
          session_start();
        if(isset($_SESSION['register_message'])):?>
          <div class="alert alert-<?php echo $_SESSION['register_msg_type']; ?>">
            <?php
              echo $_SESSION['register_message'];
              unset($_SESSION['register_message']);
              unset($_SESSION['register_msg_type']);
            ?>
          </div>
        <?php
      
        endif ?>
      
    
          <!--Title-->
          <h3 class="secondary-heading">
            Register to View products we sell.
            
          </h3>
    
          <!--Section: Live preview-->
          <section class="pr-1">
    
            <!-- Material form register -->
            <div class="card">
    
              <h5 class="card-header info-color white-text text-center py-4">
                <strong>Sign up</strong>
              </h5>
    
              <!--Card content-->
              <div class="card-body px-lg-5 pt-0">
    
                <!-- Form -->
                <form class="text-center" method= "POST" action="../database_operations/register_user.php" enctype="multipart/form-data" style="color: #757575;">
    
                  <div class="form-row">
                    <div class="col">
                      <!-- First name -->
                      <div class="md-form">
                        <input type="text" name= "user_name" required id="materialRegisterFormFirstName" class="form-control">
                        <label for="materialRegisterFormFirstName" class="active">User name</label>
                      </div>
                    </div>
                    <div class="col">
                      <!-- Last name -->
                      <div class="md-form">
                        <input type="email" name ="email" required id="materialRegisterFormLastName" class="form-control">
                        <label for="materialRegisterFormLastName" class="active">Email Address</label>
                      </div>
                    </div>
                  </div>
    
                  <!-- E-mail -->
                  <div class="md-form mt-0">
                    <input type="text" name= "phone" id="materialRegisterFormEmail" class="form-control" required>
                    <label  class="active">Phone Number</label>
                  </div>
                   <!-- E-mail -->
                   <div class="md-form mt-0">
                    <input type="text" name= "location" id="materialRegisterFormEmail" class="form-control" required>
                    <label  class="active">Location</label>
                  </div>
    
                  <!-- Password -->
                  <div class="md-form">
                    <input type="password" name="password" required id="materialRegisterFormPassword" class="form-control" required aria-describedby="materialRegisterFormPasswordHelpBlock">
                    <label for="materialRegisterFormPassword" class="active">Password</label>
                    <small id="materialRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                      At least 8 characters and 1 digit
                    </small>
                  </div>
    
                  <!-- confirm pass -->
                  <div class="md-form">
                    <input type="password" name= "confirm_password" id="materialRegisterFormPhone" required class="form-control" aria-describedby="materialRegisterFormPhoneHelpBlock">
                    <label for="materialRegisterFormPhone" class="active">Confirm password</label>
                    <small id="materialRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4">
                      Passwords must match.
                    </small>
                  </div>

                  <label for="formFileLg" class="form-label">Uplaod your image(optional)</label>
                     <input class="form-control form-control-lg" name="user_image[]" id="formFileLg" type="file" /> 
    
                 
    
                  <!-- Sign up button -->
                  <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Sign up</button>
    
                  <!-- Social register -->
                  <p>or <a href="login.php">Sign in</a> if you already have an account:</p>
    
                
    
                  <hr>
    
                  <!-- Terms of service -->
                  <p>By clicking
                    <em>Sign up</em> you agree to our
                    <a href="" target="_blank">terms of service</a>
    
                </p></form>
                <!-- Form -->
    
              </div>
    
            </div>
            <!-- Material form register -->
    
          </section>
          <!--Section: Live preview-->
    
        </div>
        <!--Grid column-->
    
      </div>
      <!--Grid row-->
    
    </section>

</div>
</body>
</html>