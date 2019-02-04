<?php
  if($_SERVER['REQUEST_METHOD']=='POST'){
     include "userModule.php";
  	 include 'db.php';	
  	
     if($USER_DATA!=null){
        $result="index.php";

        if(isset($_POST['id']) && is_numeric($_POST['id'])){

          $query=$connection->prepare("DELETE FROM blogs WHERE id=:id AND user_id=:user_id");

          $query->execute(array(
            'id'=>$_POST['id'],
            'user_id'=>$USER_DATA['id']
          ));     

        }

         header("Location: $result");
     }else{
       header("Location: index.php");
     }  	 
  }else{
  	header("Location: index.php");
  }
?>