<?php
require "config.inc.php";
$dbtitle = $_POST['dbtitle'];
$dbname = $_POST['dbname'];
$dbmessage = $_POST['dbmessage'];
$dbemail = $_POST['dbemail'];
$dbdate_q = date("d/m/Y");
$query = "INSERT INTO post(id_question, dbtitle, dbname, dbmessage, dbemail, dbdate_q, dbcount_q)VALUE('', '$dbtitle', '$dbname', '$dbmessage', '$dbemail', '$dbdate_q', '$dbcount_q')";

$dbquery = mysqli_query($condb, $query);
mysqli_close($condb);
print"<br><div align=center><b>post $dbname add complete</b></div><br>";
print"<div align=center><a href=\"webboard.php\">back to webboard page </a></div>";
?>
