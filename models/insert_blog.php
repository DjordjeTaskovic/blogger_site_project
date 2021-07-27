<?php
session_start();
include "../config/connection.php";
include "functions.php";
$error=[];
if(isset($_POST["blogchange_insert"])){

    $userid = $_POST["userid"];
    $subject = $_POST["subject"];
    $catid = $_POST["cat"];
    $message = $_POST["message"];
    if(!$_FILES['blogimage']['size'] == 0){
   
       $fajl_naziv = $_FILES['blogimage']['name'];
       $fajl_tmpLokacija = $_FILES['blogimage']['tmp_name'];
       $fajl_tip = $_FILES['blogimage']['type'];
   
       $greske = [];
       $tipovi = ['image/jpg', 'image/jpeg', 'image/png'];
           if(!in_array($fajl_tip, $tipovi)){
                       array_push($greske, "Pogresan tip fajla. - Profil slika");
                   }
           if(!count($greske) == 0){
               array_push($error,$greske);
           }
           else{
               list($sirina, $visina) = getimagesize($fajl_tmpLokacija);
               $pocetnaslika = null;
               switch($fajl_tip){
                   case 'image/jpeg':
                       $pocetnaslika = imagecreatefromjpeg($fajl_tmpLokacija);
                       break;
                   case 'image/png':
                       $pocetnaslika = imagecreatefrompng($fajl_tmpLokacija);
                       break;
                   }
               $novaSirina = 3000;
               $novaVisina = ($novaSirina/$sirina) * $visina;
               $novaSlika = imagecreatetruecolor($novaSirina, $novaVisina);
               imagecopyresampled($novaSlika, $pocetnaslika, 0, 0, 0, 0, $novaSirina, $novaVisina, $sirina, $visina);
               $naziv = substr($fajl_naziv,-15);
               $putanjaNovaSlika = 'assets/img/blogs/ins_image_'.$naziv;
               switch($fajl_tip){
                   case 'image/jpeg':
                       imagejpeg($novaSlika, '../'.$putanjaNovaSlika);
                       break;
                   case 'image/png':
                       imagepng($novaSlika, '../'.$putanjaNovaSlika);
                       break;
               }
               $putanjaOriginalnaSlika = 'assets/img/originals/blog_org_'.$naziv;
               
               if(move_uploaded_file($fajl_tmpLokacija, '../'.$putanjaOriginalnaSlika)){
                   $newstr = explode("/",$putanjaNovaSlika);
                   $img = $newstr[3];
              //  var_dump($img);
                    $insertimage = insert_Image($img);
                   try {
                    global $conn;
                    $conn->beginTransaction();
                    //=
                    $insertimage->execute();
                    $imageID = $conn->lastInsertId();
                    //=
                    $insertblog = insert_Blog($subject,$message,$imageID,$catid,$userid);
                    $insertblog->execute();
                    $conn->commit();
                       if ($insertimage) {
                           echo('Your data(with image) has been updated.');

                       }else{
                         array_push($error,'sql error');

                       }
                   } catch(PDOException $ex){
                       array_push($error,$ex->getMessage());
                   }
               }
               // brisanje iz memorije
               imagedestroy($pocetnaslika);
               imagedestroy($novaSlika);
                   }//else
   
   }else{
       array_push($error,'No image selected or image is size is not valid.');
   }
  
}
else{
    array_push($error,'not submited by click.');
}
if (count($error)!=0) {
  var_dump($error);
}else{
    header('Location:../index.php?page=blogger');
}