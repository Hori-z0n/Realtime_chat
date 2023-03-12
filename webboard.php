<?php include('config.inc.php');?>
<?php
session_start();
if(!isset($_SESSION['username'])){
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webboard</title>

</head>
<body>
    <?php if(isset($_SESSION['success'])):?>
        <div class="success">
            <h3>
                <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                ?>
            </h3>
        </div>
    <?php endif ?>
    <div class="content">
        <?php if(isset($_SESSION['username'])):?>
            <p>Welcome <strong><?php echo $_SESSION['username'];?></strong></p>
            <p><a href="webboard.php?logout='1'" style="color: red;">Logout</a></p>
        <?php endif ?>
    </div>
    <?php
    require "config.inc.php";
    print"<table width=532 border=1 align=center cellpadding=1 cellspacing=1>";
    print"<tr>";
    print"<td width = 703>";
    print"<table width=532 align=center>";
    print"<tr>";
    print"<td align='center'>id</td>";
    print"<td align='center'>detail</td>";
    print"<td align='center'>name</td>";
    print"<td align='center'>date</td>";
    print"</tr>";
    $sql = "SELECT * FROM post ORDER BY id_question DESC";
    $dbquery = mysqli_query($condb, $sql);
    $num_row = mysqli_num_rows($dbquery);
    $i = 0;
    while($i < $num_row){
        $result = mysqli_fetch_array($dbquery);
        $id_question = $result['id_question'];
        $dbtitle = $result['dbtitle'];
        $dbname = $result['dbname'];
        $dbmessage = $result['dbmessage'];
        $dbemail = $result['dbemail'];
        $dbdate_q = $result['dbdate_q'];
        $dbcount_q = $result['dbcount_q'];
    
        print"<tr>";
        print"<td>$id_question</td>";
        //print"<td><a href= \'ans.php?id_question=$id_question\' target=\'$id_question\'>$dbtitle</a></td>";
        print"<td><a href='ans.php?id_question=$id_question' target='{$_GET['id_question']}'>$dbtitle</a></td>";
        print"<td>$dbname</td>";
        print"<td>$dbdate_q</td>";
        print"</tr>";
        $i++;
    }
    print"</table>";
    mysqli_close($condb);
    print"</td>";
    print"</tr>";
    print"</table>";
    ?>
    <form name="form1" method="post" action="postques.php">
        <table align="center" border="1" align="center" cellpadding="1" cellspacing="1">
            <tr >
                <td width=703><table align="center" border="1" align="center" cellpadding="1" cellspacing="1">
                    <tr>
                        <td colspan="2"><div align="center" class="style1"><u> new post</u></div></td>
                    </tr>
                    <tr>
                        <td width="97">post title</td>
                        <td width="417"><input name="dbtitle" type="text" id="dbtitle" size="65"></td>
                    </tr>
                    <tr>
                        <td>details</td>
                        <td><textarea name="dbmessage" id="dbmessage" cols="65" rows="7" wrap="virtual"></textarea></td>
                    </tr>
                    <tr>
                        <td>name</td>
                        <td><input name="dbname" type="text" id="dbname" size="30"></td>
                    </tr>
                    <tr>
                        <td>email</td>
                        <td><input name="dbemail" type="email" id="dbemail" size="30"></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input name="submit" type="submit" value="quiz"><input type="reset" name="submit2" value="cancel"></td>
                    </tr>
                </table>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>