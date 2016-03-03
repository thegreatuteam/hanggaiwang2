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

    $id=$_GET["id"];

    $query1="SELECT score FROM hwscore WHERE id='$id'";
    $result1=mysqli_query($dbc, $query1);
                                                         
    if (mysqli_num_rows($result1)==1) {    
        $row=mysqli_fetch_array($result1);
        $scorejson=$row['score'];
        $score=json_decode($scorejson, TURE);
        //依据学号从小到大排序[感谢段神的帮助，虽然你在清华的说...]
        for ($i=0; $i<count($score)-1; $i++) {
            for ($j=$i+1; $j<count($score); $j++) {
                if ($score[$i]["snumber"]>$score[$j]["snumber"]) {
                    $t=$score[$i]; 
                    $score[$i]=$score[$j]; 
                    $score[$j]=$t;
                }
            }
        }          
        //然后循环输出已排序的score数组 foreach
        if (!empty($score)) {
            foreach ($score as $val) {
                if (is_array($val)) {
                    foreach ($val as $value) { 
                        echo($value."  ");
                    }
                    echo('<br/>');
                } else {
                    echo($val.'<br/>');
                } 
            } 
        } else {
            echo("未有学生提交作业。");
        }
    }
} else {
    echo("请先登录。");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>学生成绩</title>
    </head>
    <body>
        <a href="selecthwview.php">返回选择查询成绩页面</a><br/>
        <a href="indexteacher.php">返回主页</a>  
    </body>
</html>
