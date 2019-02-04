<?php
  if($_SERVER['REQUEST_METHOD']=='POST'){
     include "userModule.php";
  	 include 'db.php';	
  	
     if($USER_DATA!=null){
        $result="addblog.php?error=1";

        if(isset($_POST['title']) && isset($_POST['short_content']) && isset($_POST['content'])){

          $query=$connection->prepare("INSERT INTO blogs(id, user_id, title,short_content,content, post_date) VALUES(NULL, :user_id, :title, :short_content, :content, NOW())");

          $query->execute(array(
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