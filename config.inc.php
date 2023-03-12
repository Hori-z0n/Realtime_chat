<?php
$host = "localhost";
$user = "root";
$password = "at89mega328";
//$password = "";
$db = "webboard";
$condb = mysqli_connect($host ,$user ,$password ,$db);
("connect error : ". mysqli_connect_error());
//echo 'connect to database complete';
mysqli_set_charset($condb, 'utf8');
?>