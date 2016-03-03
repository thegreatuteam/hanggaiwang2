<?php
require 'sstartsession.php';
//若已登录
if (isset($_SESSION['user_number']) && isset($_SESSION['sclassnumber'])) {  
    $snumber=$_SESSION['user_number']; 
    $classnumber=$_SESSION['sclassnumber']; 
       
    //连接数据库
    require '../connectvars.php';
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    //ErrorHandler
    if (!$dbc) {
        die('Could not connect: '.mysqli_connect_error().'!');
    }
  
    echo("<h2>航概作业</h2>");
   
    $dbt_name="user".$snumber;
    $query2="SELECT indexx,score FROM $dbt_name";
    $data2=mysqli_query($dbc, $query2);
    $j=0;
    while ($row=mysqli_fetch_array($data2)) {  
        if (!empty($row['indexx'])) {
            $idarr[$j]=$row['indexx'];
            $score[$idarr[$j]]=$row['score'];
        }
        $j=$j+1;
    }

    //循环输出每条已布置作业
    $query1="SELECT * FROM sethw WHERE classnumber='$classnumber ORDER BY id DESC'";
    $result1=mysqli_query($dbc, $query1);
    $i=0;
    while ($row=mysqli_fetch_array($result1)) {   
        $chapter=$row['chapter'];
        $ksdate=$row['ksdate'];
        $jsdate=$row['jsdate'];
        $settime=$row['time'];
        $id=$row['indexx'];
        $danxmin=$row['$danxmin'];
        $danxmax=$row['$danxmax'];
        $duoxmin=$row['$duoxmin'];
        $duoxmax=$row['$duoxmax'];
        
        $i=$i+1;

        if (in_array($id, $idarr)) {          
            echo "<form method='post' action='dohw.php'>";
            echo "章节".$chapter."起始日期:".$ksdate."截止日期:".$jsdate."作业布置时间:".$settime;
            echo "<input type='submit' value='已提交' disabled='disabled'/>";
            echo "  你的分数:".$score[$id];
            echo "</form>";  
        } else {
            if (strtotime($ksdate)<=time() && strtotime($jsdate)>=time()) {
                echo "<form method='post' action='dohw.php'>";
                echo "章节".$chapter."起始日期:".$ksdate."截止日期:".$jsdate."作业布置时间:".$settime;
                echo "<input type='hidden' name='dohwchap' id='dohwychap' value='".$chapter."'>";  
                echo "<input type='hidden' name='hwid' id='hwid' value='".$id."'>"; 
                echo "<input type='hidden' name='danxmin' id='danxmin' value='".$danxmin."'>"; 
                echo "<input type='hidden' name='danxmax' id='danxmax' value='".$danxmax."'>";
                echo "<input type='hidden' name='duoxmin' id='duoxmin' value='".$duoxmin."'>";
                echo "<input type='hidden' name='duoxmax' id='duoxmax' value='".$duoxmax."'>";                        
                echo "<input type='submit' value='DO IT NOW' />";
                echo "</form>";            
            } elseif (strtotime($ksdate)>time()) {
                echo "<form method='post' action='dohw.php'>";
                echo "章节".$chapter."起始日期:".$ksdate."截止日期:".$jsdate."作业布置时间:".$settime;
                echo "<input type='submit' value='待开始' disabled='disabled'/>";
                echo "</form>"; 
            } elseif (strtotime($jsdate)<time()) {
                echo "<form method='post' action='dohw.php'>";
                echo "章节".$chapter."起始日期:".$ksdate."截止日期:".$jsdate."作业布置时间:".$settime;
                echo "<input type='submit' value='已截止' disabled='disabled'/>";
                echo "</form>";             
            }         
        }
        echo("<br/>");
    }  
} else {
    echo("请先登录。");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>选择作业</title>
    </head>
    <body>
        <p><a href="indexstudent.php">返回主页</a><br/></p>
  
    </body>
</html>
