<?php
  if($_SERVER['REQUEST_METHOD']=='POST'){
  	 include 'db.php';

  	 $result="signin.php?error=1";

  	 if(isset($_POST['login']) && isset($_POST['password'])){         
        

         	$query=$connection->prepare("SELECT * FROM users WHERE login =:login AND password = :password LIMIT 1");

         	$query->execute(array("login" =>$_POST['login'], "password" =>sha1($_POST['password'])));

         	if($query->rowCount()>0){
               
               session_start();
               $_SESSION['userData']=$query->fetch();
               $result="index.php";

         	}

         	
         }

  	  header("Location: $result");
  }else{
  	header("Location: index.php");
  }

 

?> 