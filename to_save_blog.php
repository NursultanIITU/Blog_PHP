<?php
  if($_SERVER['REQUEST_METHOD']=='POST'){
     include "userModule.php";
  	 include 'db.php';	
  	
     if($USER_DATA!=null){
        $result="editblog.php?error=1";

        if(isset($_POST['id']) && is_numeric($_POST['id']) && isset($_POST['title']) && isset($_POST['short_content']) && isset($_POST['content'])){

          $query=$connection->prepare("UPDATE blogs SET
            title=:title,
            short_content=:short_content,  
            content=:content
            WHERE user_id=:user_id AND id=:id");

          $query->execute(array(
            'id'=>$_POST['id'],
            'user_id'=>$USER_DATA['id'],
            'title'=>$_POST['title'],
            'short_content'=>$_POST['short_content'],
            'content'=>$_POST['content'],
          ));

          $result="index.php";

        }


         header("Location: $result");
     }else{
       header("Location: index.php");
     }  	 
  }else{
  	header("Location: index.php");
  }

 

?>