<?php
// session_start();
require_once "config.php";
AccesstoPages();
try {
    $conn = new PDO("mysql:host=".SERVER.";dbname=".DATABASE.";charset=utf8", USERNAME, PASSWORD);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $ex){
    echo $ex->getMessage();
}
function AccesstoPages(){
    $open = fopen(ACCESS_FAJL, "a");
    if($open){
	$date = date('Y-m-d H:i:s');
        fwrite($open, "{$_SERVER['PHP_SELF']}\t{$date}\t{$_SERVER['REMOTE_ADDR']}\t\n");
        fclose($open);
    }
}

function lognote($message, $error = false){
	if($error){
		$file = fopen(ERROR_FAJL, "a+");
	} else {
		$file = fopen(LOG_FAJL, "a+");
	}
	$user='';
	$role='';
	if(isset($_SESSION['korisnik'])){
		$user = $_SESSION['korisnik']->username;
		$role = $_SESSION['korisnik']->rolename;
	}
    $route = $_SERVER['PHP_SELF'];
	$ip = $_SERVER['REMOTE_ADDR'];
	$date = date('Y-m-d H:i:s');
	
	$w = "$user \t $role \t $route \t $ip \t $date \t $message \n";
	fwrite($file, $w);
	fclose($file);
}