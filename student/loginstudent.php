<?php 
/**
 *学生登录页面
 */

require '../connectvars.php';

//开始会话
session_start();

//清除错误信息
$error_msg = "";

//若 用户未登录，则 尝试将他们登录
if (!isset($_SESSION['user_id'])) {
    if (isset($_POST['submit'])) {
        //连接数据库
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        //获取用户登录数据
        $user_number = mysqli_real_escape_string($dbc, trim($_POST['number']));
        $user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));
        if (!empty($user_number) && !empty($user_password)) {
            //在数据库中查找用户ID和学号（如果用户学号与密码与数据库中的匹配时）
            $query = "SELECT user_id, user_number, classnumber FROM users WHERE user_number='$user_number' AND password=SHA('$user_password')";
            $data = mysqli_query($dbc, $query);
            if (mysqli_num_rows($data) == 1) {    //若 可以登录，则 将用户ID和用户学号设置会话和cookie变量，并重定向至主页            
                $row=mysqli_fetch_array($data);
                $_SESSION['user_id']=$row['user_id'];
                $_SESSION['user_number']=$row['user_number'];
                $_SESSION['sclassnumber']=$row['classnumber'];
                setcookie('user_id', $row['user_id'], time() + (60 * 60 * 24 * 1));    // 于1天失效
                setcookie('user_number', $row['user_number'], time() + (60 * 60 * 24 * 1));  
                setcookie('sclassnumber', $row['classnumber'], time() + (60 * 60 * 24 * 1));  
                $home_url='http://' . $_SERVER['HTTP_HOST'] . '/student/indexstudent.php';
                header('Location: ' . $home_url);
            } else {
                //用户学号或密码错误，显示错误信息
                $error_msg = '对不起，你的学号或密码不对...';
            }
        } else {    //用户未输入学号或密码，显示错误信息            
            $error_msg = '对不起，学号和密码不能为空哦~';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>航概网学生登录界面</title>
        <link rel="stylesheet" type="text/css" href="../bgtym.css">
        <style type="text/css">
            a{
                text-decoration: underline;
            }
            #content{
                text-align: center;                
            }
            form {
                padding-top: 10px;
            }
            #signup {
                color: #005FAF;
                font-size: 30px;
            }
            #zhuce a{
                color: #1520ec;
                font-size: 50px;
            }
        </style>
    </head>
    <body>
    
<?php
//若 会话变量为空，显示错误信息和登录表单；否则，证实该用户已登录 
if (empty($_SESSION['user_id'])) {
    echo '<p class="error">' . $error_msg . '</p>';
    ?>
        <div id="wrapper">
            <div id="header">
            <div id="welcome">WELCOME</div>
                <div id="nav">                   
                    <p id="fanhui"><a href="../index.html">返回</a><br/></p>
                </div>
            </div>
            <div id="main">
                <div id="content">
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        学生登录<br/>   
                        <label for="number">学号:</label>
                        <input type="text" name="number" value="<?php if (!empty($user_number)) echo $user_number; ?>" /><br />
                        <label for="password">密码:</label>
                        <input type="password" name="password" />  
                        <br/>
                        <input type="submit" value="登录" name="submit" />
                    </form>
                    <div id="signup">
                        <p>还未注册？现在去-><span id="zhuce"><em><a href="signupstudent.php">注册</a></em></span></p>
                    </div>          
                </div>                                            
            </div>
            <div id="footer">
                &copyCopyright (c) ... 
            </div>
        </div>

    <?php
} else {
    //证实该用户已成功登录
    echo('<p class="login">--' . $_SESSION['user_number'] . '你已成功登录--<br/><a href="indexstudent.php">去往主页</a><br/></p>');
}
?>
     
             
    </body>
</html>

            

          