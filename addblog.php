<?php 
include "userModule.php";
if($USER_DATA!=null){
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Blog</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/blog-home.css" rel="stylesheet">
    <script src="tinymce/js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
  </head>

  <body>

    <!-- Navigation -->
    <?php
       include 'navigation.php';
    ?>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
          <br>
          <br>
          <?php 
               if(isset($_GET['error'])){
          ?>
            <div class="alert alert-danger" role="alert">
               Error adding blog
            </div>
          <?php } ?> 

          <form  action="to_add_blog.php" method="post">
            <div class="form-group">
              <label>Title</label>
              <input type="text" class="form-control" name="title" placeholder="Enter title">
            </div>
             <div class="form-group">
              <label>Short Content</label>
             <textarea class="form-control" name="short_content" id="" cols="15" rows="5"></textarea> 
            </div>
             <div class="form-group">
              <label>Content</label>
             <textarea class="form-control" name="content" id="" cols="15" rows="5"></textarea> 
            </div>
                       
            <button type="submit" class="btn btn-primary">Add Blog</button>
          </form>

        </div>

        <!-- Sidebar Widgets Column -->

        <?php 
           include 'sidebar.php';
        ?>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
   <?php 
       include 'footer.php';
    ?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
<?php }else{
 
   header("Location: index.php");
}?>