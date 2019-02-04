<?php 
include "userModule.php";
if(isset($_GET['query'])){
   $key=$_GET['query'];
}


$query=$connection->prepare("SELECT b.id,b.user_id, b.title,b.short_content, b.content, b.post_date, u.full_name FROM blogs b LEFT OUTER JOIN users u ON u.id=b.user_id
  WHERE b.title LIKE :search_key OR b.short_content LIKE :search_key OR b.content LIKE :search_key
  ORDER BY b.post_date DESC");

$query->execute(array("search_key"=>(isset($_GET['query'])?"%".$_GET['query']."%":"%%")));
$resultList=$query->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Search Page</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/blog-home.css" rel="stylesheet">

  </head>

  <body>

    
    <?php
       include 'navigation.php';
    ?>

 
    <div class="container">

      <div class="row">

       
        <div class="col-md-12">

           <!-- Search Widget -->
          <div class="card my-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
              <form action="search" method="get">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for..." name="query" value="<?php echo (isset($_GET['query'])?$_GET['query'] : "") ?>">
                    <span class="input-group-btn">
                      <button class="btn btn-secondary" type="button">Go!</button>
                    </span>
                  </div>
              </form>
            </div>
          </div>

         <?php 
             if($query->rowCount()>0){
             foreach ($resultList as $blog) {             	
         ?>         
          <div class="card mb-4" style="margin-top: 30px;">
            <div class="card-body">
              <h5 class="card-title"> <?php echo $blog['title']?></h5>
              <p class="card-text"><?php echo $blog['short_content']?> </p>
              <a href="readblog.php?id=<?php echo $blog['id']?>" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Posted on <?php echo $blog['post_date']?>  by <?php echo $blog['full_name']?>
            </div>
          </div>
		   <?php 
		     }
       }else{
		    ?>
  <h2>RESULT NOT FOUND</h2>

      <?php } ?>
        
        
         
        </div>

        <!-- Sidebar Widgets Column -->


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
