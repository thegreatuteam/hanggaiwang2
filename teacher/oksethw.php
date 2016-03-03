<?php
 
require 'tstartsession.php';
//若已登录
if (isset($_SESSION['id']) && isset($_SESSION['number']) && isset($_SESSION['tclassnumber'])) {  
    $number=$_SESSION['number']; 
    $classnumber=$_SESSION['tclassnumber'];

    //连接数据库
    require '../connectvars.php';
    $dbc=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    //ErrorHandler
    if (!$dbc) {
        die('Could not connect: '.mysqli_connect_error().'!');
    }

    //获取表单数据
    $chapter=$_POST['chapter'];
    $ksdate=$_POST['ksdate'];
    $jsdate=$_POST['jsdate'];
    $danxmin=$_POST['danxmin'];
    $danxmax=$_POST['danxmax'];
    $duoxmin=$_POST['duoxmin'];
    $duoxmax=$_POST['duoxmax'];

    
    //向sethw表、hwscore表中插入所留作业数据    
    if (!empty($classnumber) && !empty($chapter) && !empty($ksdate) && !empty($jsdate) && !empty($number)) {   
        $query2="INSERT INTO sethw (classnumber, chapter, ksdate, jsdate, teachernumber, time, danxmin, danxmax, duoxmin, duoxmax) VALUES ('$classnumber', '$chapter', '$ksdate', '$jsdate', '$number', NOW(), $danxmin, $danxmax, $duoxmin, $duoxmax)";
        mysqli_query($dbc, $query2);

        $query6="SELECT LAST_INSERT_ID()";
        $date6=mysqli_query($dbc, $query6);
        $id1=mysqli_fetch_row($date6);
        $sethwid=$id1[0];

        $query3="INSERT INTO hwscore (teachernumber, classnumber) VALUES ('$number', '$classnumber')";
        mysqli_query($dbc, $query3);

        $query4="SELECT LAST_INSERT_ID()";
        $date4=mysqli_query($dbc, $query4);
        $id=mysqli_fetch_row($date4);
        $index=$id[0];

        $query5="UPDATE sethw SET indexx='$index' WHERE id='$sethwid'";
        mysqli_query($dbc, $query5);
        
        echo("作业已成功布置。（章节：".$chapter." 起始日期：".$ksdate." 截止日期：".$jsdate."单选从第".$danxmin."题至第".$danxmax."题，多选从第".$duoxmin."题至第".$duoxmax."题）");                
    } else {
        echo("布置作业失败。可能原因：您未将所需信息（章节，起始日期，截止日期，单选、多选信息）填全。");        
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>布置作业成功</title>
    </head>
    <body>
        <a href="sethw.html">返回继续布置作业</a>   
        <a href="indexteacher.php">返回主页</a> 
    </body>
</html>
