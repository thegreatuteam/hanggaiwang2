<?php
   
session_start();

// 若 会话变量没有被设置,则 尝试用cookie来设置会话变量
if (!isset($_SESSION['id'])) {
    if (isset($_COOKIE['id']) && isset($_COOKIE['number']) && ($_COOKIE['tclassnumber'])) {
        $_SESSION['id'] = $_COOKIE['id'];
        $_SESSION['number'] = $_COOKIE['number'];
        $_SESSION['tclassnumber'] = $_COOKIE['tclassnumber'];
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
