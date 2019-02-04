<?php
  if($_SERVER['REQUEST_METHOD']=='POST'){
  	 include 'db.php';

  	 $result="register.php?error=1";

  	 if(isset($_POST['login']) && isset($_POST['password']) && isset($_POST['re_password']) && isset($_POST['full_name'])){
         
         if($_POST['password']==$_POST['re_password']){

         	$query=$connection->prepare("SELECT * FROM users WHERE login =:login LIMIT 1");

         	$query->execute(array("login" =>$_POST['login']));

         	if($query->rowCount()==0){
               $query=$connection->prepare("INSERT INTO users(id,login,password, full_name) VALUES(NULL, :login, :password, :full_name)");

               $query->execute(array("login" =>$_POST['login'],"password" =>sha1($_POST['password']),"full_name" =>$_POST['full_name'] ));

                 $result="signin.php";
                
         	}

         }

  	 }
  	  header("Location: $result");
  }else{
  	header("Location: index.php");
  }

 

?>