<?php
require 'config.inc.php';
$query = "SELECT * FROM post";

$result = mysqli_query($condb, $query);

if($result){
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        echo "iq_question" .$row['id_question']. "<br>";
        echo "dbtitile " .$row['dbtitle']. "<br>";
        echo "dbname" .$row['dbname']. "<br>";
        echo "dbmessage" .$row['dbmessage']. "<br>";
        echo "dbemail" .$row['dbemail']. "<br>";
        echo "dbdate_q" .$row['dbdate_q']. "<br>";
        echo "dbcount_q" .$row['dbcount_q']. "<br>";
        echo "<hr>";
    }
    mysqli_free_result($result);
}else{
    echo("data cannot add to database complete now");
}

mysqli_close($condb);
?>