<?php
 
require 'tstartsession.php';
//若已登录
if (isset($_SESSION['admin_name'])) {  
    $admin_name=$_SESSION['admin_name']; 

    //连接数据库
    require '../connectvars.php';
    $dbc=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    //ErrorHandler
    if (!$dbc) {
        die('Could not connect: '.mysqli_connect_error().'!');
    }



} else {
    echo("请先登录。");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>查看或更改作业题库</title>
    </head>
    <body>
        <p><a href="indexadmin.php">返回主页</a><br/><p>                
    </body>
</html>
