<?php

$uzytkownik = 'admin';
$nazwahostu = 'localhost';
$nazwabazy = 'projekt_gielda';
$haslo = '1234';

ini_set('session.gc_maxlifetime', 3600); //sesja
ini_set('session.cookie_lifetime', 3600); //cookie
session_start();

mysql_connect($nazwahostu, $uzytkownik, $haslo);

mysql_select_db($nazwabazy);


?>