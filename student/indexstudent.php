<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>航概网学生主页</title>
        <link rel="stylesheet" type="text/css" href="../wenziyemian.css">
        <style>
            #main {
	            background: url(../image/yuhangyuan.png) no-repeat;
            }	
            #wenzi {                
                width: 60%;
                float: right;
                padding-top: 150px;
                padding-right: 40px;
            }
            
        </style>
    </head>
   <body>
<?php
require 'sstartsession.php';
//若已登录
if (isset($_SESSION['user_number'])) {
    $snumber=$_SESSION['user_number'];
    
?>
        <div id="wrapper">
            <div id="header">
                <div id="user">
<?php
    echo("欢迎你".$snumber);
?>>
                </div>
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
                <div id="wenzi">                
                <p>奋力地  只是朝着暗云的天空伸出手。<br/><br/></p>
                <p>我们仰望着同一片天空却看着不同的地方。<br/><br/></p>
                <p>那应该是一段真正的令人无法想象的孤独旅程，在真正的黑暗中，一味前行着，连一个氢原子也遇不到,只是深信着世界的秘密存在于深渊之中，怀着想要接近这秘密的决心，我们就这样，到底要去哪里呢...最终，又能够去到哪里呢...<br/><br/></p>
                <p>《宇航员》——《秒速5厘米》</p>
                </div>
            </div>
            <div id="footer">
                &copyCopyright (c) ... 
            </div>
        </div>
<?php
} else{
    echo('请先<a href="loginstudent.php">登录</a>');
    
}
?>  
       
    </body>
</html>
