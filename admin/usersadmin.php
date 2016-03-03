<?php
 
require 'astartsession.php';
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

    //删除对应数据行和对应数据库表（一个用户）
    if (!empty($_GET['delete_user_id'])) {
        $delete_id=$_GET['delete_user_id'];
        $query2="DELETE FROM users WHERE user_id='$delete_id'";
        mysqli_query($dbc, $query2); 
        $dbt_name="user".$_GET['user_number'];
        echo($dbt_name);
        $query3="DROP TABLE IF EXISTS $dbt_name";
        mysqli_query($dbc, $query3); 
    }

    //循环输出各学生用户信息
    $result1=mysqli_query($dbc, "SELECT * FROM users");
    while ($row=mysqli_fetch_array($result1)) {
        $user_id=$row['user_id'];          
        $user_number=$row['user_number'];
        $join_date=$row['join_date'];
        $name=$row['name'];
        $classnumber=$row['classnumber'];
echo "<form method='post' action='history.php'>";
        echo ("学号".$user_number."姓名".$name."班号".$classnumber."注册时间".$join_date);
            

    echo "<input type='hidden' name='historyid' id='historyid' value='".$i."'>";
    echo "<input type='submit'   value='删除' />";
    
       // echo("<a href=\"".$_SERVER['PHP_SELF']."?delete_user_id=".$user_id."&user_number=".$user_number."\">删除</a>");
        echo("<br/>");
    }
echo "</form>"; 
} else {
    echo("请先登录。");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>查看或更改用户</title>
        <script type="text/javascript">
            function show_confirm()
            {
            var r=confirm("Press a button!");
            if (r==true)
              {
              alert("You pressed OK!");
              }
            else
              {
              alert("You pressed Cancel!");
              }
            }
        </script>
    </head>
    <body>
        <p><a href="indexadmin.php">返回主页</a><br/><p>    
           <input type="submit" onclick="return confirm('确认删除?')" value="删除">  
    </body>
</html>
