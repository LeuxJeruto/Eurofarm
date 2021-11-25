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
                
                if(isset($_SESSION['blog_message'])):?>
                <div class="alert alert-<?php echo $_SESSION['blog_msg_type']; ?>">
                    <?php
                    echo $_SESSION['blog_message'];
                    unset($_SESSION['blog_message']);
                    unset($_SESSION['blog_msg_type']);
                    ?>
                </div>
                <?php
            
                endif ?>
                <div class="card-body">
                  <h4 class="card-title">Add a Blog To the Website</h4>
                  <p class="card-description">
                    
                  </p>
                  <form action = "../database_operations/blog_add.php" method = "POST"  enctype="multipart/form-data" >
                    <div class="form-group">
                      <label  for="exampleInputUsername1">Blog Tittle</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" name = "blogname" placeholder="Product">
                    </div>
                   
                    
                    <div class="form-group">
                      <label for="exampleTextarea1">Write your blog here</label>
                      <textarea class="form-control" name = "blog" id="exampleTextarea1" rows="4"></textarea>
                    </div>
                    <label for="formFileLg" class="form-label">Uplaod your Blog image</label>
                     <input class="form-control form-control-lg" name="blog_image[]" id="formFileLg" type="file" /> 
                   
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    
                  </form>
                </div>
              </div>
            </div>
    </div>
</body>
</html>