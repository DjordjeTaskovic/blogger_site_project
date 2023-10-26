<?php
session_start();
include "../config/connection.php";
include "functions.php";
if (isset($_POST["blogchange_insert"])) {

    $userid = $_POST["userid"];
    $subject = $_POST["subject"];
    $catid = $_POST["cat"];
    $desc = $_POST["message"];

    if (!$_FILES['blogimage']['size'] == 0) {
        $fajl_naziv = $_FILES['blogimage']['name'];
        $fajl_tmpLokacija = $_FILES['blogimage']['tmp_name'];
        $fajl_tip = $_FILES['blogimage']['type'];

        $greske = [];
        $tipovi = ['image/jpg', 'image/jpeg', 'image/png'];
        if (!in_array($fajl_tip, $tipovi)) {
            array_push($greske, "Pogresan tip fajla. - Profil slika");
        }

        if ($subject == '') {
            array_push($greske, "Subject can not be empty.");
        } else if ((strlen($subject) < 3)) {
            array_push($greske, "Subject length must be bigger the 3.");
        }
        if ($catid == 0) {
            array_push($greske, "Category must be selected.");
        } 
      

        if (!count($greske) == 0) {
            $_SESSION['error_messages'] = $greske;
            lognote('Error in user blog submition.', true);
        } else {
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
            $putanjaNovaSlika = 'assets/img/blogs/ins_image_' . $naziv;
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
                //  var_dump($img);
                $insertimage = insert_Image($img);
                try {
                    global $conn;
                    $conn->beginTransaction();
                    //=
                    $insertimage->execute();
                    $imageID = $conn->lastInsertId();
                    //=
                    $insertblog = insert_Blog($subject, $desc, $imageID, $catid, $userid);
                    $insertblog->execute();
                    $conn->commit();
                    if ($insertimage) {
                        $_SESSION['success_message'] = 'Your Blog Has been posted succesfully!';
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
    else {
        $_SESSION['error_messages'] = ['The image input is necesary in this form submition.'];
    }
}
header("Location:../index.php?page=blog_form");
exit();
