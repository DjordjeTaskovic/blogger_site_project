<?php
session_start();
include "../config/connection.php";
include "functions.php";
header("Content-type: application/json");
$data = '';
$code = '';
if (isset($_POST["button"])) {
   $ime = $_POST['ime'];
   $email = $_POST['mail'];
   $adresa = $_POST['adresa'];
   $sifra = $_POST['sifra'];
   $bdate = $_POST['bdate'];

   $usernameRe = '/^([a-zA-Z0-9]{4,14})+$/'; //Tonmawwq{12 karaktera}
   $addressRe = '/^\w+(\s\w+)*$/'; //123 Nasticeva Mike
   $passRe = '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/'; //min 8 karaktera, i jedan broj i jedno slovo:

   $greske = 0;
   if (!preg_match($usernameRe, $ime)) {
      $greske++;
      $data = ["message" => "Name is not in the right format."];
   }
   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $greske++;
      $data = ["message" => "Email is not in the right format."];
   }
   if ($adresa !='' && !preg_match($addressRe, $adresa)) {
      $greske++;
      $data = ["message" => "Address is not in the right format."];
   }
   if (!preg_match($passRe, $sifra)) {
      $greske++;
      $data = ["message" => "Password is not in the right format."];
   }

   if (strlen($sifra) < 8) {
      $data = ["message" => "Password has less then 8 characters."];
   }

   if ($greske != 0) {
      //   $data = ["message" => "Error in server computing."];
      $code = 422;
      lognote('Error in register data format.', true);
   } else {
      $sifra = md5($sifra);
      //2 - role user
      //28 - id author_dafault image 
      $priprema = insert_User($ime, $email, $adresa, $sifra, $bdate, 2, 28);
      try {
         global $conn;
         $conn->beginTransaction();

         $priprema->execute();
         $idUser = $conn->lastInsertId();
         $code = 201;
         $data = ["message" => "You have succesfully registered on the site."];
         //log-after registracion

         $pripremaSve = getUser_id($idUser);
         $user = $pripremaSve->fetch();
         $_SESSION['korisnik'] = $user;

         $conn->commit();
         lognote('User has been registered.');
      } catch (PDOException $ex) {
         $code = 500;
         lognote($ex->getMessage(), true);
      }
   }
} else {
   $code = 404;
}
echo json_encode($data);
http_response_code($code);
