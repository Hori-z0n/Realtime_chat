
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=g, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    
    <div class="container">
        <header>
            <div class="header">
                <h2>Home Page</h2>
            </div>
            <div>
                <a href="index.php">Home</a>
                <a href="about.php">About</a>
                <a href="login.php">Login</a>
                <a href="register.php">Sign&nbsp;up</a>
                <a href="help.php">Help</a>
                <a href= "webboard.php">Room</a>
            </div>
                
        </header>
        <nav>
            <!--
            <div>
                <ul style="line-height:200%">
                    <li><a href="home">Home</a></li>
                    <li><a href="about">About</a></li>
                    <li><a href="login">Login</a></li>
                    <li><a href="register">Sign&nbsp;up</a></li>
                    <li><a href="help">Help</a></li>
                    <li><a href= "room">Room</a></li>
                </ul>
            </div>
            -->
        </nav>
        <section>
            <h1>Welcome to Website</h1>
            <article>
                <div class="section">
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
                        print"<td>$dbtitle</td>";
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
                </div>
            </article>
            <div class = "top-bar">
                <h1></h1>
            </div>
            <div class = "main">
                <div class = "header">
                </div>
                
                <div class="comments">
                </div>
            </div>
        </section>
        <aside>
            <h1></h1>
        </aside>
        <div class="clearfix"></div>
        <footer>
            <h1>footer</h1>
            <p>&copy;2023 Zalaga.com All right</p>
        </footer>
    </div>
</body>
</html>