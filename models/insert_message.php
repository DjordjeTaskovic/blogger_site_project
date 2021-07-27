<?php
 session_start();
 include "../config/connection.php";
 include "functions.php";
 header("Content-type: application/json");

 if(isset($_POST["button"])){
     $data = '';
     $code = 404;
 $name = $_POST["name"];
 $email = $_POST["email"];
 $subject = $_POST["subject"];
 $message = $_POST["message"];

 $greske = 0;
        $userimeRe="/^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})*$/";//Tonma Qwwq
    if(!preg_match($userimeRe, $name)){
        $greske++;
        $data = ["message" => "Name is not in the right format."];
    }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $greske++;
            $data = ["message" => "Email is not in the right format."];
        }
    if(strlen($message)<3){
        $greske++;
        $data = ["message" => "Min characters for message is 3."];
    }
    if($greske != 0)
    {
    $data = ["message" => "Error on server."];
    $code = 422;
    }
        else{

            $kontakt = insert_Message($name,$email,$subject,$message);
            try{
               if($kontakt){
                   $data = ["message" =>"Succesfully sent message."];
                  $code=201;
               }
            }
            catch(PDOException $ex)
            {
                $data = ["message" => "Error in database procesing."];
            $code = 500;
            }

            }
 }else{
 $code=404;
 }
 echo json_encode($data);
 http_response_code($code);
?>
