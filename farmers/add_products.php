<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container-scroller">
        <?php include "header.php" ?>

        <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
              <?php
                
                if(isset($_SESSION['product_message'])):?>
                <div class="alert alert-<?php echo $_SESSION['product_msg_type']; ?>">
                    <?php
                    echo $_SESSION['product_message'];
                    unset($_SESSION['product_message']);
                    unset($_SESSION['product_msg_type']);
                    ?>
                </div>
                <?php
            
                endif ?>
                <div class="card-body">
                  <h4 class="card-title">Add your farm products to your space</h4>
                  <p class="card-description">
                    
                  </p>
                  <form action = "../database_operations/product_add.php" method = "POST"  enctype="multipart/form-data" class="forms-sample">
                    <div class="form-group">
                      <label  for="exampleInputUsername1">Product Name</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" name = "productname" placeholder="Product">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Product Price</label>
                      <input type="number" class="form-control" name = "price" id="exampleInputEmail1" placeholder="Product Price">
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleTextarea1">Add a Product Description</label>
                      <textarea class="form-control" name = "description" id="exampleTextarea1" rows="4"></textarea>
                    </div>
                    <label for="formFileLg" class="form-label">Uplaod your Product image</label>
                     <input class="form-control form-control-lg" name="files[]" multiple id="formFileLg" type="file" /> 
                   
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    
                  </form>
                </div>
              </div>
            </div>
    </div>
</body>
</html>


  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>