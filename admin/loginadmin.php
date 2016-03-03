<?php 
/**
 *管理员登录页面
 */

require '../connectvars.php';

//开始会话
session_start();

//清除错误信息
$error_msg = "";

//若 用户未登录，则 尝试将他们登录
if (!isset($_SESSION['admin_id'])) {
    if (isset($_POST['submit'])) {
        //连接数据库
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        //获取用户登录数据
        $admin_name = mysqli_real_escape_string($dbc, trim($_POST['admin_name']));
        $password = mysqli_real_escape_string($dbc, trim($_POST['password']));
        if (!empty($admin_name) && !empty($password)) {
            //在数据库中查找用户ID和姓名 当用户姓名与密码与数据库中的匹配时
            $query = "SELECT id, admin_name FROM admin WHERE admin_name = '$admin_name' AND password = SHA('$password')";
            $data = mysqli_query($dbc, $query);
            if (mysqli_num_rows($data) == 1) {    //若 可以登录，则 将用户ID和用户教职工号设置会话和cookie变量，并重定向至教师主页            
                $row = mysqli_fetch_array($data);
                $_SESSION['admin_id'] = $row['id'];
                $_SESSION['admin_name'] = $row['admin_name'];
                setcookie('admin_id', $row['id'], time() + (60 * 60 * 24 * 1));    // 于1天失效
                setcookie('admin_name', $row['admin_name'], time() + (60 * 60 * 24 * 1));  
                $home_url = 'http://' . $_SERVER['HTTP_HOST'] . '/admin/indexadmin.php';
                header('Location: ' . $home_url);
            } else {
                //若 用户教职工号或密码错误，则 显示错误信息
                $error_msg = '输入的姓名或密码有误';
            }
        } else {    //若 用户未输入学号或密码，则 显示错误信息            
            $error_msg = '姓名和密码不能为空';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>航概网教师登录界面</title>
        <link rel="stylesheet" type="text/css" href="../blueschoolbadge.css">
       <style>
          body {
    margin-top: 15%;
         }	
       </style>
    </head>
    <body>
    <h3>登录</h3>

<?php
//若 会话变量为空，显示错误信息和登录表单；否则，证实该用户已登录 
if (empty($_SESSION['admin_id'])) {
    echo '<p class="error">' . $error_msg . '</p>';
    ?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">   
        <label for="admin_name">姓名（拼音小写无空格）:</label>
        <input type="text" name="admin_name" value="<?php if (!empty($admin_name)) echo $admin_name; ?>" /><br />
        <label for="password">密码:</label>
        <input type="password" name="password" />  
        <input type="submit" value="登录" name="submit" />
    </form>

    <p><a href="indexadmin.php">返回主页</a><br/></p>

    <?php
} else {
    //证实该用户已成功登录
    echo('<p class="login">--' . $_SESSION['admin_name'] .'已成功登录--</p>');
}
?>
     
             
    </body>
</html>
