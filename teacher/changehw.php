<?php

require 'tstartsession.php';
//若已登录
if (isset($_SESSION['number']) && isset($_SESSION['tclassnumber'])) {  
    $number=$_SESSION['number']; 
    $classnumber=$_SESSION['tclassnumber'];

    //连接数据库
    require '../connectvars.php';
    $dbc=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    //ErrorHandler
    if (!$dbc) {
        die('Could not connect: '.mysqli_connect_error().'!');
    }

    $query1="SELECT * FROM sethw WHERE number='$number' AND classnumber='$classnumber'";
    $result1=mysqli_query($dbc, $query1);
    $i=0;
    while ($row=mysqli_fetch_array($result1)) {   
        $chapter=$row['chapter'];
        $ksdate=$row['ksdate'];
        $jsdate=$row['jsdate'];
        $settime=date("Y-m-d H:i:s", $row['time']);
        $i=$i+1;             
            echo("<form method='post' action='dohw.php'>");
            echo("章节".$chapter."&#8194;&#8194;起始日期:".$ksdate."截止日期:".$jsdate."作业布置时间:".$settime);
            echo("<input type='hidden' name='dohwchap' id='dohwychap' value='".$chapter."'>");
            echo("<a href='hwscoreview.php?chapter=".$chapter."'>查看学生成绩</a>");
            echo("<a href='changehw.php?".$a."'>更改</a>");
            echo("</form>");                   
    }    
    $query2="UPDATE sethw SET $changeline=value1 WHERE xxx=xxx";

}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>查看已布置作业</title>
    </head>
    <body>
        &number=$number&classnumber=
    </body>
</html>
