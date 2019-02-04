<?php 

   include 'db.php';
   session_start();
   $USER_DATA=null;

         if(isset($_SESSION['userData'])){    
        

          $query=$connection->prepare("SELECT * FROM users WHERE login =:login AND password = :password LIMIT 1");

          $query->execute(array("login" =>$_SESSION['userData']['login'], "password" =>$_SESSION['userData']['password']));

          if($query->rowCount()>0){
               
              $USER_DATA=$query->fetch();

          }else{
            session_destroy();
          }

          
         }


?>