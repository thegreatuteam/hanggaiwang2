<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>航概网注册界面</title>
        <link rel="stylesheet" type="text/css" href="../bgtym.css">
        <style>
            #main {
                font-size: 26px;
            }
            a:hover {    
                text-decoration-color: #fff;
            }	
            .wenbenkuang {
                width: 180px; 
                height: 26px;
            }
       </style>
    </head>
    <body>
      

<?php
    
require '../connectvars.php';

// 连接数据库
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (isset($_POST['submit'])) {
    // 从表单获取注册数据
    $user_number = mysqli_real_escape_string($dbc, trim($_POST['number']));
    $sname = mysqli_real_escape_string($dbc, trim($_POST['sname']));
    $classnumber = mysqli_real_escape_string($dbc, trim($_POST['classnumber']));
    $password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
    $password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));
 
    $okregister='1';   //$okregister初始值为1，若最终为1，则判定用户数据合理；若有不合理之处，变为0
 
    //若 有表单项为空，则 $okregister值变为0
    if (empty($user_number)||empty($sname)||empty($classnumber)||empty($password1)||empty($password2)) {
        $okregister='0';
        echo '<p class="error">--请将注册信息全部填满！--</p>';
    }
    //若 两次密码输入不一致，则 $okregister值变为0
    if ($password1!== $password2) {
        $okregister='0';
        echo '<p class="error">--请保证两次密码填写一致！--</p>';
    }
    //确保学号为8位数字--即保证是北航学号 正则表达式
    if (!preg_match('/^\d{8}$/', $user_number)) {
        $okregister='0'; 
        echo '<p class="error">--请输入有效的学号，8位数字哟！--</p>'; 
        $user_number = "";
    }
     //确保密码为6-12位且仅由数字或字母组成
    if (!preg_match('/^\w{6,12}$/', $password1)) {
        $okregister='0'; 
        echo '<p class="error">--请确保密码为6-12位且仅由数字或字母组成--</p>'; 
        $password1="";
        $password2="";
    }  
    //确保没有人已经注册了该学号
    $query = "SELECT * FROM users WHERE user_number = '$user_number'";
    $data = mysqli_query($dbc, $query);
    if (mysqli_num_rows($data) !== 0) {
        $okregister='0';
        echo '<p class="error">--糟糕，这个学号已经被注册过了！请使用未被注册过的学号注册。--</p>';
        $user_number = "";
    }
 
    //最终，若$okregister值为1（即PHP判定用户数据合理）,则 将注册数据插入数据库表
    if ($okregister=='1') {
        $query = "INSERT INTO users (user_number, password, join_date, name, classnumber) VALUES ('$user_number', SHA('$password1'), NOW(), '$sname', '$classnumber')";
        mysqli_query($dbc, $query);

        //为新注册的用户创建一个新的独立的数据库表 [我写的————by李嘉锟]
        $dbt_name="user".$user_number;   // 定义数据库表名称 
        $sql = "CREATE TABLE $dbt_name (
        id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
        time text,
        score text,
        number text,
        type varchar(10),
        indexx int(11)
        content varchar(50)
        )";
        mysqli_query($dbc, $sql);
        
        // 向用户证实已成功注册
        echo '<p>--恭喜'.$user_number.'~ 你已经注册成功~<br/>现在请<a href="loginstudent.php">登录</a>吧。--</p>';
        echo('<p><a href="../index.html">返回主页</a><br/></p>');
        mysqli_close($dbc);
        exit();
    }
}
  mysqli_close($dbc);
?>


       <div id="wrapper">
            <div id="header">
            <div id="welcome">WELCOME</div>
                <div id="nav">  
                                   
                    <ul>                                                
                        <li><a href="loginstudent.php">登录</a></li>
                        <li><a href="../index.html">重新选择登录身份</a></li>
                    </ul>
                </div>
            </div>
            <div id="main">
                <div id="content">
                    <h3>注册</h3>                
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">   
                        <label for="sname">姓名:</label>
                        <input type="text" id="sname" class="wenbenkuang" name="sname" placeholder="真实姓名" value="<?php if (!empty($sname)) echo $sname; ?>" /><br />
                        <label for="number">学号:</label>
                        <input type="text" id="number" name="number" class="wenbenkuang" placeholder="8位学号" value="<?php if (!empty($user_number)) echo $user_number; ?>" /><br />
                        <label for="classnumber">航概班号:</label>
                        <input type="text" id="classnumber" name="classnumber" class="wenbenkuang" placeholder="请填写航概的班号！" value="<?php if (!empty($classnumber)) echo $classnumber; ?>" /><br />
                        <label for="password1">密码:</label>
                        <input type="password" id="password1" class="wenbenkuang" name="password1" placeholder="6-12位且仅由数字或字母组成"/><br />
                        <label for="password2">再次输入密码:</label>
                        <input type="password" id="password2" class="wenbenkuang" name="password2" placeholder="两次输入密码需一致"/><br />    
                        <input type="submit" value="注册" name="submit" />
                    </form>
                </div>                                            
            </div>
            <div id="footer">
                &copyCopyright (c) ... 
            </div>
        </div>

    </body>
</html>
