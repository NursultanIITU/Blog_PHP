<?php 
include "userModule.php";
if($USER_DATA==null){
?> 
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIGN IN</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/blog-home.css" rel="stylesheet">

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
             Authentication Error
            </div>
          <?php } ?> 

          <form  action="auth.php" method="post">
            <div class="form-group">
              <label>Email</label>
              <input type="text" class="form-control" name="login" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" name="password" placeholder="Password">
            </div>           
            <button type="submit" class="btn btn-primary">Register</button>
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