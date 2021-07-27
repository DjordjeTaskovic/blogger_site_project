<?php
session_start();
include "../config/connection.php";
include "functions.php";
$error = [];
if(isset($_POST["btndelete"])){

    $blogID = $_POST['blogID'];
    $rez = delete_Blog($blogID);
try {
    if($rez){
        $rez->execute();
    }else{
        array_push($error,'sql sintax error.');
    }


} catch (\Throwable $th) {
    array_push($error,$th->getMessage());
}

}else{
    array_push($error,'sub bu not clicking.');
}
if (count($error)!=0) {
    var_dump($error);
  }else{
      header('Location:../index.php?page=blogger');
  }

