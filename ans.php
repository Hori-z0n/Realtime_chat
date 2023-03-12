<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
    <div align="center">
        <p><br>
        <?php
        require('config.inc.php');
        $id_question = 1;
        //$sql = "SELECT * FROM post WHERE id_question=$id_question";
        $sql = "SELECT * FROM post WHERE id_question={$_GET['id_question']}";
        $dbquery = mysqli_query($condb, $sql);
        $result = mysqli_fetch_array($dbquery);
    
        $id_question = $result['id_question'];
        $dbtitle = $result['dbtitle'];
        $dbname = $result['dbname'];
        $dbmessage = $result['dbmessage'];
        $dbemail = $result['dbemail'];
        $dbdate_q = $result['dbdate_q'];
        print"<table width=532 border=1 align=center cellpadding=1 cellspacing=1>";
        print"<tr>";
        print"<td width=703>";
        print"<table width=532 align=center>";
        print"<tr>";
        print"<td width=97><b>Post</b></td>";
        print"<td width=417><b>".$dbtitle."</b></td>";
        print"</tr>";
        print"<tr>";
        print"<td width=97><b>Detail</b></td>";
        print"<td width=417><b>".$dbmessage."</b></td>";
        print"</tr>";
        print"<tr>";
        print"<td width=97><b>Name</b></td>";
        print"<td width=417><b>".$dbname."</b></td>";
        print"</tr>";
        print"</table>";
        print"</td>";
        print"</tr>";
        print"</table>";

        //$sql = "SELECT * FROM answer WHERE question_id=$question_id ORDER BY id_ans";
        $sql = "SELECT * FROM answer WHERE question_id={$_GET['id_question']} ORDER BY id_ans";
        $dbquery = mysqli_query($condb, $sql);
        $num_row = mysqli_num_rows($dbquery);
        if($num_row == NULL){
            print "There are no comments yet";
        }
        $i = 0;
        $n = 1;
        while($i < $num_row){
            $result = mysqli_fetch_array($dbquery);
            $id_ans = $result['id_ans'];
            $question_id = $result['question_id'];
            $namedb = $result['namedb'];
            $messagedb = $result['messagedb'];
            $emaildb = $result['emaildb'];
            $date_adb = $result['date_adb'];
            

            print"<br>";
            print"<table width=532 align='center' border=1 cellpadding=1 cellspacing=1>";
            print"<tr>";
            print"<td width=703>";
            print"<table width=532 align=center>";
            print"<tr><div align=center><b>Comment $n</b></div> </tr>";
            print"<tr>";
            print"<td width=97>Detail</td>";
            print"<td width=417>$messagedb</td>";
            print"</tr>";
            print"<tr>";
            print"<td width=97>From</td>";
            print"<td width=417>$namedb</td>";
            print"</tr>";
            print"</table>";
            print"</td>";
            print"</tr>";
            print"</table>";
            ++$n;
            $i++;
        }
        mysqli_close($condb);
    ?>
    </p>
    </div>
    <form name="form1" method="post" action="reply.php?id=<?php echo $id_question?>">
        <table align="center" border="1" cellpadding="1" cellspacing="1">
            <tr >
                <td width=703><table align="center" border="1" align="center" cellpadding="1" cellspacing="1">
                    <tr>
                        <td colspan="2"><div align="center" class="style1"><u>New comment</u></div></td>
                    </tr>
                    <tr>
                        <td>name</td>
                        <td><input name="namedb" type="text" id="namedb" size="30"></td>
                    </tr>
                    <tr>
                        <td>details</td>
                        <td><textarea name="messagedb" id="messagedb" cols="65" rows="7" wrap="virtual"></textarea></td>
                    </tr>
                    <tr>
                        <td>email</td>
                        <td><input name="emaildb" type="email" id="emaildb" size="30"></td>
                    </tr>
                    
                    <tr>
                        <td>&nbsp;</td>
                        <td><input name="submit" type="submit" value="quiz">
                        <input type="reset" name="submit2" value="cancel"></td>
                        <input type="hidden" name="id_question" value="<?php echo $id_question?>">
                    </tr>
                </table>
                </td>
            </tr>
        </table>
    </form>
    <div align=center>[<a href="webboard.php">Back to webboard]</a></div>
    
</body>
</html>
