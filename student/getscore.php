
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>个人历史成绩查询</title>
        <link rel="stylesheet" type="text/css" href="../wenziyemian.css">
        <style type="text/css">
            #main {
                text-align: center;    
            }
            h2 {
                padding-top: 20px;
            }
        </style>
    </head>
    <body>
        <div id="wrapper">
            <div id="header">
                <div id="nav">
                    <ul>
                        <li><a href="indexstudent.php">主页</a></li>
                        <li><a href="select_chap.html">自我测试</a></li>
                        <li><a href="selecthw.php">作业</a></li>
                        <li><a href="getscore.php">查看历史错题</a></li>                       
                        <li><a href="slogout.php">注销</a></li>
                    </ul>
                </div>
            </div>
            <div id="main">
<?php
    
//连接数据库
require '../connectvars.php';
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
//ErrorHandler
if (!$dbc) {
    die('Could not connect: '.mysqli_connect_error().'!');
}

echo '<h2>' .$_COOKIE['user_number'] . '的历史错题记录</h2>';
?>
                <table>
                    <tr>
                      <th>日期</th>
                      <th>得分</th>
                      <th>内容</th>  
                      <th>类型</th>
                      <th>错题</th>
                    </tr>
<?php
//查询该用户数据库表中记录总条数
$user_number = $_COOKIE['user_number'];
$dbt_name="user".$user_number;

//循环输出每条记录 测试时间，得分，历史记录查询按钮
$i=0;
$result=mysqli_query($dbc, "SELECT * FROM $dbt_name");
while ($row=mysqli_fetch_array($result)) {   
    $testtime=date("Y-m-d H:i:s", $row['time']);
    $score=$row['score'];
    $type=$row['type'];
    $i=$i+1;
    echo("<tr><td>".$testtime."</td><td>".$score."</td><td>".$content."</td><td>".$type."</td>");
    echo("<td><a href=\"history.php?historyid=".$i."\">点击查看</a></td></tr>");
}
echo("</table>");
mysqli_close($dbc);
?>
            </div>
            <div id="footer">  
               &copyCopyright (c) ...              
            </div>
        </div>

    </body>
</html>
