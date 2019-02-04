<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">
           <?php 
             echo ($USER_DATA!=null?$USER_DATA['full_name']:'Blogging');

          ?>

        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <?php 
               if($USER_DATA!=null){            
            ?>
              <li class="nav-item active">
              <a class="nav-link" href="index.php">Feed
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="addblog.php">New Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Sign Out</a>
            </li>
            <?php
                }else{
             ?>

            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="register.php">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="signin.php">Sign In</a>
            </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </nav>