<?php
require "config.inc.php";
$question_id = $_GET['id'];
$namedb = $_POST['namedb'];
$messagedb = $_POST['messagedb'];
$emaildb = $_POST['emaildb'];
$date_adb = date("d/m/Y");
$query = "INSERT INTO answer (id_ans, question_id,  namedb, messagedb, emaildb, date_adb) VALUES ('', $question_id, '$namedb', '$messagedb', '$emaildb', '$date_adb')";
$dbquery = mysqli_query($condb, $query);
mysqli_close($condb);
print"<br><div align=center><b>Thank for comments yet.</b></div><br>";
//print"<div align=center><a href=\"ans.php?id_question={$_GET['']}\">back to webboard page </a></div>";
print"<div align=center><a href=\"webboard.php\">back to webboard page </a></div>";

?>