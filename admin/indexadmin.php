<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>航概网管理员主页</title>
        <link rel="stylesheet" type="text/css" href="../blueschoolbadge.css">
    </head>
   <body>
  
<?php
    
require 'astartsession.php';

// 形成导航菜单
if (isset($_SESSION['admin_id'])) {
    echo('<a href="usersadmin.php">查看或更改用户</a>');
        //<a href="hwadmin.php">查看或更改作业题库</a>
        //<a href="testadmin.php">查看或更改测试题库</a>'
    echo('<p><a href="alogout.php">注销 (' . $_SESSION['admin_name'] . ')</a><p>');
} else {
    echo('<p><a href="loginadmin.php">登录</a><br/><p>');
}
?>
   
   </body>
</html>
