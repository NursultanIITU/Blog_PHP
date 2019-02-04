<?php 
include "userModule.php";
if($USER_DATA!=null){
$blog=null;

if(isset($_GET['id']) && is_numeric($_GET['id'])){

  $query=$connection->prepare("SELECT b.id,b.user_id, b.title,b.short_content, b.content, b.post_date, u.full_name FROM blogs b LEFT OUTER JOIN users u ON u.id=b.user_id 
    WHERE b.id =:id AND b.user_id =:user_id  LIMIT 1
    ");

  $query->execute(array('id'=>$_GET['id'],'user_id'=>$USER_DATA['id']));
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

    <title>Edit Blog</title>

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
               Error editing blog
            </div>
          <?php } ?> 

          <?php 
            if(isset($blog) && $blog!=null){
          ?>

          <form  action="to_save_blog.php" method="post" id="edit_blog_id">
            <input type="hidden" name="id" value="<?php echo $blog['id'] ?>">
            <div class="form-group">
              <label>Title</label>
              <input type="text" class="form-control" name="title" placeholder="Enter title" value="<?php echo $blog['title']; ?>">
            </div>
             <div class="form-group">
              <label>Short Content</label>
             <textarea class="form-control" name="short_content" id="" cols="15" rows="5"><?php echo $blog['short_content']; ?></textarea> 
            </div>
             <div class="form-group">
              <label>Content</label>
             <textarea class="form-control" name="content" id="" cols="15" rows="5"><?php echo $blog['content']; ?></textarea> 
            </div>
                       
            <button type="submit" class="btn btn-primary">Save Blog</button>
            <input type="submit" class="btn btn-danger" value=" Delete Blog" onclick="toDeleteBlog()">
            
          </form>

          <?php 
           }else{
           ?>

            <h1>ACCESS DENIED</h1>

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
    <script>
      function toDeleteBlog(){
          var check=confirm("Do you wanna delete?");
          if(check){
            document.getElementById('edit_blog_id').action="to_delete_blog.php";
            document.getElementById("edit_blog_id").submit();
          }
      }
    </script>

  </body>

</html>
<?php }else{
 
   header("Location: index.php");
}?>