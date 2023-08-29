<?php
include ('conn.php');
//接收数据
$inputUsername = $_POST['username'];
$inputPassword1 = $_POST['password1'];
$inputPassword2 = $_POST['password2'];
//查询数据处理
if($inputPassword1 != $inputPassword2){
    alert('两次密码不一样', 'add.php');
}
if (strlen($inputUsername) < 5) {
    alert('用户名不能小于5位', 'add.php');
    exit();
}
//判断用户名是否已经在数据库中存在
$sql = "SELECT * FROM user WHERE username = '$inputUsername'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    alert('用户名存在', 'add.php');
}

//向user数据表插入一条数据
$sql = "INSERT INTO user(username,password) VALUES('$inputUsername','$inputPassword1')";
$result = mysqli_query($conn, $sql);
if ($result) {
    alert('添加成功', 'login.php');
}
else {
    alert('添加失败', 'add.php');
}

