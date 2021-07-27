<?php
include "../config/connection.php";
include "functions.php";
if(isset($_POST["ncom"])){
        $com = $_POST['newcomment'];
        $blogID = $_POST['blogID'];
        $userID = $_POST['userID'];

$greske = 0;
   if(strlen($com)<3){
       $greske++;
   var_dump('Min length for a coomment should be 3 characters.');
   }
   if($greske != 0)
   {
   var_dump('data check error.');
   $code = 422;
   }else{
          $rez = insert_Comment($userID,$blogID,$com);
           try{
              if($rez){
                $rez->execute();
                 $code = 201;
                }
             }
           catch(PDOException $ex) { 
               var_dump($ex->getMessage());
             $code = 500;
           }

           }
 }else{
     $code = 404;
 }
header("Location:../index.php");
