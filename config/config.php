<?php

// Osnovna podesavanja
define("ABSOLUTE_PATH", $_SERVER["DOCUMENT_ROOT"]."/blissfull-blogger");

// Ostala podesavanja
define("LOG_FAJL", ABSOLUTE_PATH."/config/logs/log.txt");
define("ERROR_FAJL", ABSOLUTE_PATH."/config/logs/error.txt");
define("ACCESS_FAJL", ABSOLUTE_PATH."/config/logs/access.txt");

// Podesavanja za bazu
define("SERVER","localhost");
define("DATABASE","blogger-php");
define("USERNAME","root");
define("PASSWORD","");
