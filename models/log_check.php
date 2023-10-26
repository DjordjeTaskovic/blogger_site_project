<?php
 session_start();
 include "../config/connection.php";
 include "functions.php";
 header("Content-type: application/json");
 $data = '';
 $code = '';
 if(isset($_POST["button"])){
        $email = $_POST["email"];
        $sifra = $_POST["password"];
             $greske = 0;
              if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $greske++;
                $data = ["message"=>"Email is not in the right format."];
                }
                if(strlen($sifra) < 8){
                    $greske++;
                    $data = ["message" => "Password is not in right format."];
                }
                if($greske != 0)
                {
                $code = 422;
                 lognote('Error in login data format.', true);
                }
                 else{
                try {
                        $sifra = md5($sifra);
                        $pripremaSve = getUser($email, $sifra);
                        $pripremamail = getUser_email($email);
                        $pripremaSifra = getUser_pass($sifra);

                            // ako je broj upisanih user-a razlicit od 1
                            if($pripremamail->rowCount()!= 1){
                            $data = ["message"=>"Your email is not registered."];
                            lognote('Wrong user email due login submition.',true);
                            $code = 401;
                            }
                            if($pripremaSifra->rowCount() != 1)
                            {
                            $data = ["message"=>"Wrong Password."];
                            lognote('Wrong user password due login submition.',true);
                            $code = 401;
                            }
                            else
                            {  if($pripremaSve->rowCount()==1)
                                    {
                                    $rezultat = $pripremaSve->fetch();
                                    $data = ["message"=>"You are logged in."];
                                    $code = 200;
                                    $_SESSION['korisnik'] = $rezultat;
                                    lognote('User logged in.');

                                    }else{
                                    $code = 401;
                                    }
                                }
                }//try
                 catch (PDOException $th) {
                    $code = 500;
                    lognote($th->getMessage(), true);
                }
        }
 }//ifisset
 else{
 $code = 404;
 }
 echo json_encode($data);
 http_response_code($code);
?>
