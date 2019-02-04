<?php 
   try{

   	   $connection=new PDO("mysql:host=localhost; dbname=blog", "root", "");

   }catch(PDOException $e){
   echo $e->getMessage();
   }

?>