<?php

require 'sstartsession.php';
//若已登录
if (isset($_SESSION['user_number'])) {
    $snumber=$_SESSION['user_number'];

    //连接数据库
    require '../connectvars.php';
    $dbc=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    //ErrorHandler
    if (!$dbc) {
        die('Could not connect: '.mysqli_connect_error().'!');
    }

    echo("<h2>此次错题：</h2>");
    //
    $number="";    //保存错误题号 
    //接收表单数据，判断正误并打分
    $score=100;    //因为每题分数取整，故采用从100往下减分
    $allnumber=$_POST["allnumber"];
    $meitifenshu=int(100/$allnumber);    //每题分数（100分除以题目总数）

    for ($i=0;$i<$allnumber;$i++) {
        $xuhao=$i+1;      
        $a_id=$_POST["a$xuhao"];
        $query = "SELECT * FROM tests WHERE id='$a_id'";
        $result = mysqli_query($dbc, $query);
        $a_test=mysqli_fetch_array($result);

        //若 为单选题，正确+1分
        if ($a_test['score']==1) {
            $user_answer=$_POST["$xuhao"];    
            if ($a_test['answer'] == $user_answer) {                            
            } else { 
                $score=$score-$meitifenshu;                  
                $number=$number."!".$a_id; 
                echo $xuhao.'. '.$a_test['question'].'<br/></p>';   //！attention 题目颜色待改
                echo '<p>'.$a_test['a'].'   '.$a_test['b'].'&nbsp&nbsp&nbsp&nbsp&nbsp'.$a_test['c'].'    '.$a_test['d'].'</p>';   //！attention 选项间距待调整
                echo '<p>你的答案是：'.$user_answer;
                echo '正确答案是：'.$a_test['answer'].'<br/></p>';        
            } 
        } else {    //若 为多选题，正确+2分（全部正确才得分）
            $useranswer=$_POST["$xuhao"]; 
            $user_answer=implode($useranswer);
            if ($a_test['answer'] == $user_answer) {                             
            } else {  
                $score=$score-$meitifenshu;              
                $number=$number."!".$a_id;
                echo $xuhao.'. '.$a_test['question'].'<br/></p>';   //！attention 题目颜色待改
                echo '<p>'.$a_test['a'].'   '.$a_test['b'].'&nbsp&nbsp&nbsp&nbsp&nbsp'.$a_test['c'].'    '.$a_test['d'].'</p>';   //！attention 选项间距待调整
                echo '<p>你的答案是：'.$user_answer;
                echo '正确答案是：'.$a_test['answer'].'<br/></p>'; 
            }       
        }              
    }  
    echo '<p>你的总得分是：'.$score.'分。</p>';

    //获取 id!
    $id=$_POST['hwid'];


    //将用户该次成绩记录插入该用户的数据库表
    $chapter=$_POST['hwchapter'];
    $content=$chapter.$danxmin.$danxmax.$duoxmin.$duoxmax;//###############################################################
    $dbt_name="user".$snumber;
    $query3="INSERT INTO $dbt_name (time, score, number, type, indexx, content) VALUES (UNIX_TIMESTAMP(), '$score', '$number', '作业', $id, $content)";
    mysqli_query($dbc, $query3);

    //创建用户s_scoreinfo数组
    $query6="SELECT name FROM users WHERE user_number='$snumber'";
    $data6=mysqli_query($dbc, $query6);
    if (mysqli_num_rows($data6) == 1) {               
        $row=mysqli_fetch_array($data6);
        $name=$row['name'];
    }
    $s_scoreinfo[0]=array("name" => $name, "snumber" => $snumber, "score" => $score);

    //获取表中score
    $query4="SELECT score FROM hwscore WHERE id='$id'";
    $result4=mysqli_query($dbc, $query4);
    if (mysqli_num_rows($result4)==1) { 
        $row=mysqli_fetch_array($result4);  
        $scoreinfojs=$row['score'];
    }
   // echo($scoreinfojs."原数据<br/>");////////
    //json->array
    if (!empty($scoreinfojs)) {       
        $scoreinfo=json_decode($scoreinfojs, TURE);
    } else {
        $scoreinfo=array(array());
    }
   // print_r($scoreinfo);/////////////
   // echo("变成数组了<br/>");////////////
    //合并数据,array->json
    $scoreinfo=array_merge($scoreinfo, $s_scoreinfo); 
    //print_r($scoreinfo);//////////////
    //echo("合并之后的数组<br/>");////////////
    $scoreinfojs=json_encode($scoreinfo, JSON_UNESCAPED_UNICODE);
   // echo($scoreinfojs."最后变成json的数据");//////////
    //UPDATE score
    $query5="UPDATE hwscore SET score='$scoreinfojs' WHERE id='$id'";
    mysqli_query($dbc, $query5);

    mysqli_close($dbc);   //关闭数据库

} else {
    echo("请先登录。");
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>作业结果</title>
    </head>
    <body>
        <p><a href="selecthw.php">返回选择作业页面</a><br/></p>
        <p><a href="indexstudent.php">返回主页</a><br/></p>
  
    </body>
</html>
