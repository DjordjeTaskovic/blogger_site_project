<?php
session_start();
include "../config/connection.php";
include "functions.php";
if (isset($_POST["blogchange_update"])) {

    $blogid = $_POST["blogid"];
    $userid = $_POST["userid"];
    $subject = $_POST["subject"];
    $catid = $_POST["cat"];
    $message = $_POST["message"];
    $image = $_FILES['blogimage']['size'];
    if (!$_FILES['blogimage']['size'] == 0) {

        $fajl_naziv = $_FILES['blogimage']['name'];
        $fajl_tmpLokacija = $_FILES['blogimage']['tmp_name'];
        $fajl_tip = $_FILES['blogimage']['type'];

        $greske = [];
        $tipovi = ['image/jpg', 'image/jpeg', 'image/png'];
        if (!in_array($fajl_tip, $tipovi)) {
            array_push($greske, "Pogresan tip fajla. - Profil slika");
        }

        
        if (!count($greske) == 0) {
            $_SESSION['error_messages'] = $greske;
            lognote('Error in user blog update.', true);
        }
         else {
            list($sirina, $visina) = getimagesize($fajl_tmpLokacija);
            $pocetnaslika = null;
            switch ($fajl_tip) {
                case 'image/jpeg':
                    $pocetnaslika = imagecreatefromjpeg($fajl_tmpLokacija);
                    break;
                case 'image/png':
                    $pocetnaslika = imagecreatefrompng($fajl_tmpLokacija);
                    break;
            }
            $novaSirina = 3000;
            $novaVisina = ($novaSirina / $sirina) * $visina;
            $novaSlika = imagecreatetruecolor($novaSirina, $novaVisina);
            imagecopyresampled($novaSlika, $pocetnaslika, 0, 0, 0, 0, $novaSirina, $novaVisina, $sirina, $visina);
            $naziv = substr($fajl_naziv, -15);
            $putanjaNovaSlika = 'assets/img/blogs/up_image_' . $naziv;
            switch ($fajl_tip) {
                case 'image/jpeg':
                    imagejpeg($novaSlika, '../' . $putanjaNovaSlika);
                    break;
                case 'image/png':
                    imagepng($novaSlika, '../' . $putanjaNovaSlika);
                    break;
            }
            $putanjaOriginalnaSlika = 'assets/img/originals/blog_org_' . $naziv;

            if (move_uploaded_file($fajl_tmpLokacija, '../' . $putanjaOriginalnaSlika)) {
                $newstr = explode("/", $putanjaNovaSlika);
                $img = $newstr[3];

                $imageID = getimageIDbyBlog($blogid);

                var_dump($img, $imageID->id_img);

                $upimage = Update_blog_Image($img, $imageID->id_img);
                try {

                    if ($upimage) {
                        $upimage->execute();
                        $_SESSION['success_message'] = 'Your Blog Image Has been updated succesfully!';
                    } 
                } catch (PDOException $ex) {
                    echo $ex->getMessage();
                }
            }
            // brisanje iz memorije
            imagedestroy($pocetnaslika);
            imagedestroy($novaSlika);
        } //else

    } //image

    $greske = [];
    if ($subject == '') {
        array_push($greske, "Subject can not be empty.");
    } else if ((strlen($subject) < 3)) {
        array_push($greske, "Subject length must be bigger the 3.");
    }
    if ($catid == 0) {
        array_push($greske, "Category must be selected.");
    } 

    if (strlen($message) < 3) {
        array_push($greske, "Min characters for message is 3.");
    }
    if (count($greske) == 0) {
        try {
            $kon = update_Blog($subject, $message, $catid, $blogid);
            if ($kon) {
                $kon->execute();
                $_SESSION['success_message'] = 'Your Blog data has been updated succesfully!';

            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    } else {
      $_SESSION['error_messages'] = $greske;

    }
}

header("Location:../index.php?page=blog_form");
exit();
