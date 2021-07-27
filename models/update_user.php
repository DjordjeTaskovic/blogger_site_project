<?php
include "../config/connection.php";
include "functions.php";
$code = 404;
 if(isset($_POST["update_user"])){
    $name = $_POST["name"];
    $address = $_POST["address"];
    $date = $_POST["date"];
    $message = $_POST["message"];
    $ID = $_POST["ID"];

    global $idimage;

if(!$_FILES['imagefile']['size'] == 0){
    $fajl_naziv = $_FILES['imagefile']['name'];
    $fajl_tmpLokacija = $_FILES['imagefile']['tmp_name'];
    $fajl_tip = $_FILES['imagefile']['type'];
    
    $imggreske = [];
        $tipovi = ['image/jpg', 'image/jpeg', 'image/png'];
    if(!in_array($fajl_tip, $tipovi)){
                array_push($imggreske, "Pogresan tip fajla. - Profil slika");
            }
    if(count($imggreske) == 0){
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
            $novaSirina = 130;
            $novaVisina = ($novaSirina/$sirina) * $visina;
            $novaSlika = imagecreatetruecolor($novaSirina, $novaVisina);
            imagecopyresampled($novaSlika, $pocetnaslika, 0, 0, 0, 0, $novaSirina, $novaVisina, $sirina, $visina);
            $naziv = substr($fajl_naziv,-15);
            $putanjaNovaSlika = 'assets/img/users/updated_author_'.$naziv;
            switch($fajl_tip){
                case 'image/jpeg':
                    imagejpeg($novaSlika, '../'.$putanjaNovaSlika);
                    break;
                case 'image/png':
                    imagepng($novaSlika, '../'.$putanjaNovaSlika);
                    break;
            }
            $putanjaOriginalnaSlika = 'assets/img/originals/user_original_'.$naziv;
            
            if(move_uploaded_file($fajl_tmpLokacija, '../'.$putanjaOriginalnaSlika)){
                $newstr = explode("/",$putanjaNovaSlika);
                $img = $newstr[3];
                try {
                    //
                     $insimage = insert_Image($img);
                    if($insimage){
                        global $conn;
                        //.
                        $insimage->execute();
                        $idimage = $conn->lastInsertId();
                        echo "Your data (with image) has been updated.";
                        $code = 200;
                    }
                } catch(PDOException $ex){
                    echo $ex->getMessage();
                    $code = 500;
                }
            }
            // brisanje iz memorije
            imagedestroy($pocetnaslika);
            imagedestroy($novaSlika);
    } else{
        var_dump($imggreske);
    }
 }//image
 $greske = [];
 if (count($greske)== 0) {
     try{
    //   var_dump('ID image after',$idimage);
       $rez = Update_User($name,$address,$date,$message,$ID,$idimage);
             if($rez){
                 $rez->execute();
                 echo"Your data has been updated.";
                 $code = 200;
             }else{
                 echo"Error with server computing.";
                 $code = 401;
         }
    }
    catch(PDOException $ex){
     echo $ex->getMessage();
     $code = 500;
     }
 }else{
     var_dump($greske);
 }

           
 } else{
     $code=404;
 }
 http_response_code($code);
  header("Location:../index.php?page=blogger");
