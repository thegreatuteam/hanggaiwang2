<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>航概作业页面</title>
        <style type="text/css">     
         body {
            color: #15075e;
            background-image: url("image/1.png");
            background-attachment: fixed;
            margin-top: 13%;
            margin-left: 20%;
	        margin-right: 20%;
	        padding: 50px 50px 50px 50px;           
	        font-family: 楷体;
            font-size: 30px;
         }	
       </style>
    </head>
    <body>
     
<?php
 
require 'sstartsession.php';
//若已登录
if (isset($_SESSION['user_number'])) {
    $snumber=$_SESSION['user_number'];
        
    $id=$_POST['hwid'];
    $chapter=$_POST['dohwchap'];
    $danxmin=$_POST['danxmin'];
    $danxmax=$_POST['danxmax'];
    $duoxmin=$_POST['duoxmin'];
    $duoxmax=$_POST['duoxmax'];
    $zongshu=$danxmax-$danxmin+$duoxmax-$duoxmin+2;

    echo("<h2>".$chapter."</h2>");

    //根据选择的作业确定题号范围 #############目前以一章4道题实验...################
    switch ($_POST['dohwchap'])
    {
    case 'chapter1':
        $idmin=1;
        $idmax=4;                
        break;
    case 'chapter2':
        $idmin=5;
        $idmax=8;
        break;
    case 'chapter3':
        $idmin=9;
        $idmax=12;
        break;
    case 'chapter4':
        $idmin=13;
        $idmax=16;
        break;
    case 'chapter5':
        $idmin=17;
        $idmax=20;
        break;
    case 'the_whole_book':
        $idmin=1;
        $idmax=20;
        break;
    }

    //连接数据库
    require '../connectvars.php';
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    //ErrorHandler
    if (!$dbc) {
        die('Could not connect: '.mysqli_connect_error().'!');
    }

    //$query0="SELECT * FROM tests";
    //$result0=mysqli_query($dbc, $query0); 
    //while ($mysql_row=mysqli_fetch_array($result0)) {
        //$scores[(int)$mysql_row['number']]=(int)$mysql_row['score'];    //获取题号与对应分数
    //}  

    //构建“卷子”表单
    $each_num= '';
    echo('<form action="cookhw.php" method="post">');
    $xuhao=1;
    //单选
    for ($k=$danxmin;$k<=$danxmax;$k++) {             
        $query1 = "SELECT * FROM score WHERE number='$k' AND (id>=$idmin AND id=<$idmax) AND score=1";//########score=1表示单选...待改...还有引号问题...
        $result1 = mysqli_query($dbc, $query1);
        $test_dan=mysqli_fetch_array($result1);          
        //$iid=$test_dan['id'];
        echo '<p>'.$xuhao.'. '.$test_dan['question']."<br/>";    //输出序号、问题
        //构造单选钮，输出答案选项
        echo('<input type="radio" name="'.$xuhao.'" value="A">'.$test_dan['a'].
                '<input type="radio" name="'.$xuhao.'" value="B">'.$test_dan['b'].
                '<input type="radio" name="'.$xuhao.'" value="C">'.$test_dan['c'].
                '<input type="radio" name="'.$xuhao.'" value="D">'.$test_dan['d'].'</p>');
        echo('<input type="hidden" name="a'.$xuhao.'" value="'.$test_dan['id'].'">');
        $xuhao++;
    }
    //多选
    for ($k=$duoxmin;$k<=$duoxmax;$k++) {       
        $query2 = "SELECT * FROM score WHERE number='$k' AND (id>=$idmin AND id=<$idmax) AND score=2";//########score=2表示多选...待改...还有未实验的引号问题...
        $result2 = mysqli_query($dbc, $query2);
        $test_duo=mysqli_fetch_array($result2);
        $iid=$test_duo['id'];
        echo '<p>'.$xuhao.'. '.$test_duo['question']."<br/>";    //输出序号、问题
        //构造复选框，输出答案选项
        echo('<input type="checkbox" name="'.$xuhao.'[]" value="A">'.$test_duo['a'].    
                '<input type="checkbox" name="'.$xuhao.'[]" value="B">'.$test_duo['b'].
                '<input type="checkbox" name="'.$xuhao.'[]" value="C">'.$test_duo['c'].
                '<input type="checkbox" name="'.$xuhao.'[]" value="D">'.$test_duo['d'].'</p>');
        echo('<input type="hidden" name="a'.$xuhao.'" value="'.$test_duo['id'].'">');
        $xuhao++;
    }                  
    echo("<input type='hidden' name='allnumber' value='".$zongshu."'>");    //题目总数
    echo("<input type='hidden' name='hwid' id='hwid' value='".$id."'>");
    echo("<input type='hidden' name='hwchapter' id='hwchapter' value='".$chapter."'>");
    echo('<input type="submit" name="submit" value="交卷"></form>'); 

    mysqli_close($dbc);  //关闭数据库
} else {
    echo("请先登录。");
}
?>
 
<p><a href="selecthw.php">返回作业选择页面</a><br /></p>
<p><a href="indexstudent.php">返回主页</a><br /></p>
              
    </body>
</html>
