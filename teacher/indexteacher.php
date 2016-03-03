<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>航概网教师主页</title>
        <link rel="stylesheet" type="text/css" href="../blueschoolbadge.css">
    </head>
   <body>
  
<?php
    
require 'tstartsession.php';

// 形成导航菜单
if (isset($_SESSION['id'])) {
    echo('<p><a href="sethw.html">布置作业</a></p>');
    echo('<p><a href="selecthwview.php">查看学生作业成绩</a></p>');
   /* echo '<div id="sethw">
        <a href="sethw.html"><img src="../image/1.png" alt="布置作业"></a>
        </div>
        <div id="viewhw">
        <a href="selecthwview.php"><img src="../image/2.png" alt="查看学生作业成绩"></a> 
        </div>';*/
    echo('<p><a href="tlogout.php">注销 (' . $_SESSION['number'] . ')</a><p>');
} else {
    echo('<p><a href="loginteacher.php">登录</a><br/><p>');
    echo('<p><a href="signupteacher.php">注册</a><p>');
}
?>
   
   
   </body>
</html>
