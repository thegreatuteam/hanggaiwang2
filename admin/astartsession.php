<?php
   
session_start();

// 若 会话变量没有被设置,则 尝试用cookie来设置会话变量
if (!isset($_SESSION['admin_id'])) {
    if (isset($_COOKIE['admin_id']) && isset($_COOKIE['admin_name'])) {
        $_SESSION['admin_id'] = $_COOKIE['admin_id'];
        $_SESSION['admin_name'] = $_COOKIE['admin_name'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        
    </body>
</html>
