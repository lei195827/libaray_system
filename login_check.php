<?php
include ('conn.php');
//接收数据
session_start();
$inputUsername = $_POST['username'];
$inputPassword = $_POST['password'];
//查询数据处理
if (strlen($inputUsername) < 5) {
    alert('用户名不能小于5位', 'login.php');
    exit();
}
$sql = "select * from user where username='$inputUsername' and password='$inputPassword'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $_SESSION['username'] = $inputUsername; // 设置会话中的用户名
    alert('登录成功', 'admin/index.php');
} else {
    alert('登录失败', 'login.php');
}

