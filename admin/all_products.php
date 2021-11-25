<!DOCTYPE html>
<html lang="en">


<body>
  <div class="container-scroller">
      <?php include "header.php"?>
          <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
            <?php
            
            if(isset($_SESSION['delete_product'])):?>
            <div class="alert alert-<?php echo $_SESSION['delete_product_type']; ?>">
                <?php
                echo $_SESSION['delete_product'];
                unset($_SESSION['delete_product']);
                unset($_SESSION['delete_product_type']);
                ?>
            </div>
            <?php
        
            endif ?>
            <?php
                
                if(isset($_SESSION['edit_message'])):?>
                <div class="alert alert-<?php echo $_SESSION['edit_msg_type']; ?>">
                    <?php
                    echo $_SESSION['edit_message'];
                    unset($_SESSION['edit_message']);
                    unset($_SESSION['edit_msg_type']);
                    ?>
                </div>
                <?php
            
            endif ?>
              <div class="row">
                
              </div>
            </div>
          </div>
          

          <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0">Products Inventory</h4>
                      <a href="../index.php" class="text-dark ml-auto mb-3 mb-sm-0"> View Products in store</a>
                    </div>
                    <div class="table-responsive border rounded p-1">
                      <table class="table">
                        <thead>
                          <tr>
                            <th class="font-weight-bold">Product Name</th>
                            <th class="font-weight-bold">Amount</th>
                            
                            <th class="font-weight-bold">Created at</th>
                            <th class="font-weight-bold">Product Owner</th>
                            <th class="font-weight-bold">Update</th>
                            <th class="font-weight-bold">Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                              include_once "../database_operations/database_connection.php";
                              $sql = "SELECT * FROM eurofarm_products ORDER BY id DESC ";

                              if($result = mysqli_query($conn, $sql)){
                                  if(mysqli_num_rows($result) > 0){
                                  
                                      while($row = mysqli_fetch_array($result)){
                                        $owner_id = $row['product_owner'];
                                        $sql_owner = "SELECT * FROM eurofarm_users WHERE id = $owner_id ORDER BY id DESC ";
                                        if($result_owner = mysqli_query($conn, $sql_owner)){
                                            if(mysqli_num_rows($result_owner) > 0){
                                                $row_owner = mysqli_fetch_array($result_owner);
                                                $farmer_name = $row_owner['username'];
                                                $location = $row_owner['phone_number'];
                                            }
                                        }
                                      ?>  
                                        <tr>
                                            <td>
                                              <img class="img-sm rounded-circle" src="../products_upload_images/<?php echo $row['product_image1'];?>" alt="food image"> <?php echo $row['product_name'];?>
                                            </td>
                                            <td>$<?php echo $row['price'];?></td>
                                            
                                            <td><?php echo $row['date_uploaded'];?></td>
                                            <td><?php echo $farmer_name;?></td>
                                            <td>
                                            <button type='button' class='btn btn-warning' data-toggle='modal' data-target="#edit<?php echo $row['id'];?>">
                                                Update
                                            </button>
                                            </td>
                                            <td>
                                            <button type='button' class='btn btn-danger' data-toggle='modal' data-target="#delete<?php echo $row['id'];?>">
                                              Delete
                                            </button>
                                            </td>
                                        </tr>

                                         <!-- Delete food confirmation Modal -->
                                        <div class="modal fade" id="delete<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                              <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Confirm Product Delete</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">
                                                <p>Delete <b><?php echo $row['product_name'] ?></b> from your available foods</p>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <a href="../database_operations/delete_product.php?delete_product=<?php echo $row['id'];?>"><button class="btn btn-danger btn-sm">Delete</button></a>
                                              </div>
                                              </div>
                                            </div>
                                        </div>

                                        <!--Modal to update item details--->
                                        <div class="modal fade" id="edit<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                <form action = "../database_operations/update_product.php?product_edit=<?php echo $row['id'];?>" method = "POST"  enctype="multipart/form-data" class="forms-sample">
                                                    <div class="form-group">
                                                    <label  for="exampleInputUsername1">Product Name</label>
                                                    <input type="text" class="form-control" id="exampleInputUsername1" name = "productname" value =<?php echo $row['product_name'] ?>  placeholder="Product">
                                                    </div>
                                                    <div class="form-group">
                                                    <label for="exampleInputEmail1">Product Price</label>
                                                    <input type="number" class="form-control" name = "price" value = <?php echo $row['price'] ?> id="exampleInputEmail1" placeholder="Product Price">
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                    <label for="exampleTextarea1">Add a Product Description</label>
                                                    <textarea class="form-control" name = "description" id="exampleTextarea1" rows="4"><?php echo $row['product_description'] ?></textarea>
                                                    </div>
                                                    
                                                
                                                    <button type="submit" name = "update_product" class="btn btn-primary mr-2">Submit</button>
                                                    
                                                </form>
                                                </div>
                                                
                                              </div>
                                            </div>
                                          </div>

                                           <!--end Modal to update item details--->
                                    <?php }
                                  }
                              }
                            ?>
                        
                         
                        </tbody>
                      </table>
                    </div>
                    <div class="d-flex mt-4 flex-wrap">
                      <p class="text-muted">Showing 1 to 10 of 57 entries</p>
                      <nav class="ml-auto">
                        <ul class="pagination separated pagination-info">
                          <li class="page-item"><a href="#" class="page-link"><i class="icon-arrow-left"></i></a></li>
                          <li class="page-item active"><a href="#" class="page-link">1</a></li>
                          <li class="page-item"><a href="#" class="page-link">2</a></li>
                          <li class="page-item"><a href="#" class="page-link">3</a></li>
                          <li class="page-item"><a href="#" class="page-link">4</a></li>
                          <li class="page-item"><a href="#" class="page-link"><i class="icon-arrow-right"></i></a></li>
                        </ul>
                      </nav>
                    </div>
                  </div>
         
          
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

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
  <!-- End custom js for this page-->
</body>

</html>

