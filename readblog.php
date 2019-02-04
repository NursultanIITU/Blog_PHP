<?php 
include "userModule.php";
$blog=null;

if(isset($_GET['id']) && is_numeric($_GET['id'])){

  $query=$connection->prepare("SELECT b.id,b.user_id, b.title,b.short_content, b.content, b.post_date, u.full_name FROM blogs b LEFT OUTER JOIN users u ON u.id=b.user_id 
    WHERE b.id =:id LIMIT 1
    ");

$query->execute(array('id'=>$_GET['id']));
$blog=$query->fetch();

}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Add Blog</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">  
    <link href="css/blog-home.css" rel="stylesheet">
  </head>
  <body> 
    <?php
       include 'navigation.php';
    ?>   
    <div class="container">

      <div class="row">
      
        <div class="col-md-8">
          <br><br>
         <?php 

          if(isset($blog) && $blog!=null){ 
          
         ?>

         <h4> <?php echo $blog['title']; ?> </h4>
          <b> <?php echo $blog['short_content']; ?> </b>
           <p> <?php echo $blog['content']; ?> </p>
           <b>  Posted on <?php echo $blog['post_date']?>  by <?php echo $blog['full_name']?></b>
           <br><br>
           <?php
              if($blog['user_id']==$USER_DATA['id']){
           ?>

           <a href="editblog.php?id=<?php echo $blog['id']?>" class="btn btn-primary btn-sm">Edit Blog</a>

           <?php
             }
            ?>

         <?php 
          }else{
         ?>
           <?php echo "<h1> 404 BLOG NOT FOUND </h1>" ?>
       <?php
        }
       ?>


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
